<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\AboutUs;

class AboutUsController extends Controller
{
    public function EditAboutUs(Request $request, $id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $aboutUs = AboutUs::find($id);
            $aboutUs->title = $data['title'];
            $aboutUs->description = $data['description'];
            $aboutUs->save(); 
            Session::flash('success_message','about us updated successfully!');
            return redirect()->back();

         }
         Session::flash('page', 'about.us');
         $aboutUs = AboutUs::first();
         return view('admin.aboutUs.view_aboutUs', compact('aboutUs'));
    }

}

