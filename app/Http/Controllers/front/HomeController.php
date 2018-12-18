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

       // Storage::put('ftp/flatfile.txt', $contents);
        /*
        $myfile = Storage::get("OUTREAD/OUT_LIDER.txt");

        $datos = explode("\n",$myfile);
        $array[] = null;
        foreach($datos as $key => $d){
            $row = explode('|',$d);
            array_push($array,$row);
        }



        foreach($array as $key => $col){
            if($key>1){
           // echo $col[0]." - ".$col[1]." - ".$col[2]."<br>";
                if($col[2]==1){
                    $califica = 2;
                }else{
                    $califica = 3;
                }
               User::where('id',$col[0])->update(['califica'=>$califica]);
            }
        }


        $myfile2 = Storage::get("OUTREAD/OUT_MEMBRO.txt");

        $datos2 = explode("\n",$myfile2);
        $array2[] = null;
        foreach($datos2 as  $d2){
            $row2 = explode('|',$d2);
            array_push($array2,$row2);
        }



        foreach($array2 as $key => $col2){
            if($key>1){
            //echo $col2[0]." - ".$col2[1]." - ".$col2[2]."<br>";
                if($col2[2]==1){
                    $califica = 2;
                }else{
                    $califica = 3;
                }
               User::where('id',$col2[0])->update(['califica'=>$califica]);
            }
        }
        */


        $users = DB::select( DB::raw("update users set
        califica = 2
        where id in (
        select u.id from (
        select cast(e.idlinea as UNSIGNED) as id from evaluated e,users u,group_user gu
        where cast(e.idlinea as UNSIGNED) = u.id and cast(e.idmancha as UNSIGNED) = gu.group_id and u.id = gu.user_id
        and u.califica = 1 and u.`status` = 2 and u.role_id = 2 and e.califica = 1
        and u.id not in (select nm.user_id from notification_massive nm)
        order by e.fechacalifica,u.numero) as u)"));

        print_r($user);
        return response()->json(["proceso completo"]);
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

}
