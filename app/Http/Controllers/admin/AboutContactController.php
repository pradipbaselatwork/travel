<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutContact;
use Session;

class AboutContactController extends Controller
{
    public function AboutContactIndex()
    {
        $aboutContact = AboutContact::get();
        Session::flash('page', 'aboutus.contact');
        return view('admin.aboutUs.aboutus_contact', compact('aboutContact'));
    }
}
