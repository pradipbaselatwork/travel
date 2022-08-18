<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Package;
use App\PackageType;
use App\Project;
use App\Testimonial;
use App\Banner;
use App\AboutUs;
use App\Service;
use App\Blog;
use App\Contact;

class HomeController extends Controller
{
    
    public function index()
    {
        $banner = Banner::first();
        $package= Package::limit(3)->get();
        $project= Project::limit(8)->get();
        $tourproject= Project::limit(4)->get();
        $treakingproject= Project::limit(3)->get();
        $adventureproject= Project::limit(4)->get();
        $outproject= Project::limit(3)->get();
        $testimonial = Testimonial::get();
        return view('front.home',compact('banner','package','project','testimonial','tourproject','treakingproject','adventureproject','outproject'));
    }

    public function nav($url=null, $id=null)
    {
        if($url == "home")
        {
            return  redirect()->route('home');
        }
        if($url == "aboutus")
        {
            $aboutus= AboutUs::get();
            return view('front.aboutus',compact('aboutus'));
        }

        if($url == "packages")
        {
            $package = PackageType::with('package')->paginate(8);
            $getpackage= Package::get();
            return view('front.package',compact('package','getpackage'));
        }

        if($url == "services")
        {
            $service= Service::get();
            return view('front.service',compact('service'));
        }

        if($url == "projects")
        {
            $project= Project::paginate(3);
            return view('front.project',compact('project'));
        }

        if($url == "blog")
        {
            $blog= Blog::get();
            return view('front.blog',compact('blog'));
        }

        if($url == "contactus")
        {
            $contactus= Contact::get();
            return view('front.contactus',compact('contactus'));
        }
    }

    public function search(Request $req)
    {
        // return $req;
        if($req->ajax()){
            $package = Package::where('title','like','%'.$req->input('category').'%');
            if(!empty($req->input('sort')))
            {
                if($req->input('sort') == 'low_to_high')
                {
                    $package->orderBy('price','Asc');
                }
                if($req->input('sort') == 'high_to_low')
                {
                    $package->orderBy('price','Desc');
                }
            }   
            $package = $package->get();
            // return $package;
           return view('front.ajaxPackage', compact('package'));
        }else{
            $package = Package::where('title','like','%'.$req->input('query').'%')->where('expire_date', '>=', $req['end_date'])->where('price', '<=', $req['prices'])
            ->get();
            $category = $req->input('query');
            return view('front.search',compact('package','category'));
        }
    }
    public function average(Request $req)
    {
      if($req->ajax()){
          $package = Package::where('price', '<=', $req['min'],'price', '<=', $req['max']);
          if(!empty($req->input('average')))
          {
            if($req->input('average') == 'minimum')
            {
                $package->orderBy('price','Asc');
            }
            if($req->input('average') == 'maximum')
            {
                $package->orderBy('price','Desc');
            }  
          }
          return view('front.ajaxAverage', compact('package'));
      }else{
        // $package = Package::where('title','like','%'.$req->input('query').'%')->where('expire_date', '>=', $req['end_date'])->where('price', '<=', $req['prices'])
        // ->get();
        $category = $req->input('query');
        return view('front.search',compact('category'));
    }
    } 
}
