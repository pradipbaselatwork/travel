<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Service;
use Image;

class ServiceController extends Controller
{
    public function Service()
    {
        $service = Service::get();
        Session::flash('page', 'service');
        return view('admin.service.view_service', compact('service'));
    }

    public function addEditService(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Service";
            $button ="Submit";
            $service = new Service;
            $servicedata = array();
            $message = "Service has been added successfully!";
        }else{
            $title = "Edit Service";
            $button ="Update";
            $service = Service::where('id',$id)->first();
            $servicedata= json_decode(json_encode($service),true);
            $service = Service::find($id);
            $message = "Service has been updated successfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
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
                    'price' =>'required|numeric',
                ];
    
                $customMessages = [
                    'title.required' => 'Title is required',
                    'price.required' => 'Price is required',
                    'price.numeric' => 'Price is invalid ',
                ];
                $this->validate($request,$rules,$customMessages);
               //validation ends from here

            if(empty($data['sub_title']))
            {
                $data['sub_title'] = "";
            }
    
            if(empty($data['description']))
            {
                $data['description'] = "";
            }

            if(empty($data['textarea_1']))
            {
                $data['textarea_1'] = "";
            }

            if(empty($data['textarea_2']))
            {
                $data['textarea_2'] = "";
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
                    $imagePath = 'images/service_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $service->image =$imagePath;
    
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
                    $imagePath= 'images/service_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $service->image_1 =$imagePath;
    
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
                    $imagePath= 'images/service_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $service->image_2 =$imagePath;
    
                }
            }

            $service->title = $data['title'];
            $service->sub_title = $data['sub_title'];
            $service->description = $data['description'];
            $service->textarea_1 = $data['textarea_1'];
            $service->textarea_2 = $data['textarea_2'];
            $service->price = $data['price'];
            $service->url = $data['url'];
            $service->meta_title = $data['meta_title'];
            $service->meta_description = $data['meta_description'];
            $service->meta_keywords = $data['meta_keywords'];
            $service->save();
            Session::flash('success_message', $message);
            return redirect('admin/service');
        }

        Session::flash('page', 'service');
        return view('admin.service.add_edit_service', compact('title','button','servicedata'));
    }

    public function deleteServiceImage($id)
    {
      $serviceimage = Service::select('image')->where('id',$id)->first();
      $imagePath = 'images/service_images/';
      //delete service image from folder if exists
      if(file_exists($imagePath.$serviceimage->image)){
          unlink($imagePath.$serviceimage->image);
      }
      //Delete service image from services table
      service::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Service has been deleted successfully!');

    }


    public function deleteService($id)
    {
      $id =Service::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Service has been deleted successfully!');

    }
}
