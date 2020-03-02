<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use File;
use Image;
use App\Gear;

class GearController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required','max:255'],
            'price' => ['required','numeric','max:1000000000000','min:100'],
            'category' => ['required','string'],
            'link' => ['required', 'string', 'max:50'],
            'condition' => ['boolean'],
            'warranty' => ['boolean'],

            'image.*' => 'image|mimes:jpeg,png,jpg|max:1024'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gears = Gear::all();

        if(Auth::guard('admin')->check()){   
            return view ('admin/advertisement/gear/index',compact('gears'));
        }
        else if(Auth::guard('partner')->check()){
            $url = "partner";
            return view('gear/index',compact('url','gears'));
        }
        else{
            $url = "user";
            return view('gear/index',compact('url','gears'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::guard('admin')->check()){   
            return view ('admin/advertisement/gear/create');
        }
        else if(Auth::guard('partner')->check()){
            $url = "partner";
            return view('gear/create',compact('url'));
        }
        else{
            $url = "user";
            return view('gear/create',compact('url'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if (isset($request['condition']) && $request['condition'] == "true") {
            $request['condition'] = TRUE;
        }
        else{
            $request['condition'] = FALSE;
        }

        if (isset($request['warranty']) && $request['warranty'] == "true") {
            $request['warranty'] = TRUE;
        }
        else{
            $request['warranty'] = FALSE;
        }

        $this->Validator($request->all())->validate();

        $gear = new Gear;
        $gear->name = $request->input('name');
        $gear->description = $request->input('description');
        $gear->price = $request->input('price');
        $gear->condition = $request->input('condition');
        $gear->warranty = $request->input('warranty');
        $gear->link = $request->input('link');
        $gear->category = $request->input('category');

        if ($request->hasFile('image')) {
            $images = $request->file('image');
 
            //setting flag for condition
            $org_img = true;

            $path = [];
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/gear/')) {
                $org_img = File::makeDirectory('images/gear/', 0777, true);
            }

            // loop through each image to save and upload
            foreach($images as $key => $image) {
                
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/gear/' . $filename;

                $path[$key] = $org_path;

                if (($org_img ) == true) {
                   Image::make($image)->fit(640, 640, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                }
            }
            $stringpath = implode(',', $path);
            $gear->image = $stringpath;

        }

        else {
            if(Auth::guard('admin')->check()){
                return redirect('admin/gear/create')
                    ->withErrors('You need to upload at least 1 image.');
            }
            else if(Auth::guard('partner')->check()){
                return redirect()->intended('partner/gear/create')->withErrors('You need to upload at least 1 image.');
            }
            else{
                return redirect()->intended('user/gear/create')->withErrors('You need to upload at least 1 image.');    
            }
        }

        $gear->save();

        if(Auth::guard('admin')->check()){   
            return redirect()->intended('admin/gear')->with('status','Your ads has been submitted.');
        }
        else if(Auth::guard('partner')->check()){
            return redirect()->intended('partner/gear')->with('status','Your ads has been submitted.');
        }
        else{
            return redirect()->intended('user/gear')->with('status','Your ads has been submitted.');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gear = Gear::find($id);

        if(Auth::guard('admin')->check()){   
            return view('admin/advertisement/gear/detail',compact('gear'));
        }
        else if(Auth::guard('partner')->check()){
            $url = "partner";
            return view('gear/detail',compact('url','gear'));
        }
        else{
            $url = "user";
            return view('gear/detail',compact('url','gear'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gear = Gear::find($id);

        if(Auth::guard('admin')->check()){   
            return view('admin/advertisement/gear/edit',compact('gear'));
        }
        else if(Auth::guard('partner')->check()){
            $url = "partner";
            return view('gear/edit',compact('url','gear'));
        }
        else{
            $url = "user";
            return view('gear/edit',compact('url','gear'));
        }
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
        if (isset($request['condition']) && $request['condition'] == "true") {
            $request['condition'] = TRUE;
        }
        else{
            $request['condition'] = FALSE;
        }

        if (isset($request['warranty']) && $request['warranty'] == "true") {
            $request['warranty'] = TRUE;
        }
        else{
            $request['warranty'] = FALSE;
        }

        $this->Validator($request->all())->validate();

        $gear = Gear::find($id);
        $gear->name = $request->input('name');
        $gear->description = $request->input('description');
        $gear->price = $request->input('price');
        $gear->condition = $request->input('condition');
        $gear->warranty = $request->input('warranty');
        $gear->link = $request->input('link');
        $gear->category = $request->input('category');

        if ($request->hasFile('image')) {
            
            $imagearray = explode(',', $gear->image);
            foreach ($imagearray as $image) {
                File::delete($image);
            }

            $images = $request->file('image');

            $path = [];

            foreach($images as $key => $image) {
                
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/gear/' . $filename;

                $path[$key] = $org_path;

               Image::make($image)->fit(640, 640, function ($constraint) {
                    $constraint->upsize();
                })->save($org_path);

            }
            $stringpath = implode(',', $path);
            $gear->image = $stringpath;
        }
        
        $gear->save();

        if(Auth::guard('admin')->check()){   
            return redirect()->intended('admin/gear')->with('status','Ads edited successfuly.');
        }
        else if(Auth::guard('partner')->check()){
            return redirect()->intended('partner/gear')->with('status','Ads edited successfuly.');
        }
        else{
            return redirect()->intended('user/gear')->with('status','Ads edited successfuly.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gear = Gear::find($id);

        $imagearray = explode(',', $gear->image);
        foreach ($imagearray as $image) {
            File::delete($image);
        }

        $gear->delete();

        if(Auth::guard('admin')->check()){   
            return redirect()->intended('admin/gear')->with('status','Ads removed.');
        }
        else if(Auth::guard('partner')->check()){
            return redirect()->intended('partner/gear')->with('status','Ads removed.');
        }
        else{
            return redirect()->intended('user/gear')->with('status','Ads removed.');
        }
    }
}
