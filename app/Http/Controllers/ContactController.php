<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Session;

class ContactController extends Controller
{
    // public function Contact()
    // {
    //     $contact = Contact::get();
    //     Session::flash('page', 'contact');
    //     return view('layouts.front_layout.front_footer', compact('contact'));
    // }

    public function addContact(Request $request)
    {
      
           $data = $request->all();
            $contacts = new Contact;
            $contacts->name = $data['name'];
            $contacts->phone = $data['phone'];
            $contacts->email = $data['email'];
            $contacts->description = $data['description'];
            $contacts->save();
            return redirect()->back()->with('success_message', 'Your message has been sent successfully!');
    }
}
