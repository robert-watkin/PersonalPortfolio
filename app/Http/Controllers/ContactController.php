<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Mail\ContactMail;
use Log;
use Closure;

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
            'g-recaptcha-response' => ['required', function (string $attribute, mixed $value, Closure $fail) {
                $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
                    'secret' => env('CAPTCHA_SECRET_KEY'),
                    'response' => $value,
                    'remoteip' => \request()->ip()
                ]);
                if (!$g_response->json()['success']) {
                    $fail('Captcha verification failed.');
                }
            }],
            'name' => 'required',
            'email' => 'required|email',
            'email_message' => 'required'
        ]);

        // google recaptcha v3 assessment request and validation
        Log::debug('Contact form request for ' . $details['name'] . ' from ip ' . request()->ip());

        // send the email
        Mail::to($details['email'])->bcc(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($details));

        // redirect to the contact page with a success message
        return redirect()->route('contact.show')->with('success', 'Thank you for your message. It has been sent.');
    }
}
