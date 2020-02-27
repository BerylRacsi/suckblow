<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agency;
use App\Facility;

class ManageController extends Controller
{
    public function showAgencyList()
    {
    	$agencies =  Agency::all();

    	return view('admin/manage/agency',compact('agencies'));
    }

    public function showFacilityList()
    {
    	$facilities = Facility::all();
    	return view('admin/manage/facility',compact('facilities'));
    }

    public function showAgencyForm()
    {
    	return view('admin/manage/addagency');
    }

    public function showFacilityForm()
    {
    	return view('admin/manage/addfacility');
    }

    public function storeAgency(Request $request)
    {
    	$agency = new Agency;

    	$agency->name = $request->input('name');

    	$agency->save();

    	return redirect()->intended('admin/manage/agency');
    }

    public function storeFacility(Request $request)
    {
    	$facility = new Facility;

    	$facility->name = $request->input('name');

    	$facility->save();

    	return redirect()->intended('admin/manage/facility');
    }
}
