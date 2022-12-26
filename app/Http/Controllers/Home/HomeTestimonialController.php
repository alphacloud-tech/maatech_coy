<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeTestimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class HomeTestimonialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = HomeTestimonial::latest()->paginate(10);
        return view("admin.testimonial.index", compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.testimonial.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:home_testimonials|max:50',
            'title' => 'required|unique:home_testimonials|max:20',
            'comment' => 'required|unique:home_testimonials|max:1000',
            'comment_image' => 'required|mimes:jpg,jpeg,png',

        ],[


            'name.required' => 'Please Input name ',
            'name.unique' => 'Testimonial ' . $request->name . ' Already Exist',
            'name.max' => 'Maximum Number is 50 Character',

            'title.required' => 'Please Input name ',
            'title.unique' => 'Testimonial ' . $request->title . ' Already Exist',
            'title.max' => 'Maximum Number is 20 Character',

            'comment.required' => 'Please Input Long Coment',
            'comment.unique' => 'Testimonial ' . $request->comment . ' Already Exist',
            'comment.max' => 'Maximum Number is 500 Character',

        ]);

        $comment_image = $request->file('comment_image');

        $name_gen = hexdec(uniqid()).'.'.$comment_image->getClientOriginalExtension();
        $upload_location = "images/comment_image/";

        Image::make($comment_image)->resize(280, 280)->save($upload_location.$name_gen);

        $image_save_location = $upload_location.$name_gen; // move the image

        HomeTestimonial::insert([
            'title' => $request->title,
            'name' => $request->name,
            'comment' => $request->comment,
            'comment_image' => $image_save_location,
            'created_at' => Carbon::now(),
        ]);



        return redirect()->route('admin.home.testimonial')->with('success', 'Home testimonial created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = HomeTestimonial::findOrFail($id);
        return view("admin.testimonial.edit", compact('testimonial'));
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
        //
        $validated = $request->validate([
            'name' => 'required|max:50',
            'title' => 'required|max:20',
            'comment' => 'required|max:500',

        ],[


            'name.required' => 'Please Input name ',
            'name.max' => 'Maximum Number is 50 Character',

            'title.required' => 'Please Input name ',
            'title.unique' => 'Testimonial ' . $request->title . ' Already Exist',
            'title.max' => 'Maximum Number is 20 Character',

            'comment.required' => 'Please Input Long Comment',
            'comment.max' => 'Maximum Number is 500 Character',

        ]);

        $testimonial = HomeTestimonial::findOrFail($id);


        $old_image = $request->old_image;

        $comment_image = $request->file('comment_image');

        if ($comment_image) {

            // laravel image intervention to resize image
            $name_gen = hexdec(uniqid()).'.'.$comment_image->getClientOriginalExtension();
            $upload_location = "images/comment_image/";

            Image::make($comment_image)->resize(280, 280)->save($upload_location.$name_gen);

            $image_save_location = $upload_location.$name_gen; // move the image



            if (!empty($old_image)) {
                # code...
                unlink($old_image);
            }


            $testimonial->update([
                'title' => $request->title,
                'name' => $request->name,
                'comment_image' => $image_save_location,
                'comment' => $request->comment,
            ]);
            return redirect()->route("admin.home.testimonial")->with('success', 'Home testimonial updated successfully with image');
        }else{
            $testimonial->update([
                'title' => $request->title,
                'name' => $request->name,
                'comment' => $request->comment,
            ]);

            return redirect()->route("admin.home.testimonial")->with('success', 'Home testimonial updated successfully without image');
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

        $image = HomeTestimonial::findOrFail($id); // find id image
        $old_image = $image->comment_image; // assign the field  name in db
        unlink($old_image); // delete it

        $testimonial = HomeTestimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->back()->with('success', 'Home testimonial Deleted Permanently');
    }
}
