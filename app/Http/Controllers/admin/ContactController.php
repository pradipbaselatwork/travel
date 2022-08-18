<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use Session;


class ContactController extends Controller
{
    public function ContactIndex()
    {
        $contact = Contact::get();
        Session::flash('page', 'contact.us');
        return view('admin.contact.contactus', compact('contact'));
    }
}
