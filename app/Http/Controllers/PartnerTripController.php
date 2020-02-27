<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use File;
use Image;
use App\PartnerTrip;
use App\Agency;
use App\Facility;

class PartnerTripController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required','max:255'],
            'price' => ['required','numeric','max:1000000000000','min:100'],
            'location' => ['required','string'],
            'address' => ['required', 'string', 'max:255'],
            'since' => ['required','numeric','max:2020','min:1900'],

            'logo' => 'image|mimes:jpeg,png,jpg|max:1024',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = PartnerTrip::all();

        return view('admin/advertisement/partnertrip/index',compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::all();
        $facilities = Facility::all();

        return view('admin/advertisement/partnertrip/create',compact('agencies','facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validator($request->all())->validate();

        $trip = new PartnerTrip;

        $trip->name = $request->input('name');
        $trip->description = $request->input('description');
        $trip->price = $request->input('price');
        $trip->location = $request->input('location');
        $trip->address = $request->input('address');
        $trip->since = $request->input('since');

        if ($request->has('agency')) {
            $trip->agency = implode(',', $request->input('agency'));
        }
        else{
            $trip->agency =  'Not related to any registered agencies.';
        }

        if ($request->has('facility')) {
            $trip->facility = implode(',', $request->input('facility'));
        }
        else{
            $trip->facility =  'None';
        }

        if ($request->hasFile('logo')) {

            $avatar = $request->file('logo');  

            $dir_img = true;

            if( ! File::exists('images/company_logo/')) {
                $dir_img = File::makeDirectory('images/company_logo/', 0777, true);
            }

            $filename = rand(1111,9999).time().'.'.$avatar->getClientOriginalExtension();
            $image_path = 'images/company_logo/'.$filename;

            Image::make($avatar)
                ->fit(640,640,function($constraint){
                    $constraint->upsize();
                })
                ->save($image_path);

            $trip->logo = $image_path;
        }

        else{
            $trip->logo = 'images/default_company_logo.png';
        }

        if ($request->hasFile('image')) {
            $images = $request->file('image');
 
            //setting flag for condition
            $org_img = true;

            $path = [];
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/partner_trip_photos/')) {
                $org_img = File::makeDirectory('images/partner_trip_photos/', 0777, true);
            }

            // loop through each image to save and upload
            foreach($images as $key => $image) {
                
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/partner_trip_photos/' . $filename;

                $path[$key] = $org_path;

                if (($org_img ) == true) {
                   Image::make($image)->fit(640, 640, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                }

            }
            $stringpath = implode(',', $path);
            $trip->image = $stringpath;
        }

        else {
            return redirect('admin/partnertrip/create')
                        ->withErrors('You need to upload at least 1 image.');
        }

        $trip->save();

        return redirect()->intended('admin/partnertrip')->with('status','Your ads has been submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trip = PartnerTrip::find($id);
        $agencies = Agency::all();
        $facilities = Facility::all();

        $agencyArray = [];
        $facilitiesArray = [];

        foreach ($agencies as $key => $agency) {
            foreach (explode(',', $trip->agency) as $checked) {
                if ($agency->name === $checked) {
                    $agencyArray[$key] = 'checked'; 

                    continue 2;
                }
            }
            $agencyArray[$key] = NULL;
        }

        foreach ($facilities as $key => $facility) {
            foreach (explode(',', $trip->facility) as $checked) {
                if ($facility->name === $checked) {
                    $facilityArray[$key] = 'checked'; 

                    continue 2;
                }
            }
            $facilityArray[$key] = NULL;
        }

        return view('admin/advertisement/partnertrip/detail',compact('trip','agencies','facilities','agencyArray','facilityArray'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trip = PartnerTrip::find($id);
        $agencies = Agency::all();
        $facilities = Facility::all();

        $agencyArray = [];
        $facilitiesArray = [];

        foreach ($agencies as $key => $agency) {
            foreach (explode(',', $trip->agency) as $checked) {
                if ($agency->name === $checked) {
                    $agencyArray[$key] = 'checked'; 

                    continue 2;
                }
            }
            $agencyArray[$key] = NULL;
        }

        foreach ($facilities as $key => $facility) {
            foreach (explode(',', $trip->facility) as $checked) {
                if ($facility->name === $checked) {
                    $facilityArray[$key] = 'checked'; 

                    continue 2;
                }
            }
            $facilityArray[$key] = NULL;
        }

        return view('admin/advertisement/partnertrip/edit',compact('trip','agencies','facilities','agencyArray','facilityArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->Validator($request->all())->validate();

        $trip = PartnerTrip::find($id);

        $trip->name = $request->input('name');
        $trip->description = $request->input('description');
        $trip->price = $request->input('price');
        $trip->location = $request->input('location');
        $trip->address = $request->input('address');
        $trip->since = $request->input('since');

        if ($request->has('agency')) {
            $trip->agency = implode(',', $request->input('agency'));
        }
        else{
            $trip->agency =  'Not related to any registered agencies.';
        }

        if ($request->has('facility')) {
            $trip->facility = implode(',', $request->input('facility'));
        }
        else{
            $trip->facility =  'None';
        }

        if ($request->hasFile('logo')) {
            $image = $trip->logo;
            File::delete($image);

            $avatar = $request->file('logo');  

            $dir_img = true;

            $filename = rand(1111,9999).time().'.'.$avatar->getClientOriginalExtension();
            $image_path = 'images/company_logo/'.$filename;

            Image::make($avatar)
                ->fit(640,640,function($constraint){
                    $constraint->upsize();
                })
                ->save($image_path);

            $trip->logo = $image_path;
        }

        if ($request->hasFile('image')) {
            $imagearray = explode(',', $trip->image);
            foreach ($imagearray as $image) {
                File::delete($image);
            }

            $images = $request->file('image');
 
            //setting flag for condition
            $org_img = true;

            $path = [];

            // loop through each image to save and upload
            foreach($images as $key => $image) {
                
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/partner_trip_photos/' . $filename;

                $path[$key] = $org_path;

                if (($org_img ) == true) {
                   Image::make($image)->fit(640, 640, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                }

            }
            $stringpath = implode(',', $path);
            $trip->image = $stringpath;
        }

        $trip->save();

        return redirect()->intended('admin/partnertrip')->with('status','Your ads has been edited successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = PartnerTrip::find($id);

        $imagearray = explode(',', $trip->image);
        foreach ($imagearray as $image) {
            File::delete($image);
        }
        
        File::delete($trip->logo);
        $trip->delete();
        return redirect('admin/partnertrip')->with('status', 'Ads Removed!');
    }
}
