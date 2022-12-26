<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeAbout;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Image;

class HomeAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $abouts = HomeAbout::all();
        return view("admin.about.index", compact("abouts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.about.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'coy_name' => 'required|unique:home_abouts|max:30',
            'title' => 'required|max:50',
            'content_long' => 'required|max:500',
            'content_short' => 'required|max:400',
            'coy_yr_exp' => 'required|max:200',
            'yr_founded' => 'required|max:4',
            'about_image' => 'required|mimes:png,jpg,jpeg',
        ],[
            'coy_name.required' => 'Please input Company name',
            'coy_name.unique' => 'Company name already exists',
            'coy_name.max' => 'Company name must not be more than 10 character',

            'title.required' => 'Please input About title',
            'title.max' => 'About title must not be more than 50 character',

            'content_long.required' => 'Please input About Long content',
            'content_long.max' => 'About Long content must not be more than 500 character',

            'content_short.required' => 'Please input About Short content',
            'content_short.max' => 'About Short content must not be more than 200 character',

            'coy_yr_exp.required' => 'Please input About Experience',
            'coy_yr_exp.max' => 'About Experience must not be more than 100 character',

            'yr_founded.required' => 'Please input Year Founded',
            'yr_founded.max' => 'Year Founded must not be more than 4 Digit',

            'about_image.required' => 'Please input About image',
            'about_image.mimes' => 'About image type not supported',
        ]);

        $about_img = $request->file("about_image");
        // adams.jpg
        $name_gen = hexdec(uniqid()).'.'. $about_img->getClientOriginalExtension();

        $upload_location = "images/abouts_images/";

        Image::make($about_img)->resize(1080, 925)->save($upload_location.$name_gen);

        $image_save_location = $upload_location.$name_gen;


        HomeAbout::insert([

            'coy_name' => $request->coy_name,
            'title' => $request->title,
            'content_long' => $request->content_long,
            'content_short' => $request->content_short,
            'coy_yr_exp' => $request->coy_yr_exp,
            'yr_founded' => $request->yr_founded,
            'about_image' => $image_save_location,

            'created_at' => Carbon::now(),
        ]);

        return redirect()->route("admin.home.about")->with('success', 'Home About create successfully');

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
        //
        $aboutData = HomeAbout::findOrFail($id);

        return view("admin.about.edit", compact("aboutData"));
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

        {
            //
            $about = HomeAbout::findOrFail($id);

            $old_image = $request->old_image; // unlink

            $about_img = $request->about_image;


            if ($about_img) {
                # code...
                $name_gen = hexdec(uniqid()).'.'. $about_img->getClientOriginalExtension();

                $upload_location = "images/abouts_images/";

                Image::make($about_img)->resize(1080, 925)->save($upload_location.$name_gen);

                $image_save_location = $upload_location.$name_gen;

                if (!empty($old_image)) {
                    # code...
                    unlink($old_image);
                }

                $about->update([
                    'coy_name' => $request->coy_name,
                    'title' => $request->title,
                    'content_long' => $request->content_long,
                    'content_short' => $request->content_short,
                    'coy_yr_exp' => $request->coy_yr_exp,
                    'yr_founded' => $request->yr_founded,
                    'about_image' => $image_save_location,
                ]);

                return redirect()->route("admin.home.about")->with('success', 'About Updated successfully with Image');

            }else {

                $about->update([
                    'coy_name' => $request->coy_name,
                    'title' => $request->title,
                    'content_long' => $request->content_long,
                    'content_short' => $request->content_short,
                    'coy_yr_exp' => $request->coy_yr_exp,
                    'yr_founded' => $request->yr_founded,
                ]);

                return redirect()->route("admin.home.about")->with('success', 'About Updated successfully without Image');

            }

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
        //

        $image = HomeAbout::findOrFail($id);
        $old_image = $image->about_image;

        unlink($old_image);

        $slider = HomeAbout::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'About deleted successfully');
    }
}
