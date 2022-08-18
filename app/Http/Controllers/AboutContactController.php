<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutContact;
use Session;

class AboutContactController extends Controller
{
    public function addAboutUsContact(Request $request)
    {
            $data = $request->all();
            $aboutContact = new AboutContact;
            $aboutContact->name = $data['name'];
            $aboutContact->email = $data['email'];
            $aboutContact->phone = $data['phone'];
            $aboutContact->address = $data['address'];
            $aboutContact->sex = $data['sex'];
            $aboutContact->age = $data['age'];
            $aboutContact->booking_date = $data['booking_date'];
            $aboutContact->pax = $data['pax'];
            $aboutContact->country = $data['country'];
            $aboutContact->trip = $data['trip'];
            $aboutContact->description = $data['description'];
            $aboutContact->save();
            return redirect()->back()->with('success_message', 'Your message has been sent successfully!');
    }

 
}
