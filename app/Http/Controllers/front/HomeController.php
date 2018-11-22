<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Code;
use App\users;
use App\Group;
use App\UserGroup;

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

    public function store(Request $request){

       // dd($request);
       // $group = new Group();

        //$user = new User();

        //$usergroup = new UserGroup();

        //send notification
                    /*"data":[{
                        "notifications":[
                                            "creacion-mancha",
                                            "codigo-seguridad"
                                        ],
                        "users":[1]
                        }]*/
        $mancha = "testmancha";
        $codigo = "34321";
        $user_id = 2;
          $notification = array(
                            'notificacion'=> array(
                                $mancha,
                                $codigo
                               ),
                            'users' => array(
                                $user_id
                                )
                        );

        return response()->json(['data'=>$notification]);


    }
}
