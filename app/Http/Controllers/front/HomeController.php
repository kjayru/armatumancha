<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Code;
class HomeController extends Controller
{
    public function index()
    {

        return view('front.index');
    }

    public function armatumancha(){
        return view('front.armatumancha');
    }

    public function endesarrollo(){
        return view('front.desarrollo');
    }
}
