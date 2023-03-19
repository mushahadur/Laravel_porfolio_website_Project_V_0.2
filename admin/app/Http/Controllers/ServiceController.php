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
}
