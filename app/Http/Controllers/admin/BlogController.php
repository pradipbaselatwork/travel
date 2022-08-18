<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Blog;
use Image;

class BlogController extends Controller
{
    public function Blog()
    {
        $blog = Blog::get();
        Session::flash('page', 'blog');
        return view('admin.blog.view_blog', compact('blog'));
    }

    public function addEditBlog(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Blog";
            $button ="Submit";
            $blog = new Blog;
            $blogdata = array();
            $message = "Blog has been added successfully!";
        }else{
            $title = "Edit Blog";
            $button ="Update";
            $blog = Blog::where('id',$id)->first();
            $blogdata= json_decode(json_encode($blog),true);
            $blog = Blog::find($id);
            $message = "Blog has been updated successfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
                    //image validaiton starts from here
                    if($id=="")
                    {
                        $rules = [
                            'image' => 'required',
                        ];
                
                        $customMessages = [
                            'image.required' => 'Image is required',
                        ];
                        $this->validate($request,$rules,$customMessages);
                    }
                    //image validation ends from here
                   //validation starts from here
                   $rules = [
                    'title' => 'required',
                ];
    
                $customMessages = [
                    'title.required' => 'Title is required',
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
                    $imagePath = 'images/blog_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $blog->image =$imagePath;
    
                }
            }

            $blog->title = $data['title'];
            $blog->description = $data['description'];
            $blog->url = $data['url'];
            $blog->meta_title = $data['meta_title'];
            $blog->meta_description = $data['meta_description'];
            $blog->meta_keywords = $data['meta_keywords'];
            $blog->save();
            Session::flash('success_message', $message);
            return redirect('admin/blog');
        }

        Session::flash('page', 'blog');
        return view('admin.blog.add_edit_blog', compact('title','button','blogdata'));
    }

    public function deleteBlogImage($id)
    {
      $blogimage = Blog::select('image')->where('id',$id)->first();
      $imagePath = 'images/blog_images/';
      //delete blog image from folder if exists
      if(file_exists($imagePath.$blogimage->image)){
          unlink($imagePath.$blogimage->image);
      }
      //Delete blog image from blogs table
      Blog::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Blog has been deleted successfully!');

    }


    public function deleteBlog($id)
    {
      $id =Blog::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Blog has been deleted successfully!');

    }
}

