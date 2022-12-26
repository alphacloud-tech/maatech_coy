<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\MultiImage;
use App\Models\Home\ProjectMultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Image;

class MultiImageController extends Controller
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
        $multiImages = MultiImage::latest()->paginate(6);
        return view("admin.multi_image.index", compact('multiImages'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $multi_img = $request->file('img_name');

        foreach ($multi_img as $item) {

            $name_gen = hexdec(uniqid()).'.'.$item->getClientOriginalExtension();
            $upload_location = "images/multi_image/";

            Image::make($item)->resize(400, 250)->save($upload_location.$name_gen);

            $image_save_location = $upload_location.$name_gen; // move the image

            MultiImage::insert([
                'img_name' => $image_save_location,
                'created_at' => Carbon::now(),
            ]);
        } // end of foreach

        return redirect()->back()->with('success', 'Multi Image created successfully');
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
        $image = MultiImage::findOrFail($id);
        $old_image = $image->img_name;

        unlink($old_image);

        $slider = MultiImage::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'MultiImage deleted successfully');
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProject()
    {
        $multiImages = ProjectMultiImage::latest()->paginate(10);
        return view("admin.project.multi_image.index", compact('multiImages'));
    }

    public function storeProject(Request $request)
    {
        $multi_img = $request->file('project_multi_image_name');

        foreach ($multi_img as $item) {

            $name_gen = hexdec(uniqid()).'.'.$item->getClientOriginalExtension();
            $upload_location = "images/project_image/multi_image/";

            Image::make($item)->resize(1100, 755)->save($upload_location.$name_gen);

            $image_save_location = $upload_location.$name_gen; // move the image

            ProjectMultiImage::insert([
                'project_multi_image_name' => $image_save_location,
                'project_id' => 7,
                'created_at' => Carbon::now(),
            ]);
        } // end of foreach

        return redirect()->back()->with('success', 'Project Multi Image created successfully');
    }
}
