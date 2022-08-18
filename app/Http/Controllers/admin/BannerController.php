<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Banner;
use Image;

class BannerController extends Controller
{
    public function Banner()
    {
        $banner = Banner::get();
        Session::flash('page', 'banner');
        return view('admin.banner.view_banner', compact('banner'));
    }

    public function addEditBanner(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Banner";
            $button ="Submit";
            $banner = new Banner;
            $bannerdata = array();
            $message = "Banner has been added successfully!";
        }else{
            $title = "Edit Banner";
            $button ="Update";
            $banner = Banner::where('id',$id)->first();
            $bannerdata= json_decode(json_encode($banner),true);
            $banner = Banner::find($id);
            $message = "Banner has been updated successfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();

          //validation starts from here
          $rules = [
                'title' => 'required',
            ];

            $customMessages = [
                'title.required' => 'Title is required',
            ];
            $this->validate($request,$rules,$customMessages);
            

            
            if(empty($data['description']))
            {
                $data['description'] = "";
            }

      
            if(!empty($data['image'])){
                $image_tmp = $data['image'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/banner_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $banner->image =$imagePath;
    
                }
            }
            $banner->title = $data['title'];
            // $banner->sub_title = $data['sub_title'];
            $banner->description = $data['description'];
            $banner->save();
            Session::flash('success_message', $message);
            return redirect('admin/banner');
        }

        Session::flash('page', 'banner');
        return view('admin.banner.add_edit_banner', compact('title','button','bannerdata'));
    }

    public function deleteBannerImage($id)
    {
      $bannerimage = Banner::select('image')->where('id',$id)->first();
      $imagePath = 'images/banner_images/';
      //delete banner image from folder if exists
      if(file_exists($imagePath.$bannerimage->image)){
          unlink($imagePath.$bannerimage->image);
      }
      //Delete banner image from banners table
      Banner::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Banner has been deleted successfully!');

    }


    public function deleteBanner($id)
    {
      $id =Banner::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Banner has been deleted successfully!');

    }
}


