<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class ProjectController extends Controller
{
    public function ProjectDetail($id)
    {
       $project= Project::where('id', $id)->first();
    //    $projectget= project::where('id','!=', $id)->where('projecttype_id', $project->projecttype_id)->get();
        return view('front.project_detail', compact('project'));
    }
}
