<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index(){
        return view('site.index');
    }


    public function home(){


        return view('site.home');
    }


}
