<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Get the admin user
        $admin = User::where('user_alias', 'admin')->first();

        // Send email to admin if found
        if ($admin) {
            // passing the data to the Mailable class app\Mail\ContactFormMail.php
            Mail::to($admin->email)->send(
                new ContactFormMail(
                    $validated['name'],
                    $validated['email'],
                    $validated['message']
                )
            );
        }

        return redirect()->route('contact.show')
            ->with('status', 'Thank you for your message! We will get back to you soon.');
    }
}
