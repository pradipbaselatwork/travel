<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\About;

class AboutController extends Controller
{
    public function EditAboutInfo(Request $request, $id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $aboutInfo = About::find($id);
            $aboutInfo->title = $data['title'];
            $aboutInfo->description = $data['description'];
            $aboutInfo->save(); 
            Session::flash('success_message','About updated successfully!');
            return redirect()->back();

         }
         Session::flash('page', 'about.info');
         $aboutInfo = About::first();
         return view('admin.about.view_about', compact('aboutInfo'));
    }

}
