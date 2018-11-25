<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Ixudra\Curl\Facades\Curl;
use App\Code;
use App\User;
use App\Group;
use App\GroupUser;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function listamanchasesion(Request $request){


        $code = Code::where('code',$request->codigo)
                    ->where('status',2)->first();

        if($code){
            $user_id = $code->user_id;

            $user = User::where('id',$user_id)->first();

            $grupores = Group::where('id',$user->groups[0]->id)->with('users')->first();



            if($user->role->id==1){
                return view('front.lista_mancha_sesion',['grupores'=>$grupores]);
            }else{
                return redirect()->route('home.listamancha',['group_id'=> $user->groups[0]->id,'mensaje'=>1]);
            }

        }else{
            //dd("error");
            return redirect()->route('home.mirastatus', ['mensaje' => 2 ]);
        }



    }

}
