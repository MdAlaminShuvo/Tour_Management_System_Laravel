<?php

namespace App\Http\Controllers;

//Model added
use App\Models\Local_guide_service;
use App\Models\Local_host_service;
use App\Models\Place;
use App\Models\Order;
use App\Models\User;
use App\Models\Review;

use Illuminate\Http\Request;
use Auth;
use Gate;
use Webp;

class LocalGuideHostController extends Controller
{
    
    public function addService()
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
            return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');  
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
        }

        $places=Place::all();

        return view('admin.guideHost.addService',['places'=>$places]);
               
    }
    public function allService()
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }



        $usertype=Auth::user()->usertype;

        if($usertype==1)
        {

            $services=Local_guide_service::where('user_id',Auth::user()->id)->get();

        }
        else
        {

            $services=Local_host_service::where('user_id',Auth::user()->id)->get();

        }

        return view('admin.guideHost.allService',['services'=>$services]);


    }
    public function addServiceProcess(Request $req)
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }


        $serviceName=$req->serviceName;
        $hotelName=$req->hotelName;
        $roomType=$req->roomType;
        $hotelPrice=$req->hotelPrice;
        $available=$req->available;
        $userId=Auth::user()->id;
        $placeId=$req->placeId;
        $feature=$req->feature;
        $serviceCharge=$req->serviceCharge;
        $foodItem=$req->foodItem;
        $foodPrice=$req->foodPrice;
        $roomPrice=$req->roomPrice;
        $roomPicture=$req->roomImage;
        $foodPicture=$req->foodImage;


        $service=array();

        if($serviceCharge<0 || $hotelPrice<0 || $roomPrice<0 || $foodPrice<0)
        {

            Session()->flash('wrongInformation','Invaild price !');
            return back();


        }

        $service['service_name']=$serviceName;
        $service['available']=$available;
        $service['user_id']=$userId;
        $service['place_id']=$placeId;
        $service['feature']=$feature;
        $service['food_item']=$foodItem;
        $service['food_price']=$foodPrice;


        if(Auth::user()->usertype==1)
        {

            $totalPrice=$serviceCharge+$hotelPrice+$foodPrice;

            $service['hotel_name']=$hotelName;
            $service['hotel_price']=$hotelPrice;
            $service['room_type']=$roomType;
            $service['service_charge']=$serviceCharge;

            //For Image compression, Image upload in webp format
            $imageName=rand().'webp';
            $convertImageToWebp = Webp::make($req->file('roomImage'));
            $convertImageToWebp->save(public_path('assets/lgHotelRoomImage/'.$imageName));

            $convertImageToWebp = Webp::make($req->file('foodImage'));
            $convertImageToWebp->save(public_path('assets/lgFoodImage/'.$imageName));

            $service['room_picture']=$imageName;
            $service['food_picture']=$imageName;
            $service['total_price']=$totalPrice;

            $addService=Local_guide_service::create($service);

            Session()->flash('success','Service added successfully !');
            return back();

        }
        else
        {

            $totalPrice=$roomPrice+$foodPrice;

            //For Image compression, Image upload in webp format
            $imageName=rand().'webp';
            $convertImageToWebp = Webp::make($req->file('roomImage'));
            $convertImageToWebp->save(public_path('assets/lhRoomImage/'.$imageName));
  
            $convertImageToWebp = Webp::make($req->file('foodImage'));
            $convertImageToWebp->save(public_path('assets/lhFoodImage/'.$imageName));
  
            $service['room_picture']=$imageName;
            $service['food_picture']=$imageName;
            $service['total_price']=$totalPrice;

            $addService=Local_host_service::create($service);

            Session()->flash('success','Service added successfully !');
            return back();

        }

    }
    public function pendingTour()
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }
       
        $today=date('Y-m-d');

        if(Auth::user()->usertype == 1)
        {

            $pendingTours=Order::with('place')->where('service_holder_id',Auth::user()->id)->where('status','Success')->where('tour_status','Pending')->get();

        }
        else if(Auth::user()->usertype == 2)
        {

            $pendingTours=Order::with('place')->where('service_holder_id',Auth::user()->id)->where('status','Success')->where('tour_status','Pending')->get();

        }

        return view('admin.guideHost.pendingTours',['pendingTours'=>$pendingTours,'today'=>$today]);

    }
    public function canceledTour()
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }

        if(Auth::user()->usertype == 1)
        {

            $canceledTours=Order::where('service_holder_id',Auth::user()->id)->where('status','Success')->where('tour_status','Cancel')->get();

        }
        else if(Auth::user()->usertype == 2)
        {

            $canceledTours=Order::where('service_holder_id',Auth::user()->id)->where('status','Success')->where('tour_status','Cancel')->get();

        }

        return view('admin.guideHost.canceledTours',['canceledTours'=>$canceledTours]);

    }
    public function completedTour()
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }

        if(Auth::user()->usertype == 1)
        {

            $completedTours=Order::where('service_holder_id',Auth::user()->id)->where('status','Success')->where('tour_status','Completed')->get();

        }
        else if(Auth::user()->usertype == 2)
        {

            $completedTours=Order::where('service_holder_id',Auth::user()->id)->where('status','Success')->where('tour_status','Completed')->get();

        }

        return view('admin.guideHost.completedTours',['completedTours'=>$completedTours]);

    }
    public function receiveTourCompletedRequest($id)
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }

        $tourInformation=Order::where('id',$id)->first();

        $today=date('Y-m-d');

        if($today<$tourInformation->from_date)
        {

            Session()->flash('wrong','Tour is not starting !');
            return back();

        }
        else if($today<$tourInformation->to_date)
        {

            Session()->flash('wrong','Tour is not completed !');
            return back();

        }

        $tour=array();

        $tour['tour_status']="Completed";

        $updateStatus=Order::where('id',$id)->update($tour);

        //semd mail to tourist
        $details = [

            'id'=>$id,

        ];
    
        \Mail::to($tourInformation->email)->send(new \App\Mail\TourCompletedEmail($details));

        Session()->flash('success','Send request successfully . Wait 7 days for payment !');
        return back();

    }
    public function pendingTourDetails($id)
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        $tourInformation=Order::where('id',$id)->first();

        $userInformation=User::where('id',$tourInformation->user_id)->first();

        if(Auth::user()->usertype == 1)
        {

            $serviceInformation=Local_guide_service::where('id',$tourInformation->lg_service_id)->first();

        }
        else if(Auth::user()->usertype == 2)
        {

            $serviceInformation=Local_host_service::where('id',$tourInformation->lh_service_id)->first();


        }

        return view('admin.guideHost.pendingTourDetail',['tourInformation'=>$tourInformation,'userInformation'=>$userInformation,'serviceInformation'=>$serviceInformation]);

    }
    public function canceledTourDetails($id)
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        $tourInformation=Order::where('id',$id)->first();

        $userInformation=User::where('id',$tourInformation->user_id)->first();

        if(Auth::user()->usertype == 1)
        {

            $serviceInformation=Local_guide_service::where('id',$tourInformation->lg_service_id)->first();

        }
        else if(Auth::user()->usertype == 2)
        {

            $serviceInformation=Local_host_service::where('id',$tourInformation->lh_service_id)->first();


        }

        return view('admin.guideHost.canceledTourDetail',['tourInformation'=>$tourInformation,'userInformation'=>$userInformation,'serviceInformation'=>$serviceInformation]);

    }
    public function completedTourDetails($id)
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        $tourInformation=Order::where('id',$id)->first();

        $userInformation=User::where('id',$tourInformation->user_id)->first();

        if(Auth::user()->usertype == 1)
        {

            $serviceInformation=Local_guide_service::where('id',$tourInformation->lg_service_id)->first();

        }
        else if(Auth::user()->usertype == 2)
        {

            $serviceInformation=Local_host_service::where('id',$tourInformation->lh_service_id)->first();


        }

        return view('admin.guideHost.completedTourDetail',['tourInformation'=>$tourInformation,'userInformation'=>$userInformation,'serviceInformation'=>$serviceInformation]);

    }
    public function balanceStatement()
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }

        if(Auth::user()->usertype == 1)
        {

            $paymentOrders=Order::where('service_holder_id',Auth::user()->id)->where('guide_host_tranx_id','!=',null)->get();

        }
        else if(Auth::user()->usertype == 2)
        {

            $paymentOrders=Order::where('service_holder_id',Auth::user()->id)->where('guide_host_tranx_id','!=',null)->where('status','Success')->get();

        }

        return view('admin.guideHost.balanceStatement',['paymentOrders'=>$paymentOrders]);


    }
    public function reviewList()
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }

        if(Auth::user()->usertype == 1)
        {

            $Orders=Order::where('service_holder_id',Auth::user()->id)->get();

        }
        else if(Auth::user()->usertype == 2)
        {

            $Orders=Order::where('service_holder_id',Auth::user()->id)->get();

        }

        foreach($Orders as $order)
        {
                
                $review=Review::where('order_id',$order->id)->first();
    
                if($review)
                {
    
                    $reviews[]=$review;
    
                }
                else
                {

                    $reviews[]=null;


                }
    
        }

        return view('admin.guideHost.reviewList',['reviews'=>$reviews]);



    }
    public function viewService($id)
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }

        if(Auth::user()->usertype == 1)
        {

            $service=Local_guide_service::where('id',$id)->first();

        }
        else if(Auth::user()->usertype == 2)
        {

            $service=Local_host_service::where('id',$id)->first();

        }

        return view('admin.guideHost.viewService',['service'=>$service]);

    }
    public function editService($id)
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }

        if(Auth::user()->usertype == 1)
        {

            $service=Local_guide_service::where('id',$id)->first();

        }
        else if(Auth::user()->usertype == 2)
        {

            $service=Local_host_service::where('id',$id)->first();

        }

        return view('admin.guideHost.editService',['service'=>$service]);

    }
    public function updateServiceProcess(Request $req,$id)
    {

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }

        if(!(Gate::allows('isLocalGuide') ||  Gate::allows('isLocalHost')))
        {
           return view('errorPage.404');
        }

        if(Auth::user()->status=="Pending")
        {

            return view('errorPage.404');

        }


        $serviceName=$req->serviceName;
        $hotelName=$req->hotelName;
        $roomType=$req->roomType;
        $hotelPrice=$req->hotelPrice;
        $available=$req->available;;
        $feature=$req->feature;
        $serviceCharge=$req->serviceCharge;
        $foodItem=$req->foodItem;
        $foodPrice=$req->foodPrice;
        $roomPrice=$req->roomPrice;
        $roomPicture=$req->roomImage;
        $foodPicture=$req->foodImage;


        $service=array();

        if($serviceCharge<0 || $hotelPrice<0 || $roomPrice<0 || $foodPrice<0)
        {

            Session()->flash('wrongInformation','Invaild price !');
            return back();


        }

        $service['service_name']=$serviceName;
        $service['available']=$available;
        $service['feature']=$feature;
        $service['food_item']=$foodItem;
        $service['food_price']=$foodPrice;


        if(Auth::user()->usertype==1)
        {

            $totalPrice=$serviceCharge+$hotelPrice+$foodPrice;

            $service['hotel_name']=$hotelName;
            $service['hotel_price']=$hotelPrice;
            $service['room_type']=$roomType;
            $service['service_charge']=$serviceCharge;

            //For Image compression, Image upload in webp format
            if($req->roomImage!=NUll)
            {

                $imageName=rand().'webp';
                $convertImageToWebp = Webp::make($req->file('roomImage'));
                $convertImageToWebp->save(public_path('assets/lgHotelRoomImage/'.$imageName));
    
                $service['room_picture']=$imageName;

            }
            if($req->foodImage!=NUll)
            {

                $convertImageToWebp = Webp::make($req->file('foodImage'));
                $convertImageToWebp->save(public_path('assets/lgFoodImage/'.$imageName));

                $service['food_picture']=$imageName;

            }


            $service['total_price']=$totalPrice;

            $updateService=Local_guide_service::where('id',$id)->update($service);

            Session()->flash('success','Service updated successfully !');
            return back();

        }
        else
        {

            $totalPrice=$roomPrice+$foodPrice;

            //For Image compression, Image upload in webp format

            if($req->foodImage!=NUll){

                $imageName=rand().'webp';
                $convertImageToWebp = Webp::make($req->file('roomImage'));
                $convertImageToWebp->save(public_path('assets/lhRoomImage/'.$imageName));
    
                $service['room_picture']=$imageName;

            }

            if($req->foodImage!=NUll)
            {
    
                $convertImageToWebp = Webp::make($req->file('foodImage'));
                $convertImageToWebp->save(public_path('assets/lhFoodImage/'.$imageName));
    
                $service['food_picture']=$imageName;

            }


            $service['total_price']=$totalPrice;

            $updateService=Local_host_service::where('id',$id)->update($service);

            Session()->flash('success','Service updated successfully !');
            return back();

        }

    }

   

}
