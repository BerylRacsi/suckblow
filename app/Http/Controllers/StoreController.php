<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Gear;
use App\Course;
use App\UserTrip;
use App\PartnerTrip;

class StoreController extends Controller
{
    public function index()
    {
		if(Auth::guard('partner')->check()){
            $url = "partner";
            return view('home',compact('url'));
        }
        else{
            $url = "user";
            return view('home',compact('url'));
        }
    }

    public function trip()
    {
    	$usertrips = UserTrip::all();
    	$partnertrips = PartnerTrip::all();

		if(Auth::guard('partner')->check()){
            $url = "partner";
            return view('trip',compact('usertrips','partnertrips','url'));
        }
        else{
            $url = "user";
            return view('trip',compact('usertrips','partnertrips','url'));
        }
    }

    public function select()
    {
    	if(Auth::guard('partner')->check()){
            $url = "partner";
            return view('select',compact('url'));
        }
        else{
            $url = "user";
            return view('select',compact('url'));
        }
    }
}
 