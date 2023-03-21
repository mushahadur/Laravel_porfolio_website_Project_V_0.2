<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
     function servicesIndex(){

        return view('Service');
    }
     function getServicesData(){
        $result = json_encode(Service::all());
        return $result;
    }

    function getServiceDetails(Request $request){
        $id = $request->input('id');
        $result = json_encode(Service::where('id', '=', $id)->get());
        return $result;
    }
     function ServiceDelete(Request $request){

         $id = $request->input('id');
         $result = Service::where('id', '=', $id)->delete();
        if ($result){
            return 1;
        }
        else{
            return 0;
        }
    }

    function ServiceUpdate(Request $request){

        $id = $request->input('id');
        $name = $request->input('name');
        $des = $request->input('des');
        $img = $request->input('img');
        $result = Service::where('id', '=', $id)->update(['name' => $name, 'description'=>$des, 'image'=>$img]);

        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function ServiceAdd(Request $request){
        $name = $request->input('name');
        $des  = $request->input('des');
        $img  = $request->input('img');

        $result = Service::insert(['name' => $name, 'description'=>$des, 'image'=>$img]);

        if ($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }
}
