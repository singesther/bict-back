<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Http\Request;
use Session;
use Purifier;
use Mail;
use Auth;
use Input;
use Response;
use Validator;


class ContactController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','role:admin'], ['except' => 'store']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), [
            'name' => 'required|min:3|max:25',
            'email' => 'required|email|max:100',
            'tel' => 'nullable|min:4',
            'subject' => 'min:3|string',
            'message' => 'required|min:10|max:255'
        ]);


        if ($validator->fails()) {
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->tel = $request->tel;
            $contact->subject = Purifier::clean($request->subject);
            $contact->message = Purifier::clean($request->message);
            $contact->save();

            return response()->json($contact);
        }
    }
}
