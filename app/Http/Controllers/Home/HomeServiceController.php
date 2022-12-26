<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class HomeServiceController extends Controller
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
        //
        $services = HomeService::latest()->paginate(10);
        return view("admin.service.index", compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.service.create");
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

        $validated = $request->validate([
            'title' => 'required|unique:home_services|max:50',
            'service_image' => 'required|mimes:jpg,jpeg,png',
            'service_icon' => 'required',
            'long_description' => 'required|unique:home_services|max:700',

        ],[


            'title.required' => 'Please Input Title ',
            'title.unique' => 'Service ' . $request->title . ' Already Exist',
            'title.max' => 'Maximum Number is 50 Character',

            'long_description.required' => 'Please Input Long Description',
            'long_description.unique' => 'Service ' . $request->long_description . ' Already Exist',
            'long_description.max' => 'Maximum Number is 700 Character',

            'service_image.required' => 'Please Choose Slider Icon',
            'service_image.mimes' => 'Service Icon type not allowed',
        ]);


        $service_image = $request->file('service_image');

        $name_gen = hexdec(uniqid()).'.'.$service_image->getClientOriginalExtension();
        $upload_location = "images/service_image/";

        Image::make($service_image)->resize(1100, 755)->save($upload_location.$name_gen);

        $image_save_location = $upload_location.$name_gen; // move the image

        HomeService::insert([
            'title' => $request->title,
            'long_description' => $request->long_description,
            'service_image' => $image_save_location,
            'service_icon' => $request->service_icon,
            'created_at' => Carbon::now(),
        ]);



        return redirect()->route('admin.home.service')->with('success', 'Home Service created successfully');
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
        // $service = HomeService::findOrFail($id);
        // return view("frontend.pages.service_detail", compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = HomeService::findOrFail($id);
        return view("admin.service.edit", compact('service'));
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
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'long_description' => 'required|max:700',
            'service_icon' => 'required',
        ],[
            'title.required' => 'Please Input Service Title',
            'title.max' => 'Maximum Number is 500 Character',

            'long_description.required' => 'Please Input Content',
            'long_description.max' => 'Maximum Number is 500 Character',


        ]);

        $service = HomeService::findOrFail($id);

        $old_image = $request->old_image;

        $service_image = $request->file('service_image');

        if ($service_image) {

            // laravel image intervention to resize image
            $name_gen = hexdec(uniqid()).'.'.$service_image->getClientOriginalExtension();
            $upload_location = "images/service_image/";

            Image::make($service_image)->resize(1100, 755)->save($upload_location.$name_gen);

            $image_save_location = $upload_location.$name_gen; // move the image



            if (!empty($old_image)) {
                # code...
                unlink($old_image);
            }


            $service->update([
                'title' => $request->title,
                'long_description' => $request->long_description,
                'service_icon' => $request->service_icon,
                'service_image' => $image_save_location,
            ]);

            return redirect()->route("admin.home.service")->with('success', 'Home Service updated successfully with image');
        }else{
            $service->update([
                'title' => $request->title,
                'long_description' => $request->long_description,
                'service_icon' => $request->service_icon,
            ]);


            return redirect()->route("admin.home.service")->with('success', 'Home Service Updated successfully without Image');
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
        $image = HomeService::findOrFail($id); // find id image
        $old_image = $image->service_image; // assign the field  name in db
        unlink($old_image); // delete it

        $service = HomeService::findOrFail($id);
        $service->delete();

        return redirect()->back()->with('success', 'Home Service Deleted Permanently');

    }
}
