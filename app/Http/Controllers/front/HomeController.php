<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
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
        return view('front.arma_tu_mancha');
    }

    public function miratustatus(){
        return view('front.consulta_tu_mancha');
    }
    public function endesarrollo(){
        return view('front.desarrollo');
    }

    public function listamanchaingreso(){
        return view('front.lista_mancha_ingreso');
    }

    public function listamanchasesion(){
        return view('front.lista_mancha_sesion');
    }

    //gracias gigas
    public function graciasgigas(){
        return view('front.confirmacion_mancha');
    }
    //gracias millas

    public function graciasmillas(){
        return view('front.confirmacion_millas');
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

        return response()->json([$notification]);


    }

    public function test1(){
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

        return response()->json([$notification]);
    }



    public function flatfile(){


        //IdLinea|idMancha|NroLinea|Beneficio

        $contents = "1|2|".Hash::make('943432321')."|GIGAS\r\n";
        $contents.= "6|3|".Hash::make('943435433')."|MILLAS\r\n";
        $contents.= "5|4|".Hash::make('943436544')."|MILLAS\r\n";
        $contents.= "4|5|".Hash::make('943437654')."|GIGAS\r\n";
        $contents.= "3|6|".Hash::make('943437665')."|GIGAS\r\n";




        Storage::put('ftp/flatfile.txt', $contents);
        //Storage::append('flatfile.txt', $contents);
    }

}
