<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function projectsIndex(){
        return view('Project');
    }

    function getProjectsData(){
        $result = json_encode(ProjectModel::orderBy('id', 'desc')->get());
        return $result;
    }



    function getProjectsDetails(Request $request){
        $id = $request->input('id');
        $result = json_encode(ProjectModel::where('id', '=', $id)->get());
        return $result;
    }
    function ProjectsDelete(Request $request){

        $id = $request->input('id');
        $result = ProjectModel::where('id', '=', $id)->delete();
        if ($result){
            return 1;
        }
        else{
            return 0;
        }
    }

    function ProjectsUpdate(Request $request){

        $id = $request->input('id');
        $project_name = $request->input('project_name');
        $project_des = $request->input('project_des');
        $project_img = $request->input('project_img');

        $result = ProjectModel::where('id', '=', $id)->update([
            'project_name' => $project_name,
            'project_des'=>$project_des,
            'project_img'=>$project_img
        ]);

        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }


    function ProjectsAdd(Request $request){
        $project_name = $request->input('Project_name');
        $project_des = $request->input('Project_des');
        $project_img = $request->input('Project_img');
        $project_link = $request->input('Project_link');


        $result = ProjectModel::insert([
            'project_name' => $project_name,
            'project_des'=>$project_des,
            'project_img'=>$project_img,
            'project_link'=>$project_link
        ]);

        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }
}
