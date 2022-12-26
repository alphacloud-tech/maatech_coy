<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\CoreValue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeCoreValue extends Controller
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
        $cores = CoreValue::latest()->paginate(10);
        return view("admin.coreValue.index", compact('cores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view("admin.coreValue.create");
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
            'title' => 'required|unique:core_values|max:50',
            'icon' => 'required',
            'content' => 'required|unique:core_values|max:700',

        ],[


            'title.required' => 'Please Input Title ',
            'title.unique' => 'Service ' . $request->title . ' Already Exist',
            'title.max' => 'Maximum Number is 50 Character',

            'content.required' => 'Please Input Long Description',
            'content.unique' => 'Service ' . $request->content . ' Already Exist',
            'content.max' => 'Maximum Number is 700 Character',

            'icon.required' => 'Please Choose Slider Icon',
        ]);

        CoreValue::insert([
            'title' => $request->title,
            'content' => $request->content,
            'icon' => $request->icon,
            'created_at' => Carbon::now(),
        ]);



        return redirect()->back()->with('success', 'Home core value created successfully');
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
        $core = CoreValue::findOrFail($id);
        return view("admin.coreValue.edit", compact('core'));
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
            'title' => 'required',
            'icon' => 'required',
            'content' => 'required',

        ],[


            'title.required' => 'Please Input Title ',
            'content.required' => 'Please Input Long Description',
            'icon.required' => 'Please Choose Slider Icon',
        ]);

        $core = CoreValue::findOrFail($id);
        $core->update([
            'title' => $request->title,
            'content' => $request->content,
            'icon' => $request->icon,
        ]);


        return redirect()->route("admin.home.core")->with('success', 'Home core value Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $core = CoreValue::findOrFail($id);
        $core->delete();

        return redirect()->back()->with('success', 'Home core value Deleted Permanently');
    }
}
