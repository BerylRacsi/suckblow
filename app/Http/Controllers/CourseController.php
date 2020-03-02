<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use File;
use Image;
use App\Course;
use App\Agency;

class CourseController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'agency' => ['required','string'],
            'diver' => ['required','string', 'max:50'],
            'center' => ['required','string', 'max:255'],

            'open' => ['boolean'],
            'advance' => ['boolean'],
            'rescue' => ['boolean'],
            'master' => ['boolean'],
            'instructor' => ['boolean'],

            'total' => ['required','numeric','max:35000','min:1'],
            'since' => ['required','numeric','max:2020','min:1900'],

            'fb' => ['required', 'string', 'max:50'],
            'ig' => ['required', 'string', 'max:50'],

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
        $courses = Course::all();

        if(Auth::guard('admin')->check()){   
            return view ('admin/advertisement/course/index',compact('courses'));
        }
        else if(Auth::guard('partner')->check()){
            $url = "partner";
            return view('course/index',compact('url','courses'));
        }
        else{
            $url = "user";
            return view('course/index',compact('url','courses'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::all();

        if(Auth::guard('admin')->check()){   
            return view ('admin/advertisement/course/create',compact('agencies'));
        }
        else if(Auth::guard('partner')->check()){
            $url = "partner";
            return view('course/create',compact('url','agencies'));
        }
        else{
            $url = "user";
            return view('course/create',compact('url','agencies'));
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
        $this->Validator($request->all())->validate();

        $course = new Course;
        $course->name = $request->input('name');
        $course->agency = $request->input('agency');
        $course->diver = $request->input('diver');
        $course->center = $request->input('center');
        $course->open = $request->has('qual1');
        $course->advance = $request->has('qual2');
        $course->rescue = $request->has('qual3');
        $course->master = $request->has('qual4');
        $course->instructor = $request->has('qual5');
        $course->total = $request->input('total');
        $course->since = $request->input('since');
        $course->ig = $request->input('ig');
        $course->fb = $request->input('fb');

        if ($request->hasFile('image')) {
            $avatar = $request->file('image');

            $dir_img = true;

            if( ! File::exists('images/diver_avatar/')) {
                $dir_img = File::makeDirectory('images/diver_avatar/', 0777, true);
            }

            $filename = rand(1111,9999).time().'.'.$avatar->getClientOriginalExtension();
            $image_path = 'images/diver_avatar/'.$filename;

            Image::make($avatar)
                ->fit(640,640,function($constraint){
                    $constraint->upsize();
                })
                ->save($image_path);
            
            $course->image = $image_path;
        }
        else{
            if(Auth::guard('admin')->check()){
                return redirect('admin/course/create')
                    ->withErrors('You need to upload an image.');
            }
            else if(Auth::guard('partner')->check()){
                return redirect()->intended('partner/course/create')->withErrors('You need to upload an image.');
            }
            else{
                return redirect()->intended('user/course/create')->withErrors('You need to upload an image.');    
            }
        }

        $course->save();

        if(Auth::guard('admin')->check()){   
            return redirect()->intended('admin/course')->with('status','Your ads has been submitted.');
        }
        else if(Auth::guard('partner')->check()){
            return redirect()->intended('partner/course')->with('status','Your ads has been submitted.');
        }
        else{
            return redirect()->intended('user/course')->with('status','Your ads has been submitted.');
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
        $course = Course::find($id);

        if(Auth::guard('admin')->check()){   
            return view ('admin/advertisement/course/detail',compact('course'));
        }
        else if(Auth::guard('partner')->check()){
            $url = "partner";
            return view('course/detail',compact('url','course'));
        }
        else{
            $url = "user";
            return view('course/detail',compact('url','course'));
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
        $course = Course::find($id);
        $agencies = Agency::all();

        if(Auth::guard('admin')->check()){   
            return view ('admin/advertisement/course/create',compact('course','agencies'));
        }
        else if(Auth::guard('partner')->check()){
            $url = "partner";
            return view('course/edit',compact('url','course','agencies'));
        }
        else{
            $url = "user";
            return view('course/edit',compact('url','course','agencies'));
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
        $this->Validator($request->all())->validate();

        $course = Course::find($id);
        $course->name = $request->input('name');
        $course->agency = $request->input('agency');
        $course->diver = $request->input('diver');
        $course->center = $request->input('center');
        $course->open = $request->has('qual1');
        $course->advance = $request->has('qual2');
        $course->rescue = $request->has('qual3');
        $course->master = $request->has('qual4');
        $course->instructor = $request->has('qual5');
        $course->total = $request->input('total');
        $course->since = $request->input('since');
        $course->ig = $request->input('ig');
        $course->fb = $request->input('fb');
        

        if ($request->hasFile('image')) {

            $image = $course->image;
            File::delete($image);

            $avatar = $request->file('image');  

            $filename = rand(1111,9999).time().'.'.$avatar->getClientOriginalExtension();
            $image_path = 'images/diver_avatar/'.$filename;

            Image::make($avatar)
                ->fit(640,640,function($constraint){
                    $constraint->upsize();
                })
                ->save($image_path);

            $course->image = $image_path;
        }

        $course->save();

        if(Auth::guard('admin')->check()){   
            return redirect()->intended('admin/course')->with('status','Ads edited successfuly.');
        }
        else if(Auth::guard('partner')->check()){
            return redirect()->intended('partner/course')->with('status','Ads edited successfuly.');
        }
        else{
            return redirect()->intended('user/course')->with('status','Ads edited successfuly.');
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
        $course = Course::find($id);
        $image = $course->image;

        File::delete($image);
        
        $course->delete();

        if(Auth::guard('admin')->check()){   
            return redirect()->intended('admin/course')->with('status','Ads removed.');
        }
        else if(Auth::guard('partner')->check()){
            return redirect()->intended('partner/course')->with('status','Ads removed.');
        }
        else{
            return redirect()->intended('user/course')->with('status','Ads removed.');
        }
    }
}
