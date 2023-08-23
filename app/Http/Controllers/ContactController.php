<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return Contact::all();
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'description' => 'required|min:5'
        ]);

        Contact::create($attributes);
        return $attributes;
    }
}
