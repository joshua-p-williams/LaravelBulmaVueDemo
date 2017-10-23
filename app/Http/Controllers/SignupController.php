<?php

namespace App\Http\Controllers;

use Validator;
use Response;
use App\Signup;
use App\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SignupSubmitted;
use Illuminate\Support\Facades\Mail;

class SignupController extends Controller
{
    public function submit(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:signups,email|max:100',
            'name' => 'required|max:100',
            'theme' => 'required|max:20',
        ]);

        // Store it in the database
        $signup = Signup::create($validatedData);

        /**
         * Mailable generated with
         * php artisan make:mail SignupSubmitted --markdown=emails.signup.submitted
         */
        Mail::to("me@earth.com")->send(new SignupSubmitted($validatedData));

        return $signup;
    }

    /**
     * Handle an image upload
     *
     * @param Request $request
     * @return void
     */
    public function uploadImage(Request $request) {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'signup_id' => 'exists:signups,id',
            'type' => 'required|max:50',
            'email' => 'required|email|max:100',
        ]);

        $image = null;

        $signup = Signup::ByEmail($validatedData['email'])->first();

        if ($signup && $signup->id === (int)$validatedData['signup_id']) {
            $img = $validatedData['signup_id'] . '_' . time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $img);
            
            $image = Image::create([
                'type' => $validatedData['type'], 
                'filename' => $img, 
                'signup_id' => $validatedData['signup_id'],
            ]);
        }
        
        return $image;
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
            'theme' => 'united',
        ]);
    }
}
