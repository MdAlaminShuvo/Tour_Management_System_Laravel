<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

// Model added
use App\Models\User;
use App\Models\Place;
use App\Models\Local_Guide_Service;
use App\Models\Local_Host_Service;
use App\Models\Virtual_assistant;
use App\Models\Contact;
use App\Models\Banner;

class GuestController extends Controller
{

    public function homePage()
    {

        $places = Place::all();

        $banners = Banner::all();

        return view('tourist.index',['places'=>$places,'banners'=>$banners]);


    }
    
    public function choosePlace($id)
    {

        return view('tourist.packageSelection',['placeId'=>$id]);


    }
    public function selectedPackage($placeId,$id)
    {


        //for regular package
        if($id==1)
        {

            $localGuides=User::with('local_guide_services')->where('usertype',1)->get();

            $place=Place::where('id',$placeId)->first();
        
            return view('tourist.regularPackage.guideSelection',['placeId'=>$placeId,'packageId'=>$id,'localGuides'=>$localGuides,'place'=>$place]);

        }
        //for premimum package
        else if($id==2)
        {

            $localHosts=User::with('local_host_services')->where('usertype',2)->get();

            $place=Place::where('id',$placeId)->first();
        
            return view('tourist.premiumPackage.hostSelection',['placeId'=>$placeId,'packageId'=>$id,'localHosts'=>$localHosts,'place'=>$place]);


        }
        //for pro package
        else if($id==3)
        {
         
            $localHosts=User::with('local_host_services')->where('usertype',2)->get();

            $place=Place::where('id',$placeId)->first();

            $virtualAssistantPrice=Virtual_assistant::sum('price');

            return view('tourist.proPackage.hostSelection',['placeId'=>$placeId,'packageId'=>$id,'localHosts'=>$localHosts,'place'=>$place,'virtualAssistantPrice'=>$virtualAssistantPrice]);



  
        }
        //for ultra pro package
        else if($id==4)
        {
            $localGuides=User::with('local_guide_services')->where('usertype',1)->get();

            $place=Place::where('id',$placeId)->first();

            $virtualAssistantPrice=Virtual_assistant::sum('price');
        
            return view('tourist.ultraproPackage.guideSelection',['placeId'=>$placeId,'packageId'=>$id,'localGuides'=>$localGuides,'place'=>$place,'virtualAssistantPrice'=>$virtualAssistantPrice]);


        }
        //for invaild package
        else
        {

            return view('errorPage.404');


        }

      


    }
    public function sendMessage(Request $req)
    {

        Contact::create([

            'name'   =>  $req->name,
            'email'      => $req->email,
            'message'   =>  $req->message,

        ]);

        
        $details = [

            'title' => 'Contact Confirmation Email',
            'body' => 'Your messange successfully sended to ours.We will contact with you as soon as possible.'

        ];
    
        \Mail::to($req->email)->send(new \App\Mail\ContactConfirmationMail($details));


        Session()->flash('successSendMessage','Successfully send message !');
        return redirect::to('/#contact');


    }
 

}
