<?php

namespace App\Http\Controllers;

use App\Models\VisitorModel;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    function visitorIndex(){

        $visitors = json_decode(VisitorModel::orderBy('id', 'desc')->take(3)->get());

        return view('VisitorHome', ['visitors'=>$visitors]);

    }
}
