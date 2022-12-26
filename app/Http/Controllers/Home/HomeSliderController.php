<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeSlider;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Image;

class HomeSliderController extends Controller
{

    public function __construct()
    {
        $this->middleware("adams");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sliders = HomeSlider::all();

        return view("admin.slider.index", compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.slider.create");
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
            'title' => 'required|unique:home_sliders|max:100',
            'short_title' => 'required|unique:home_sliders|max:50',
            'content' => 'required',
            'slider_image' => 'required|mimes:png,jpg,jpeg',
        ],[
            'title.required' => 'Please input slider title',
            'title.unique' => 'slider title already exists',
            'title.max' => 'slider title must not be more than 100 character',

            'short_title.required' => 'Please input slider short title',
            'short_title.unique' => 'slider short title already exists',
            'short_title.max' => 'slider short title must not be more than 50 character',

            'content.required' => 'Please input slider content',

            'slider_image.required' => 'Please input slider image',
            'slider_image.mimes' => 'slider image type not supported',
        ]);

        $slider_img = $request->file("slider_image");

        $name_gen = hexdec(uniqid()).'.'. $slider_img->getClientOriginalExtension();
        $upload_location = "images/sliders_images/";

        Image::make($slider_img)->resize(1920, 1080)->save($upload_location.$name_gen);

        $image_save_location = $upload_location.$name_gen;


        HomeSlider::insert([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'content' => $request->content,
            'slider_image' => $image_save_location,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route("admin.home.slider")->with('success', 'Slider create successfully');

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
        $slider = HomeSlider::findOrFail($id);
        // dd($slider);
        return view("admin.slider.edit", compact('slider'));
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
        $slider = HomeSlider::findOrFail($id);

        $old_image = $request->old_img; //

        $slider_img = $request->slider_image;


        if ($slider_img) {
            # code...
            $name_gen = hexdec(uniqid()).'.'. $slider_img->getClientOriginalExtension();
            $upload_location = "images/sliders_images/";

            Image::make($slider_img)->resize(1920, 1080)->save($upload_location.$name_gen);

            $image_save_location = $upload_location.$name_gen;

            if (!empty($old_image)) {
                # code...
                unlink($old_image);
            }

            $slider->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'content' => $request->content,
                'slider_image' => $image_save_location,
            ]);

            return redirect()->route("admin.home.slider")->with('success', 'Slider Updated successfully with Image');

        }else {

            $slider->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'content' => $request->content,
            ]);

            return redirect()->route("admin.home.slider")->with('success', 'Slider Updated successfully without Image');

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

        $image = HomeSlider::findOrFail($id);
        $old_image = $image->slider_image;

        unlink($old_image);

        $slider = HomeSlider::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Slider deleted successfully');

    }
}
