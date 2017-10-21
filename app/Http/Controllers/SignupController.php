<?php

namespace App\Http\Controllers;

use Validator;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SignupSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Signup;

class SignupController extends Controller
{
    public function submit(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|max:100',
            'name' => 'required|max:100',
            'theme' => 'required|max:20',
        ]);

        // Store it in the database
        signup::create($validatedData);

        /**
         * Mailable generated with
         * php artisan make:mail SignupSubmitted --markdown=emails.signup.submitted
         */
        Mail::to("me@earth.com")->send(new SignupSubmitted($validatedData));
    }

    /**
     * Test the e-mail with
     * http://localhost:8000/api/signup/testEmail
     *
     * @return void
     */
    public function testEmail() {
        return new SignupSubmitted([
            'name' => 'Josh',
            'email' => 'me@earth.com',
            'theme' => 'united'
        ]);
    }
}
