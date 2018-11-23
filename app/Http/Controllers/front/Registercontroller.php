<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Code;
use App\users;
use App\Group;
use App\UserGroup;

class Registercontroller extends Controller
{
    public function disponibilidadmancha($mancha){

        return response()->json(['rpta'=>'ok']);
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

        $beneficio = $request->beneficio;

        switch ($beneficio) {
            case 'gigas':
             $url = 'gracias_gigas';
            break;

            case 'millas':
            $url = 'gracias_millas';
            break;


        }

        return redirect($url);
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
