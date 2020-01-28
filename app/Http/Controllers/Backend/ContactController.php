<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Http\Request;
use Session;
use Purifier;

class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //create a variable and store all the blog posts in it from the database
      $contacts = Contact::orderBy('id','desc')->paginate(10);
      //return a view and pass in the above variable
      return view('backend.contacts.index')->withContacts($contacts);
    }

    public function test()
    {
      return view('testcontact');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|min:3|max:25',
            'email' => 'required|email|max:100',
            'tel' => 'nullable|min:4',
            'subject' => 'min:3|string',
            'message' => 'required|min:10|max:255'
        ));

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->tel = $request->tel;
        $contact->subject = Purifier::clean($request->subject);
        $contact->message = Purifier::clean($request->message);

        $contact->save();

        Session::flash('success', 'Thank you for your message. We will respond you as soon as possible');

        return back();

        // return response()->json($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('backend.contacts.show')->withContact($contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->delete();

        return response()->json(['success'=> $contact->name. '\'s message was successfully deleted.']);
    }
}
