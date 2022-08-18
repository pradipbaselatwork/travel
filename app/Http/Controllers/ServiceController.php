<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function serviceDetail($id)
    {
       $service= Service::where('id', $id)->first();
    //    $serviceget= service::where('id','!=', $id)->where('servicetype_id', $service->servicetype_id)->get();
        return view('front.service_detail', compact('service'));
    }
}
