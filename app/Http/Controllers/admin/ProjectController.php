<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Project;
use Image;

class ProjectController extends Controller
{
    public function Project()
    {
        $project = Project::get();
        Session::flash('page', 'project');
        return view('admin.project.view_project', compact('project'));
    }

    public function addEditProject(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Project";
            $button ="Submit";
            $project = new Project;
            $projectdata = array();
            $message = "Project has been added successfully!";
        }else{
            $title = "Edit Project";
            $button ="Update";
            $project = Project::where('id',$id)->first();
            $projectdata= json_decode(json_encode($project),true);
            $project = Project::find($id);
            $message = "Project has been updated successfully!";
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
                    'sub_title' => 'required',
                    'image' => 'required',
                    'price' =>'required|numeric',
                    'place' => 'required',
                ];
    
                $customMessages = [
                    'title.required' => 'Title is required',
                    'sub_title.required' => 'Sub title is required',
                    'name.required' => 'Name is required',
                    'price.required' => 'Price is required',
                    'price.numeric' => 'Price is invalid ',
                    'place.required' => 'Place is required',
                ];
                $this->validate($request,$rules,$customMessages);
               //validation ends from here

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

            
            if(empty($data['place']))
            {
                $data['place'] = "";
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
                    $imagePath = 'images/project_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $project->image =$imagePath;
    
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
                    $imagePath= 'images/project_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $project->image_1 =$imagePath;
    
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
                    $imagePath= 'images/project_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $project->image_2 =$imagePath;
    
                }
            }

            $project->title = $data['title'];
            $project->name = $data['name'];
            $project->place = $data['place'];
            $project->sub_title = $data['sub_title'];
            $project->description = $data['description'];
            $project->textarea_1 = $data['textarea_1'];
            $project->textarea_2 = $data['textarea_2'];
            $project->price = $data['price'];
            $project->url = $data['url'];
            $project->meta_title = $data['meta_title'];
            $project->meta_description = $data['meta_description'];
            $project->meta_keywords = $data['meta_keywords'];
            $project->save();
            Session::flash('success_message', $message);
            return redirect('admin/project');
        }

        Session::flash('page', 'project');
        return view('admin.project.add_edit_project', compact('title','button','projectdata'));
    }

    public function deleteprojectImage($id)
    {
      $projectimage = project::select('image')->where('id',$id)->first();
      $imagePath = 'images/project_images/';
      //delete project image from folder if exists
      if(file_exists($imagePath.$projectimage->image)){
          unlink($imagePath.$projectimage->image);
      }
      //Delete project image from projects table
      project::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'project has been deleted successfully!');

    }


    public function deleteproject($id)
    {
      $id =project::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'project has been deleted successfully!');

    }
}

