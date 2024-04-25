<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Model added
use App\Models\Order;
use App\Models\Local_guide_service;
use App\Models\Local_host_service;
use App\Models\User;
use App\Models\Virtual_assistant;
use App\Models\Place;
use App\Models\Review;
use App\Models\Session;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

use Auth;
use PDF;
use Redirect;
use GuzzleHttp\Client;

class HomeController extends Controller
{

    public function viewHistory()
    {

        $today=date('Y-m-d');

        $histories=Order::with('place')->where('user_id',Auth::user()->id)->where('status','=','Success')->orderBy('id', 'desc')->simplePaginate(5);;

        return view('tourist.history',['histories'=>$histories,'today'=>$today]);


    }
    public function paymentCopyDownload($id)
    {

        $history=Order::where('id',$id)->first();

        //Get session for view in pdf
        $totalBill=$history->amount;
        $from=$history->from_date;
        $to=$history->to_date;
        $amountOfDay=$history->amount_of_day;
        $amountOfPerson=$history->amout_of_person;
        $packageId=$history->package_id;
        $lgServiceId=$history->lg_service_id;
        $lhServiceId=$history->lh_service_id;
        $paymentDate=$history->payment_date;
        $tran_id=$history->transaction_id;


        //local guide
        if($lgServiceId !=null)
        {

            $serviceDetails=Local_guide_service::where('id',$lgServiceId)->first();

            $placeDetails=Place::where('id',$serviceDetails->place_id)->first();

            $serviceHolderProfile=User::where('id',$serviceDetails->user_id)->first();


        }
        //local host
        else if($lhServiceId !=null)
        {

            $serviceDetails=Local_host_service::where('id',$lhServiceId)->first();

            $placeDetails=Place::where('id',$serviceDetails->place_id)->first();

            $serviceHolderProfile=User::where('id',$serviceDetails->user_id)->first();


        }

        if($packageId==1)
        {

            $packageName="Regular Package";

        }
        else if($packageId==2)
        {


            $packageName="Premium Package";


        }
        else if($packageId==3)
        {


            $packageName="Pro Package";


        }
        else if($packageId==4)
        {


            $packageName="Ultrapro Package";


        }

        $virtualAssistantPrice=Virtual_assistant::sum('price');

        $today=$paymentDate;

        $pdf = PDF::loadView('tourist.SuccesfullPaymentCopy', compact('virtualAssistantPrice','packageId','packageName','today', 'tran_id','from','to','amountOfDay','amountOfPerson','serviceHolderProfile','serviceDetails','placeDetails','totalBill'));

        return $pdf->download('Payment Copy.pdf',array("Attachment" => false));



    }

    public function afterLogin()
    {

        $usertype=Auth::user()->usertype;

        if($usertype==0)
        {

            return redirect()->intended();

        }
        else
        {

            $today=date('F d, Y');

            $ip = $_SERVER['REMOTE_ADDR'];
		    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

            if($ip=="127.0.0.1")
            {
                $city="Dhaka";
                $country="Bangladesh";
            }
            else
            {

                $city=$details->region;
                $country=$details->country;

            }

            $client = new Client();
            $response = $client->get('https://api.openweathermap.org/data/2.5/weather?q='.$city.'&appid='.env('OPEN_WEATHER_API_KEY'));

            $body = $response->getBody();
            $weather = json_decode($body);

            if(Auth::user()->usertype == 1)
            {

                $pendingTour=Order::where('service_holder_id',Auth::user()->id)->where('status','Success')->where('tour_status','Pending')->count();

                $totalBooking=Order::where('service_holder_id',Auth::user()->id)->where('status','Success')->count();

                $totalEarn=Order::where('service_holder_id',Auth::user()->id)->where('status','Success')->sum('pay_guide_host');

                $totalService=Local_guide_service::where('user_id',Auth::user()->id)->count();

            }
            else if(Auth::user()->usertype == 2)
            {

                $pendingTour=Order::where('service_holder_id',Auth::user()->id)->where('status','Success')->where('tour_status','Pending')->count();

                $totalBooking=Order::where('service_holder_id',Auth::user()->id)->where('status','Success')->count();

                $totalEarn=Order::where('service_holder_id',Auth::user()->id)->where('status','Success')->sum('pay_guide_host');

                $totalService=Local_host_service::where('user_id',Auth::user()->id)->count();


            }
            else{

                $pendingTour=Order::where('tour_status','Pending')->where('status','Success')->count();

                $totalBooking=Order::where('status','Success')->count();

                $totalEarn=Order::where('status','Success')->sum('amount');

                $totalGuideService=Local_host_service::count();

                $totalHostService=Local_host_service::count();

                $totalService=$totalGuideService+$totalHostService;

            }

            return view('admin.dashboard',['usertype'=>$usertype,'today'=>$today,'totalEarn'=>$totalEarn,'pendingTour'=>$pendingTour,'totalBooking'=>$totalBooking,'totalService'=>$totalService,'weather'=>$weather,'city'=>$city,'country'=>$country]);


        }


    }
    public function reviewPage($id)
    {

        $orderInformation=Order::where('id',$id)->first();

        if(Auth::user()->id!=$orderInformation->user_id)
        {
            return view('errorPage.404');
        }

        $status=Null;

        $today=date('Y-m-d');

        $reviewStatus=Review::where('order_id',$id)->count();

        if($reviewStatus>=1)
        {

            $status="Thanks for submitted your review !";

        }

        $tourEndDate=$orderInformation->to_date;

        $reviewLastDate=date('Y-m-d', strtotime($tourEndDate. ' + 7 days'));

        if($today>$reviewLastDate)
        {

            $status="Date is Over !";

        }

        return view('tourist.reviewPage',['id'=>$id,'status'=>$status]);

    }
    public function reviewSubmit(Request $req,$id)
    {

        $orderInformation=Order::where('id',$id)->first();

        if(Auth::user()->id!=$orderInformation->user_id)
        {
            return view('errorPage.404');
        }

        $today=date('Y-m-d');

        $reviewStatus=Review::where('order_id',$id)->count();

        if($reviewStatus>=1)
        {

            return view('errorPage.404');

        }

        $tourEndDate=$orderInformation->to_date;

        $reviewLastDate=date('Y-m-d', strtotime($tourEndDate. ' + 7 days'));

        if($today>$reviewLastDate)
        {

            return view('errorPage.404');

        }

        $review=array();

        $review['order_id']=$id;
        $review['user_id']=Auth::user()->id;
        $review['rating']=$req->rating;
        $review['comment']=$req->comment;
        $review['date']=$today;

        if($orderInformation->lg_service_id!=Null)
        {

            $review['local_guide_service_id']=$orderInformation->lg_service_id;


        }
        else if($orderInformation->lh_service_id!=Null)
        {

            $review['local_host_service_id']=$orderInformation->lh_service_id;

        }

        Review::create($review);

        if($orderInformation->lg_service_id!=Null)
        {

            $avgRating=Review::where('local_guide_service_id',$orderInformation->lg_service_id)->avg('rating');

            Local_guide_service::where('id',$orderInformation->lg_service_id)->update(

                ['rating'=>$avgRating],

            );

        }
        else if($orderInformation->lh_service_id!=Null)
        {

            $avgRating=Review::where('local_host_service_id',$orderInformation->lh_service_id)->avg('rating');

            Local_host_service::where('id',$orderInformation->lh_service_id)->update(

                ['rating'=>$avgRating],

            );

        }

        return back();


    }
    public function returnBooking($id)
    {

        $orderInformation=Order::where('id',$id)->first();

        if(Auth::user()->id!=$orderInformation->user_id)
        {
            return view('errorPage.404');
        }

        $today=date('Y-m-d');

        $tourStartDate=$orderInformation->from_date;

        $returnLastDate=date('Y-m-d', strtotime($tourStartDate. ' - 1 days'));

        if($today>$returnLastDate)
        {

            return view('errorPage.404');

        }

        $userDetails=User::where('id',$orderInformation->user_id)->first();

        if($userDetails->bank_name==Null || $userDetails->account_no==Null)
        {

            Session()->flash('wrong','Please provide bank name & account name in profile section.');
            return back();

        }

        $tour=array();

        $tour['tour_status']="Cancel";

        Order::where('id',$id)->update($tour);

        //semd mail to tourist
        $details = [

            'description'=>'Tour canceled successfully. Return money to your account within 7 days !',

        ];

        \Mail::to($orderInformation->email)->send(new \App\Mail\ReturnBookingEmail($details));

        if($orderInformation->lg_service_id!=Null)
        {

            $serviceHolderEmail=User::where('id',$orderInformation->lg_service_id)->value('email');

        }
        else if($orderInformation->lh_service_id!=Null)
        {

            $serviceHolderEmail=User::where('id',$orderInformation->lh_service_id)->value('email');

        }

        //semd mail to local guide or host
        $details = [

            'description'=>'Tour canceled from tourist. ' . $orderInformation->name .' cancel your tour.',

        ];

        \Mail::to($serviceHolderEmail)->send(new \App\Mail\TourCanceledEmail($details));

        Session()->flash('success','Tour canceled successfully. Return money to your account within 7 days !');
        return back();

    }
    public function logOutOtherBrowser()
    {

        $userId=Auth::user()->id;

        $request = app(Request::class);
        $currentUserAgent = $request->userAgent();

        Session::where('user_id',$userId)->where('user_agent','!=',$currentUserAgent)->delete();

        return back();


    }

}
