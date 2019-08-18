<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Mail\SubscribeMail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Events\NewSubscriberEvent;
use Spatie\Honeypot\ProtectAgainstSpam;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:subscribers'
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        event(new NewSubscriberEvent($subscriber));

        //register newsletter


        //notify on slack


        return redirect()->back()->with('message','You have successfully subscribed to our newsletter.');
    }
}
