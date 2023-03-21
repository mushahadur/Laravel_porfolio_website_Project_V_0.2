<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use App\Models\Service;
use App\Models\VisitorModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $userIP = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date('y-m-d h:i:sa');
        VisitorModel::insert(['ip_address'=>$userIP, 'visit_time'=>$timeDate]);

        $services = Service::all();
        //$data = json_encode($services);
        $allCourse = CourseModel::orderBy('id', 'desc')->limit(6)->get();

        return view('Home', [
            'services'=>$services,
            'CoursesData'=>$allCourse
        ]);

    }
}
