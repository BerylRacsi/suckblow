<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use File;
use Image;
use App\UserTrip;

class UserTripController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required','max:255'],
            'price' => ['required','numeric','max:1000000000000','min:100'],
            'location' => ['required','string'],
            'duration' => ['required','numeric','max:100','min:1'],

            'itinerary' => 'image|mimes:jpeg,png,jpg|max:1024',
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
        $trips = UserTrip::all();

        return view('usertrip/index',compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usertrip/create');
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

        $trip = new UserTrip;

        $trip->name = $request->input('name');
        $trip->description = $request->input('description');
        $trip->price = $request->input('price');
        $trip->location = $request->input('location');
        $trip->length = $request->input('length');

        if ($request->hasFile('itinerary')) {

            $avatar = $request->file('itinerary');  

            $dir_img = true;

            if( ! File::exists('images/itinerary/')) {
                $dir_img = File::makeDirectory('images/itinerary/', 0777, true);
            }

            $filename = rand(1111,9999).time().'.'.$avatar->getClientOriginalExtension();
            $image_path = 'images/itinerary/'.$filename;

            Image::make($avatar)
                ->fit(640,640,function($constraint){
                    $constraint->upsize();
                })
                ->save($image_path);

            $trip->itinerary = $image_path;
        }

        if ($request->hasFile('image')) {
            $images = $request->file('image');
 
            //setting flag for condition
            $org_img = true;

            $path = [];
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/user_trip_photos/')) {
                $org_img = File::makeDirectory('images/user_trip_photos/', 0777, true);
            }

            // loop through each image to save and upload
            foreach($images as $key => $image) {
                
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/user_trip_photos/' . $filename;

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
            return redirect('usertrip/create')
                        ->withErrors('You need to upload at least 1 image.');
        }
        $trip->save();

        return redirect()->intended('usertrip')->with('status','Your ads has been submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trip = UserTrip::find($id);

        return view('usertrip/detail',compact('trip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trip = UserTrip::find($id);

        return view('usertrip/edit',compact('trip'));
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
        $trip = UserTrip::find($id);

        $trip->name = $request->input('name');
        $trip->description = $request->input('description');
        $trip->price = $request->input('price');
        $trip->location = $request->input('location');
        $trip->length = $request->input('length');

        if ($request->hasFile('itinerary')) {

            $image = $trip->itinerary;
            File::delete($image);

            $avatar = $request->file('itinerary');  

            $dir_img = true;

            $filename = rand(1111,9999).time().'.'.$avatar->getClientOriginalExtension();
            $image_path = 'images/itinerary/'.$filename;

            Image::make($avatar)
                ->fit(640,640,function($constraint){
                    $constraint->upsize();
                })
                ->save($image_path);

            $trip->itinerary = $image_path;
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
                $org_path = 'images/user_trip_photos/' . $filename;

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

        return redirect()->intended('usertrip')->with('status','Your ads has been edited successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = UserTrip::find($id);

        $imagearray = explode(',', $trip->image);
        foreach ($imagearray as $image) {
            File::delete($image);
        }
        
        File::delete($trip->itinerary);
        $trip->delete();
        return redirect('usertrip')->with('status', 'Ads Removed!');
    }
}
