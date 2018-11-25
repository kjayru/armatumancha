<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Ixudra\Curl\Facades\Curl;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Code;
use App\User;
use App\Group;
use App\GroupUser;

class HomeController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

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


    public function buscarmancha(Request $request){
        $imancha = $request->manchacelular;
        //busqueda mancha
        $contar = Group::where('name','like','%'.$imancha.'%')->count();

       if($contar>0){

            $grupores = Group::where('name','like','%'.$imancha.'%')->with('users')->first();

           // dd($grupores->users[0]);
            $this->guard()->login($grupores->users[0]);


            return redirect()->route('home.listamancha');
            //return view('front.lista_mancha_ingreso',['grupores'=>$grupores,'manchacelular'=>$imancha]);

       }else{

            $contar2 = User::where('numero',$imancha)->count();

            if($contar2>0){
                $user = User::where('numero',$imancha)->first();

                $group_id = $user->groups[0]->id;

                $grupores = Group::where('id',$group_id)->with('users')->first();
                return view('front.lista_mancha_ingreso',['grupores'=>$grupores,'manchacelular'=>$imancha]);
            }else{

                //redirect mirar-status-de-tu-mancha
                return redirect()->route('home.mirastatus', ['mensaje' => 1 ]);
            }
       }



    }









    public function test1(){


        $mancha = "COMANCHE";
        $codigo = "MN 458868";
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
        $cadena = json_encode(['data' => $notification]);

   // dd($cadena);

    $response = Curl::to('http://api-armatumancha.claro.com.pe/set-sms/run')
                ->withData(['data'=>$notification])
                ->post();

    dd($response);
       // return response()->json([$notification]);
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

    public function vercodigo(){
        return view('test.vercodigo');
    }

    public function mostrarcodigo(Request $request){
        $celular = $request->codigo;

        $user = User::where('numero',$celular)->first();
        $contar = User::where('numero',$celular)->count();
        if($contar>0){
            $codigo = Code::where('user_id',$user->id)
                ->where('status',2)->first();

        dd($codigo->code);
        }else{

            dd('el numero no tiene codigo asignado');
        }

    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        //
    }


}
