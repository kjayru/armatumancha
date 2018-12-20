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
use Illuminate\Support\Facades\DB;

use Rap2hpoutre\FastExcel\FastExcel;

use App\Code;
use App\User;
use App\Group;
use App\GroupUser;
use App\Petition;
use App\Duplicated;
use App\Evaluated;

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
        $imancha = strtolower($request->manchacelular);



        //busqueda mancha

        $contar = Group::where('name',$imancha)->count();


       if($contar>0){

            $grupores = Group::where('name',$imancha)->with('users')->first();

           // dd($grupores->users[0]);
            $this->guard()->login($grupores->users[0]);


            return redirect()->route('home.listamancha');


       }else{

            $numero = '51'.$imancha;
            $contar2 = User::where('numero',$numero)->count();

            if($contar2>0){
                $user = User::where('numero',$numero)->with('groups')->first();

                $group_id = $user->groups[0]->id;

                $this->guard()->login($user);

                return redirect()->route('home.listamancha');
            }else{

                return redirect()->route('home.mirastatus')->with('alert','No se encuentra su búsqueda');
            }
     }
}



public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }




    //validar cel-lider
 public function comprobarCel(Request $request){
        $numero = '51'.$request->numero;
        $user = User::where('numero',$numero)->count();

        if($user>0){
             //verificar lider

             $usertipo = User::where('numero',$numero)->first();

             if($usertipo->role_id == 1){
                 $mensaje = "El número que ingresaste es lider de un equipo";
             }
             //verificar pata
             if($usertipo->role_id == 2){
                $mensaje = "El número que ingresaste es pata de un equipo";
            }

            return response()->json(["rpta"=>"ok","mensaje"=>$mensaje,"role"=>$usertipo->role_id]);
        }

    }




    public function disponibilidadmancha(Request $request){

        $imancha = strtolower($request->nombres);


        $contar = Group::where('name',$imancha)->count();

       if($contar>0){

        return response()->json(['rpta'=>'existe']);
       }else{

        return response()->json(['rpta'=>'libre']);
       }

    }


    public function preguntas(){
        return view('front.preguntas-frecuentes');
    }


    public function tips(){
        return view('front.tips');
    }






    public function flatfile(){

    //IdLinea|idMancha|NroLinea|Beneficio
        /*
            $contents = "1|2|".User::encrypt_decrypt('encrypt','986863157')."|GIGAS\r\n";
            $contents.= "2|3|".User::encrypt_decrypt('encrypt','986863158')."|MILLAS\r\n";
            $contents.= "3|4|".User::encrypt_decrypt('encrypt','986863159')."|MILLAS\r\n";
            $contents.= "4|2|".User::encrypt_decrypt('encrypt','986863110')."|GIGAS\r\n";
            $contents.= "5|3|".User::encrypt_decrypt('encrypt','986863111')."|MILLAS\r\n";
            $contents.= "6|4|".User::encrypt_decrypt('encrypt','986863112')."|MILLAS\r\n";
        */
       /*
    echo "1|1|5ec8249d1c61f94e6e547fb58c0399b5|GIGAS<br>
         2|2|9fa1073afb5995eea38bf921c5e964fd|GIGAS<br>
         3|3|b74eada747403fc2e93c6f38024c6654|GIGAS<br>";
        */
       // dd($contents);

       error_reporting(0);

       DB::select( DB::raw("TRUNCATE TABLE evaluated"));

       $myfile = Storage::get("OUTREAD/OUT_LIDER.txt");


       if($myfile){
           $datos = explode("\n",$myfile);

           $total = count($datos);

           $array[] = null;

               foreach($datos as $d){
               $row = explode('|',$d);
               array_push($array,$row);
               }

           foreach($array as $key => $col){

               $exist = Evaluated::where('idlinea',$col[0])->count();
               if($exist==0){
                   $evaluar = new Evaluated;
                   $evaluar->idlinea = $col[0];
                   $evaluar->idmancha = $col[1];
                   $evaluar->califica = $col[2];
                   $evaluar->tipocalifica = $col[3];
                   $evaluar->fechacalifica = $col[4];
                   $evaluar->save();
               }

           }
       }

       //2do
       $myfile2 = Storage::get("OUTREAD/OUT_MEMBRO.txt");
       if($myfile2){
           $datos2 = explode("\n",$myfile2);

           $total2 = count($datos2);

           $array2[] = null;
           foreach($datos2 as  $d2){
               $row2 = explode('|',$d2);
               array_push($array2,$row2);
           }

           foreach($array2 as $key2 => $col2){

               $exist = Evaluated::where('idlinea',$col2[0])->count();
               if($exist==0){
                   $evaluar2 = new Evaluated;
                   $evaluar2->idlinea = $col2[0];
                   $evaluar2->idmancha = $col2[1];
                   $evaluar2->califica = $col2[2];
                   $evaluar2->tipocalifica = $col2[3];
                   $evaluar2->fechacalifica = $col2[4];
                   $evaluar2->save();

               }

           }

       }
    }

    public function reporteExcel(){
        return view('exten.reporte');
    }

    public function reporteExcelGen(Request $request){

        if($request->key==='C4f3r3dtr3s'){


       $users = DB::select( DB::raw("select 'mancha','linea','alias','email','aceptacion','fecha_aceptacion','calificacion','tipocalificacion','fechacalificacion','fecha_registro_mancha','fecha_registro_linea','beneficio','flag_lider'
        union all
        select
        distinct t3.name mancha,
        t1.numero linea,
        t1.alias,
        if(t1.email IS NULL ,' ',t1.email ) email,
        (case when t1.status = 1 then 'No' when t1.status = 2 then 'Si' end) aceptacion,
        (case when t1.role_id = 1 then
        if((select t4.id from notification_response t4 where t1.numero = t4.user_number and t4.id_users = t1.id) IS NULL, t1.created_at , (select t4.created_at from notification_response t4 where t1.numero = t4.user_number and t4.id_users = t1.id))
        when t1.role_id = 2 then
        if((select t5.owner_user_id from petitions t5 where t5.owner_user_id = t1.id) IS NOT NULL , t1.created_at, (select t4.created_at from notification_response t4 where t1.numero = t4.user_number and t4.id_users = t1.id))
        end) fecha_aceptacion,
        (case when t6.califica = 1 then '2' when t6.califica = 0 then '3' when t6.califica IS NULL then '1' end) calificacion,
        t6.tipocalifica tipocalificacion,
        t6.fechacalifica fechacalificacion,
        t3.created_at fecha_registro_mancha,
        t1.created_at fecha_registro_linea,
        t1.beneficio,
        (case when t1.role_id = 1 then 'Si' when t1.role_id = 2 then 'No' end) flag_lider
        from users t1
        inner join group_user t2 on t2.user_id = t1.id
        inner join groups t3 on  t2.group_id = t3.id
        left join evaluated t6 on t1.id = t6.idlinea and t3.id = t6.idmancha
        where t1.beneficio <> ''
        and t1.numero not in('51000000010','51910467651','51967441839','51987414785','51949406090','51993144900','51992910007',
        '51993144900','51000000222','51000000110','51000299990','51999292992','51912345668','51912345678','51999999991','51933361369',
        '51999999992','51997563311','51923152691','51932797055','51935835601','51916428732','51999999998','51999912312','51960932565','51992910007','51961730610')"));



        return (new FastExcel($users))->download("usuarios_".DATE_FORMAT(now(),'d-m-Y').".xlsx");
        }else{
         return response()->json(['rpta'=>'El key ingresado no es el correcto']);
        }
    }

    public function jobEvaluated(){
        error_reporting(0);

        DB::select( DB::raw("TRUNCATE TABLE evaluated2"));

        $myfile = Storage::get("OUTREAD/OUT_LIDER.txt");


        if($myfile){
            $datos = explode("\n",$myfile);

            $total = count($datos);

            $array[] = null;

                foreach($datos as $d){
                $row = explode('|',$d);
                array_push($array,$row);
                }

            foreach($array as $key => $col){

                $exist = Evaluated::where('idlinea',$col[0])->count();
                if($exist===0){
                    $evaluar = new Evaluated;
                    $evaluar->idlinea = $col[0];
                    $evaluar->idmancha = $col[1];
                    $evaluar->califica = $col[2];
                    $evaluar->tipocalifica = $col[3];
                    $evaluar->fechacalifica = $col[4];
                    $evaluar->save();
                }

            }
        }


    }

    public function jobEvaluated2(){
        error_reporting(0);
        //2do
        $myfile2 = Storage::get("OUTREAD/OUT_MEMBRO.txt");
        if($myfile2){
            $datos2 = explode("\n",$myfile2);

            $total2 = count($datos2);

            $array2[] = null;
            foreach($datos2 as  $d2){
                $row2 = explode('|',$d2);
                array_push($array2,$row2);
            }

            foreach($array2 as $key2 => $col2){

                $exist = Evaluated::where('idlinea',$col2[0])->count();
                if($exist===0){
                    $evaluar2 = new Evaluated;
                    $evaluar2->idlinea = $col2[0];
                    $evaluar2->idmancha = $col2[1];
                    $evaluar2->califica = $col2[2];
                    $evaluar2->tipocalifica = $col2[3];
                    $evaluar2->fechacalifica = $col2[4];
                    $evaluar2->save();

                }

            }

        }
    }
}
