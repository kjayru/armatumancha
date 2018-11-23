<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Code;
use App\User;
use App\Group;
use App\UserGroup;

class RegisterController extends Controller
{
    public function testreg(){
        return view('test.test');
    }

    public function disponibilidadmancha(Request $request){

        $imancha = strtolower($request->nombres);


        $contar = Group::where('name','like','%'.$imancha.'%')->count();

       if($contar>0){
        $rpta = 'existe';
       }else{
        $rpta = 'libre';
       }
        return response()->json(['rpta'=>$rpta]);
    }

    public function validarcodigo($codigo){

        return response()->json(['rpta'=>'ok']);
    }
    /**
     * registro lista patas lider
     */
    public function store(Request $request)
    {
        //redirect segun beneficio

         //get code
        $numcode = Code::whereNotNull('user_id')->count();
        $code_asig = intval($numcode+1);

        $beneficio = 1;

        $grupo = new Group();

        $grupo->name = $request->nombres;
        $grupo->save();

        $user = new User();
       // $user->beneficio = $request->beneficio;
        $user->alias = $request->alias;
        $user->numero = $request->telefono;
        $user->email = $request->email;
        //usuario lider
        $user->role_id = 1;
        //$user->autorizar = $request->autorizar;
        $user->save();

        $codigo = Code::where('id',$code_asig)->first();
        $codigo->user_id = $user->id;
        $codigo->save();

        $usergroup = new UserGroup();
        $usergroup->user_id =  $user->id;
        $usergroup->group_id = $grupo->id;

        $usergroup->save();

        switch ($beneficio) {
            case '1':
             $url = 'gracias_gigas';
            break;

            case '2':
            $url = 'gracias_millas';
            break;
        }

        return redirect($url);
       /* $grupores = Group::where('name',$request->nombres)->with('users')->first();

        foreach($grupores->users as $group){

              echo $group->alias."<br>";
              echo $group->numero."<br>";
              echo $group->email."<br>";
              echo $group->role->name;

        } */

    }



    public function crearpata(Request $request){

        return response()->json(['rpta'=>'ok']);
    }

    public function asignarlider($id){

        return response()->json(['rpta'=>'ok']);
    }

    public function borrarpata($id){

        return response()->json(['rpta'=>'ok']);
    }


    public function validarcelular($celular){

        return response()->json(['rpta'=>'ok']);
    }

    public function recuperarcodigo($celular){

        return response()->json(['rpta'=>'ok']);
    }

    public function validarcodigorecuperado($codigo){

        return response()->json(['rpta'=>'ok']);
    }

}
