<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\ServiceInfo;

class ServiceInfoController extends Controller
{
    public function EditServiceInfo(Request $request, $id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $serviceInfo = ServiceInfo::find($id);
            $serviceInfo->title = $data['title'];
            $serviceInfo->description = $data['description'];
            $serviceInfo->save(); 
            Session::flash('success_message','Service info updated successfully!');
            return redirect()->back();

         }
         Session::flash('page', 'service.info');
         $serviceInfo = ServiceInfo::first();
         return view('admin.serviceInfo.view_serviceInfo', compact('serviceInfo'));
    }

}
