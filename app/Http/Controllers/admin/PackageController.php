<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Package;
use App\PackageType;
use Image;


class PackageController extends Controller
{
    public function Package()
    {
        $package = Package::with('packageType')->get();
        Session::flash('page', 'package');
        return view('admin.package.view_package', compact('package'));
    }

    public function addEditPackage(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Package";
            $button ="Submit";
            $package = new Package;
            $packagedata = array();
            $message = "Package has been added successfully!";
        }else{
            $title = "Edit Package";
            $button ="Update";
            $package = Package::where('id',$id)->first();
            $packagedata= json_decode(json_encode($package),true);
            $package = Package::find($id);
            $message = "Package has been updated successfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();

                  //image validaiton starts from here
                //   if($id=="")
                //   {
                //       $rules = [
                //           'image' => 'required',
                //           'image_1' => 'required',
                //           'image_2' => 'required',
                //       ];
              
                //       $customMessages = [
                //           'image.required' => 'First image is required',
                //           'image_1.required' => 'Second image is required',
                //           'image_2.required' => 'Third image is required',
                //       ];
                //       $this->validate($request,$rules,$customMessages);
                //   }
                  //image validation ends from here

            //validation starts from here
            $rules = [
                'title' => 'required',
                'packagetype_id' => 'required',
                'price' =>'required|numeric',
            ];

            $customMessages = [
                'title.required' => 'Title is required',
                'packagetype_id.required' => 'Package type is required ',
                'price.required' => 'Price is required',
                'price.numeric' => 'Price is invalid ',
            ];
            $this->validate($request,$rules,$customMessages);
           //validation ends from here

            if(empty($data['description']))
            {
                $data['description'] = "";
            }

            
            if(empty($data['url']))
            {
                $data['url'] = "";
            }

            if(empty($data['meta_title']))
            {
                $data['meta_title'] = "";
            }
            
            if(empty($data['meta_description']))
            {
                $data['meta_description'] = "";
            }

            if(empty($data['meta_keywords']))
            {
                $data['meta_keywords'] = "";
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
                    $imagePath = 'images/package_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $package->image =$imagePath;
    
                }
            }

            
            if(!empty($data['image_1'])){
                $image_tmp = $data['image_1'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath= 'images/package_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $package->image_1 =$imagePath;
    
                }
            }

            if(!empty($data['image_2'])){
                $image_tmp = $data['image_2'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath= 'images/package_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $package->image_2 =$imagePath;
    
                }
            }

            $package->title = $data['title'];
            $package->packagetype_id = $data['packagetype_id'];
            $package->expire_date = $data['expire_date'];
            $package->description = $data['description'];
            $package->textarea_1 = $data['textarea_1'];
            $package->textarea_2 = $data['textarea_2'];
            $package->price = $data['price'];
            $package->url = $data['url'];
            $package->meta_title = $data['meta_title'];
            $package->meta_description = $data['meta_description'];
            $package->meta_keywords = $data['meta_keywords'];
            $package->save();
            Session::flash('success_message', $message);
            return redirect('admin/package');
        }

        $packagetype = PackageType::get();
        Session::flash('page', 'package');
        return view('admin.package.add_edit_package', compact('title','button','packagedata','packagetype'));
    }

    public function deletePackageImage($id)
    {
      $packageimage = Package::select('image')->where('id',$id)->first();
      $imagePath = 'images/package_images/';
      //delete package image from folder if exists
      if(file_exists($imagePath.$packageimage->image)){
          unlink($imagePath.$packageimage->image);
      }
      //Delete package image from packages table
      package::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Package has been deleted successfully!');

    }


    public function deletePackage($id)
    {
      $id =Package::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Package has been deleted successfully!');

    }

  
}
