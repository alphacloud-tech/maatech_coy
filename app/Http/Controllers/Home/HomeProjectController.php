<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeProject;
use App\Models\Home\ProjectMultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class HomeProjectController extends Controller
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
        $projects = HomeProject::latest()->paginate(10);
        return view("admin.project.index", compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.project.create");
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
            'title_1' => 'required',
            'title_2' => 'required',
            'project_image' => 'required|mimes:jpg,jpeg,png',
            'project_icon' => 'required',
            'project_type' => 'required',
            'description' => 'required',

        ]);


        $project_image = $request->file('project_image');

        $name_gen = hexdec(uniqid()).'.'.$project_image->getClientOriginalExtension();
        $upload_location = "images/project_image/thumbnail/";

        Image::make($project_image)->resize(1100, 755)->save($upload_location.$name_gen);

        $image_save_location = $upload_location.$name_gen; // move the image

        $project_id = HomeProject::insertGetId([
            'title_1' => $request->title_1,
            'title_2' => $request->title_2,
            'client' => $request->client,
            'category' => $request->category,
            'project_type' => $request->project_type,
            'description' => $request->description,
            'project_image' => $image_save_location,
            'project_icon' => $request->project_icon,
            'created_at' => Carbon::now(),
        ]);

         //////////////////// start multi image upload //////////////////////////

         $images = $request->file('multi_img');

         foreach ($images as $img) {

             $make_name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
             Image::make($img)->resize(1100, 755)->save('images/project_image/multi_image/'.$make_name_gen);
             $upload_save_url = 'images/project_image/multi_image/'.$make_name_gen;

             ProjectMultiImage::insert([
                 'project_id'    => $project_id,
                 'project_multi_image_name'    => $upload_save_url,
                 'created_at'    => Carbon::now()
             ]);

         }

         //////////////////// end multi image upload //////////////////////////




        return redirect()->route('admin.home.project')->with('success', 'Home project created successfully');
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
        $project       = HomeProject::findOrFail($id);
        $multiImgs     = ProjectMultiImage::where('project_id', $id)->get();
        return view("admin.project.edit", compact('project', 'multiImgs'));
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
        $validated = $request->validate([
            'title_1' => 'required',
            'title_2' => 'required',
            'project_icon' => 'required',
            'project_type' => 'required',
            'description' => 'required',

        ]);

        $project = HomeProject::findOrFail($id);

        // $old_image = $request->old_image;

        // $project_image = $request->file('project_image');

        // if ($project_image) {

        //     // laravel image intervention to resize image
        //     $name_gen = hexdec(uniqid()).'.'.$project_image->getClientOriginalExtension();
        //     $upload_location = "images/project_image/";

        //     Image::make($project_image)->resize(1100, 755)->save($upload_location.$name_gen);

        //     $image_save_location = $upload_location.$name_gen; // move the image



        //     if (!empty($old_image)) {
        //         # code...
        //         unlink($old_image);
        //     }


        //     $project->update([
        //         'title_1' => $request->title_1,
        //         'title_2' => $request->title_2,
        //         'client' => $request->client,
        //         'category' => $request->category,
        //         'project_type' => $request->project_type,
        //         'description' => $request->description,
        //         'project_image' => $image_save_location,
        //         'project_icon' => $request->project_icon,
        //     ]);

        //     return redirect()->route("admin.home.project")->with('success', 'Home project updated successfully with image');
        // }else{
        //     $project->update([
        //         'title_1' => $request->title_1,
        //         'title_2' => $request->title_2,
        //         'client' => $request->client,
        //         'category' => $request->category,
        //         'project_type' => $request->project_type,
        //         'description' => $request->description,
        //         'project_icon' => $request->project_icon,
        //     ]);

        //     return redirect()->route("admin.home.project")->with('success', 'Home project Updated successfully without Image');

        // }

        $project->update([
            'title_1' => $request->title_1,
            'title_2' => $request->title_2,
            'client' => $request->client,
            'category' => $request->category,
            'project_type' => $request->project_type,
            'description' => $request->description,
            'project_icon' => $request->project_icon,
        ]);


        return redirect()->route("admin.home.project")->with('success', 'Home project Updated successfully without Image');

    }


    public function updateThumbnailImage(Request $request)
    {

        $project_id = $request->project_thumbnail_id;
        $oldimage = $request->old_img;
        if ($request->file('project_image')) {

            unlink($oldimage);
            // dd($img_ids);
            $thumbnail_image = $request->file('project_image');

            $make_thumbnail_name_gen = hexdec(uniqid()).'.'.$thumbnail_image->getClientOriginalExtension();
            Image::make($thumbnail_image)->resize(1100, 755)->save('images/project_image/thumbnail/'.$make_thumbnail_name_gen);
            $thumbnail_img_save_url = 'images/project_image/thumbnail/'.$make_thumbnail_name_gen;

            HomeProject::findOrFail($project_id)->update([
                'project_image'    => $thumbnail_img_save_url,
                'updated_at'    => Carbon::now()
            ]);
        }else {
            $thumbnail_image = $request->file('project_image');

            $make_thumbnail_name_gen = hexdec(uniqid()).'.'.$thumbnail_image->getClientOriginalExtension();
            Image::make($thumbnail_image)->resize(1100, 755)->save('images/project_image/thumbnail/'.$make_thumbnail_name_gen);
            $thumbnail_img_save_url = 'images/project_image/thumbnail/'.$make_thumbnail_name_gen;

            HomeProject::findOrFail($project_id)->update([
                'project_image'    => $thumbnail_img_save_url,
                'updated_at'    => Carbon::now()
            ]);
        }


        $notification = array(
            'message' => 'Project Thumbnail Image updated successfully',
            'alert-type' => 'info'

        );

        return redirect()->back()->with($notification);
    } // end updateThumbnailImage method


     //  updateMultiImage the specified resource in storage.

     public function updateMultiImage(Request $request)
     {

         $img_ids = $request->multi_img; // multi_img - from edit.blade.php input field for edit multi images

         // dd($img_ids);

         foreach ($img_ids as $id => $img_id) {

             $imageDel = ProjectMultiImage::findOrFail($id);
             unlink($imageDel->project_multi_image_name);

             $make_multi_name_gen = hexdec(uniqid()).'.'.$img_id->getClientOriginalExtension();
             Image::make($img_id)->resize(1100, 755)->save('images/project_image/multi_image/'.$make_multi_name_gen);
             $multi_img_save_url = 'images/project_image/multi_image/'.$make_multi_name_gen;

             ProjectMultiImage::where('id', $id)->update([
                 'project_multi_image_name'    => $multi_img_save_url,
                 'updated_at'    => Carbon::now()
             ]);

         }// end foreach

         $notification = array(
             'message' => 'Project MultiImage updated successfully',
             'alert-type' => 'info'

         );

         return redirect()->back()->with($notification);

     } // end updateMultiImage method

     /**
      * deleteMultiImage the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function deleteMultiImage($id)
     {
         $old_multi_image_id = ProjectMultiImage::findOrFail($id);
         unlink($old_multi_image_id->project_multi_image_name);

         ProjectMultiImage::findOrFail( $id)->delete();

         $notification = array(
             'message' => 'Project MultiImage Image deleted successfully',
             'alert-type' => 'success'

         );

         return redirect()->back()->with($notification);
     }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $image = HomeProject::findOrFail($id); // find id image
        // $old_image = $image->project_image; // assign the field  name in db
        // unlink($old_image); // delete it

        // $project = HomeProject::findOrFail($id);
        // $project->delete();

        // return redirect()->back()->with('success', 'Home project Deleted Permanently');

        $old_thumbnail_image_id = HomeProject::findOrFail($id);
        unlink($old_thumbnail_image_id->project_image);
        HomeProject::findOrFail( $id)->delete();

        $old_multi_image_ids = ProjectMultiImage::where('project_id', $id)->get();
        foreach ($old_multi_image_ids as $image) {
            # code...
            unlink($image->project_multi_image_name);
            ProjectMultiImage::where('project_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Project deleted successfully with MultiImage Image and thumbnail_image',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);

    }
}
