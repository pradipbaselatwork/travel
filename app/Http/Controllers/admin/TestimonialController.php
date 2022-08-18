<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Testimonial;
use Image;

class testimonialController extends Controller
{
    public function Testimonial()
    {
        $testimonial = Testimonial::get();
        Session::flash('page', 'testimonial');
        return view('admin.testimonial.view_testimonial', compact('testimonial'));
    }

    public function addEditTestimonial(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Testimonial";
            $button ="Submit";
            $testimonial = new Testimonial;
            $testimonialdata = array();
            $message = "Testimonial has been added successfully!";
        }else{
            $title = "Edit Testimonial";
            $button ="Update";
            $testimonial = Testimonial::where('id',$id)->first();
            $testimonialdata= json_decode(json_encode($testimonial),true);
            $testimonial = Testimonial::find($id);
            $message = "Testimonial has been updated successfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            // dd($data);

                //image validaiton starts from here
            // if($id=="")
            // {
            //     $rules = [
            //         'image' => 'required',
            //     ];
        
            //     $customMessages = [
            //         'image.required' => 'Image is required',
            //     ];
            //     $this->validate($request,$rules,$customMessages);
            // }
            //image validation ends from here
            
            //this validation starts from here
               
            $rules = [
                'title' => 'required',
                'profession' => 'required',  

            ];
    
            $customMessages = [
                'title.required' => 'Title is required',
                'profession.required' => 'Profession is required',
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
                    $imagePath = 'images/testimonial_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $testimonial->image =$imagePath;
    
                }
            }

            $testimonial->title = $data['title'];
            $testimonial->profession = $data['profession'];
            $testimonial->description = $data['description'];
            $testimonial->url = $data['url'];
            $testimonial->meta_title = $data['meta_title'];
            $testimonial->meta_description = $data['meta_description'];
            $testimonial->meta_keywords = $data['meta_keywords'];
            $testimonial->save();
            Session::flash('success_message', $message);
            return redirect('admin/testimonial');
        }

        Session::flash('page', 'testimonial');
        return view('admin.testimonial.add_edit_testimonial', compact('title','button','testimonialdata'));
    }

    public function deletetestimonialImage($id)
    {
      $testimonialimage = Testimonial::select('image')->where('id',$id)->first();
      $imagePath = 'images/testimonial_images/';
      //delete testimonial image from folder if exists
      if(file_exists($imagePath.$testimonialimage->image)){
          unlink($imagePath.$testimonialimage->image);
      }
      //Delete testimonial image from testimonials table
      Testimonial::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Testimonial has been deleted successfully!');

    }


    public function deleteTestimonial($id)
    {
      $id =Testimonial::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Testimonial has been deleted successfully!');

    }
}

