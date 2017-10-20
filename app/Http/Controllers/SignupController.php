<?php

namespace App\Http\Controllers;

use Validator;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SignupSubmitted;
use Illuminate\Support\Facades\Mail;

class SignupController extends Controller
{
    public function submit(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:20',
            'theme' => 'required|max:20',
        ]);

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
            'theme' => 'united'
        ]);
    }
}
