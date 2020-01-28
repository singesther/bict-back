<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Maillist;
use Illuminate\Http\Request;
use Purifier;
use Mail;
use Auth;
use Input;
use Response;
use Validator;

class MaillistController extends Controller
{

  public function store(Request $request)
  {
      $validator = Validator::make(Input::all(), [
        'email' => 'required|email|max:255|unique:maillist,email',
      ]);

      if ($validator->fails()) {
        return Response::json(array(
            'errors' => $validator->getMessageBag()->toArray(),
        ));
      } else {

        $subscriber = new Maillist;
        $subscriber->email = $request->email;
        $subscriber->subscribed = true;
        $subscriber->save();

        return response()->json($subscriber);
      }
  }

}
