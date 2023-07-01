<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    // display contact form
    public function show()
    {
        return view('contact');
    }

    // send contact form
    public function send(Request $request)
    {
        // validate the data
        $details = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // send the email
        Mail::to($details['email'])->send(new ContactMail($details));

        // redirect to the contact page with a success message
        return redirect()->route('contact.show')->with('success', 'Thank you for your message. It has been sent.');
    }
}
