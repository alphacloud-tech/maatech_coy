<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeContact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeContactController extends Controller
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
        $contacts = HomeContact::all();
        return view("admin.contact.index", compact("contacts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.contact.create");
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
            'email_1' => 'required',
            'email_2' => 'required',
            'address' => 'required',
            'phone_1' => 'required',
            'phone_2' => 'required',
            'phone_3' => 'required',
            'phone_4' => 'required',

        ],[
            'email_1.required' => 'Please Input Email Address',
            'email_2.required' => 'Please Input Email Address',

            'phone_1.required' => 'Please Input Phone No ',
            'phone_2.required' => 'Please Input Phone No ',
            'phone_3.required' => 'Please Input Phone No ',
            'phone_4.required' => 'Please Input Phone No ',

            'address.required' => 'Please Input Address',

        ]);

        // start insert using eloquent

        HomeContact::insert([
            'email_1' => $request->email_1,
            'email_2' => $request->email_2,
            'phone_1' => $request->phone_1,
            'phone_2' => $request->phone_2,
            'phone_3' => $request->phone_3,
            'phone_4' => $request->phone_4,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);


        return redirect()->route('admin.contact')->with('success', 'Admin Contact created successfully');
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
        $contact = HomeContact::findOrFail($id);
        return view("admin.contact.edit", compact('contact'));
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
        HomeContact::findOrFail($id)->update([
            'email_1' => $request->email_1,
            'email_2' => $request->email_2,
            'phone_1' => $request->phone_1,
            'phone_2' => $request->phone_2,
            'phone_3' => $request->phone_3,
            'phone_4' => $request->phone_4,
            'address' => $request->address,
        ]);

        return redirect()->route("admin.contact")->with('success', 'Admin Contact Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HomeContact::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Admin Contact Deleted Permanently');
    }



    /**
     * HomeContactDisplay a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function HomeContact()
    // {
    //     //
    //     $contact = HomeContact::first();
    //     return view("pages.contact", compact("contact"));
    // }

    /**
     * ContactForm a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function ContactForm(Request $request)
    // {
    //     //

    //     HomeContact::insert([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'subject' => $request->subject,
    //         'message' => $request->message,
    //         'phone' => $request->phone,
    //         'created_at' => Carbon::now(),
    //     ]);


    //     return redirect()->back()->with('success', 'Your Message Send successfully');

    // }

    /**
     * AdminMessage a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminMessage()
    {
        //
        $messages = HomeContact::latest()->paginate(5);
        return view("admin.contact.message", compact("messages"));

    }

    /**
     * AdminDeleteMessage a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminDeleteMessage($id)
    {
        //
        HomeContact::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Message Deleted Permanently');

    }
}
