<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Model added
use App\Models\Local_host_service;
use App\Models\User;
use App\Models\Virtual_assistant;
use Session;


class ProPackageController extends Controller
{
    
    public function afterSelectedHost($placeId,$packageId,$id)
    {

        $hostService=Local_host_service::where('id',$id)->first();

        $hostProfile=User::where('id',$hostService->user_id)->first();

        $virtualAssistant=Virtual_assistant::first();

        $virtualAssistantPrice=Virtual_assistant::sum('price');

        return view('tourist.proPackage.detail_info_before_payment',['placeId'=>$placeId,'packageId'=>$packageId,'hostServiceId'=>$id,'hostService'=>$hostService,'hostProfile'=>$hostProfile,'virtualAssistant'=>$virtualAssistant,'virtualAssistantPrice'=>$virtualAssistantPrice]);


    }
    public function billGenerate($placeId,$packageId,$hostServiceId,Request $req)
    {

        $today=date("Y-m-d");

        $from=$req->from;
        $to=$req->to;
        $amountOfPerson=$req->person;

        //Validate date
        if($from<$today || $to<$today || $from>$to)
        {

            Session()->flash('wrongInformation','Invalid date !');
            return back();

        }
    
        //validate Person
        if($amountOfPerson<=0)
        {

            Session()->flash('wrongInformation','Invalid amount of person !');
            return back();

        }

        $amountOfDay=(strtotime($to)-strtotime($from))/(24*60*60)+1;

        $hostBill=Local_host_service::where('id',$hostServiceId)->value('total_price');

        $virtualAssistantBill=Virtual_assistant::sum('price');

        $totalBill=($hostBill + $virtualAssistantBill)*$amountOfDay*$amountOfPerson;

        $serviceHolderId=Local_host_service::where('id',$hostServiceId)->value('user_id');

          //cache for ssl payment gateway
          Session::put('totalBill',$totalBill);
          Session::put('from',$from);
          Session::put('to',$to);
          Session::put('amountOfDay',$amountOfDay);
          Session::put('amountOfPerson',$amountOfPerson);
          Session::put('placeId',$placeId);
          Session::put('packageId',$packageId);
          Session::put('lgServiceId',null);
          Session::put('lhServiceId',$hostServiceId);
          Session::put('serviceHolderId',$serviceHolderId);   
        
        return view('tourist.Propackage.billGenerate',['amountOfDay'=>$amountOfDay,'amountOfPerson'=>$amountOfPerson,'hostBill'=>$hostBill,'virtualAssistantBill'=>$virtualAssistantBill,'totalBill'=>$totalBill]);


    }



}
