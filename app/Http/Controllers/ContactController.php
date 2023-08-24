<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'description' => 'required|min:50'
        ]);

        $user = Contact::create($attributes);

        Mail::to('soephyuphyuhtun99@gmail.com')->send(new \App\Mail\Mail(
            $user->name, $user->email, $user->phone, $user->description
        ));
        return $user;
    }
}
