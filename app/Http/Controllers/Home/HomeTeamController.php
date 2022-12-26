<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeTeam;
use Illuminate\Http\Request;

use Image;
use Carbon\Carbon;

class HomeTeamController extends Controller
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
        $teams = HomeTeam::latest()->paginate(10);
        return view("admin.team.index", compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.team.create");
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
            'name' => 'required',
            'title' => 'required',
            'team_image' => 'required|mimes:jpg,jpeg,png',
            'description' => 'required',

        ]);


        $team_image = $request->file('team_image');

        $name_gen = hexdec(uniqid()).'.'.$team_image->getClientOriginalExtension();
        $upload_location = "images/team_image/";

        Image::make($team_image)->resize(722, 860)->save($upload_location.$name_gen);

        $image_save_location = $upload_location.$name_gen; // move the image

        HomeTeam::insert([
            'name' => $request->name,
            'title' => $request->title,
            'linkedin' => $request->linkedin,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'description' => $request->description,
            'team_image' => $image_save_location,
            'created_at' => Carbon::now(),
        ]);



        return redirect()->route('admin.home.team')->with('success', 'Home team created successfully');
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
        $team = HomeTeam::findOrFail($id);
        return view("admin.team.edit", compact('team'));
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
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',

        ]);

        $team = HomeTeam::findOrFail($id);

        $old_image = $request->old_image;

        $team_image = $request->file('team_image');

        if ($team_image) {

            // laravel image intervention to resize image
            $name_gen = hexdec(uniqid()).'.'.$team_image->getClientOriginalExtension();
            $upload_location = "images/team_image/";

            Image::make($team_image)->resize(1100, 755)->save($upload_location.$name_gen);

            $image_save_location = $upload_location.$name_gen; // move the image



            if (!empty($old_image)) {
                # code...
                unlink($old_image);
            }


            $team->update([
                'name' => $request->name,
                'title' => $request->title,
                'linkedin' => $request->linkedin,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'description' => $request->description,
                'team_image' => $image_save_location,

            ]);

            return redirect()->route("admin.home.team")->with('success', 'Home team updated successfully with image');
        }else{
            $team->update([
                'name' => $request->name,
                'title' => $request->title,
                'linkedin' => $request->linkedin,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'description' => $request->description,
            ]);


            return redirect()->route("admin.home.team")->with('success', 'Home team Updated successfully without Image');
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
        $image = HomeTeam::findOrFail($id); // find id image
        $old_image = $image->team_image; // assign the field  name in db
        unlink($old_image); // delete it

        $project = HomeTeam::findOrFail($id);
        $project->delete();

        return redirect()->back()->with('success', 'Home team Deleted Permanently');

    }
}
