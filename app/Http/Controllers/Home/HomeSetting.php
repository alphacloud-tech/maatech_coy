<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\Banner;
use App\Models\Home\Favicon;
use App\Models\Home\Logo;
use Illuminate\Http\Request;
use Image;

class HomeSetting extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $multiImages = MultiImage::latest()->paginate(6);
        return view("admin.settings.setting");
    }

    public function editBanner(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|mimes:png,jpg,jpeg',
        ],[
            'name.required' => 'Please choose banner image',
        ]);

        $banner = Banner::findOrFail($request->id);

        $old_image = $request->old_image;

        $banner_image = $request->file('name');

        if ($banner_image) {

            // laravel image intervention to resize image
            $name_gen = hexdec(uniqid()).'.'.$banner_image->getClientOriginalExtension();
            $upload_location = "images/banner/";

            Image::make($banner_image)->resize(1920, 1080)->save($upload_location.$name_gen);

            $image_save_location = $upload_location.$name_gen; // move the image



            if (!empty($old_image)) {
                # code...
                unlink($old_image);
            }


            $banner->update([
                'name' => $image_save_location,
            ]);

            return redirect()->back()->with('success', 'Home banner updated successfully');
        }
    }
    public function logo(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|mimes:png',
        ],[
            'name.required' => 'Please choose logo',
            'name.mimes' => 'only png images are allowed',
        ]);

        $logo = Logo::findOrFail($request->id);
        // dd($logo);

        $old_image = $request->old_image;
        // dd($old_image);
        $logo_image = $request->file('name');
        // dd($logo_image);
        if ($logo_image) {

            // laravel image intervention to resize image
            $name_gen = "logo".'.'.$logo_image->getClientOriginalExtension();

            $upload_location = "images/logo/";

            Image::make($logo_image)->resize(180, 28)->save($upload_location.$name_gen);

            $image_save_location = $upload_location.$name_gen; // move the image
            // dd($image_save_location);


            if (!empty($old_image)) {
                # code...
                unlink($old_image);
            }


            $logo->update([
                'name' => $image_save_location,
            ]);

            return redirect()->back()->with('success', 'Logo updated successfully');
        }
    }

    public function favicon(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|mimes:png,jpg,jpeg',
        ],[
            'name.required' => 'Please choose favicon',
        ]);

        $favicon = Favicon::findOrFail($request->id);

        $old_image = $request->old_image;

        $favicon_image = $request->file('name');

        if ($favicon_image) {

            // laravel image intervention to resize image
            $name_gen = "favicon".'.'.$favicon_image->getClientOriginalExtension();
            $upload_location = "images/favicon/";

            Image::make($favicon_image)->resize(72, 72)->save($upload_location.$name_gen);

            $image_save_location = $upload_location.$name_gen; // move the image



            if (!empty($old_image)) {
                # code...
                unlink($old_image);
            }


            $favicon->update([
                'name' => $image_save_location,
            ]);

            return redirect()->back()->with('success', 'favicon updated successfully');
        }
    }

}
