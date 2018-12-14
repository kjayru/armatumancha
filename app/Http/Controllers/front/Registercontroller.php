<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Auth;

use App\Petition;
use App\Code;
use App\User;
use App\Group;
use App\GroupUser;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function testreg(){
        return view('test.test');
    }



    public function validarcodigo($codigo){

        return response()->json(['rpta'=>'ok']);
    }
    /**
     * registro lista patas lider
     */
    public function store(Request $request)
    {


       /* $validatedData = $request->validate([
            'nombres' => 'required|unique:group|max:100',
            'lidername' => 'required',
            'lidercel' => 'required',
            'alias[]' => 'required',
            'telefono[]' => 'required',
            'autorizar' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);*/
        //redirect segun beneficio


         //get code



    }

    public function crearpata(Request $request){

        $user = User::where('id',Auth::id())->first();

        $beneficio = $user->beneficio;

        $numcode = Code::whereNull('user_id')->first();
        $code_asig = $numcode->id;

        $user = new User();
        $user->alias = $request->alias;
        $user->numero = "51".$request->telefono;
        $user->email = $request->email;
        $user->beneficio = $beneficio;
        $user->role_id = 2;
        $user->save();

        $codigo = Code::where('id',$code_asig)->first();
        $codigo->user_id = $user->id;
        $codigo->save();

        //distribucion
        $usergroup = new GroupUser();
        $usergroup->user_id =  $user->id;
        $usergroup->group_id = $request->group_id;
        $usergroup->save();



        $notification = array(
            'notification' => 'invitacion',
            'users' => array($user->id)
        );

        $noti = json_encode(['data'=>$notification]);
        $response = Curl::to('http://api-armatumancha.claro.com.pe/set-sms/run')
                    ->withData($noti)
                    ->post();
        return response()->json(['rpta'=>'ok']);
    }

/**Asignar lider */

    public function asignarlidermancha(Request $request){

        $contar = User::where('id',$request->user_id)
                    ->where('status',2)->count();


        if($contar>0){

            $ValidarCodePata = Code::where('user_id',$request->user_id)
                        ->where('status',2)->count();


            if($ValidarCodePata>0){
                $codigo = Code::where('user_id',$request->user_id)
                ->where('status',2)->first();
            }else{
                $numcode = Code::whereNull('user_id')->first();
                 Code::where('id',$numcode->id)->update(['user_id'=>$request->user_id,'status'=>2]);
                 $codigo = Code::where('user_id',$request->user_id)
                 ->where('status',2)->first();
            }




            $peticion = new Petition();

            $peticion->owner_user_id = $request->lider_id;
            $peticion->sucessor_user_id = $request->user_id;
            $peticion->code_id = $codigo->id;

            $peticion->save();

            //validacion cambio de lider


            $notification = array(
                'notification' => 'solicitud-cambio-lider',
                'users' => array($request->user_id)
            );

            $noti = json_encode(['data'=>$notification]);
            $response = Curl::to('http://api-armatumancha.claro.com.pe/set-sms/run')
                        ->withData($noti)
                        ->post();

            return response()->json(['rpta'=>'ok','mensaje'=>'Se envio una petición a tu pata.']);
        }else{
            return response()->json(['rpta'=>'error','mensaje'=>'El usuario aun no participa..']);
        }

    }



    public function borrarpata($id){

        $nivel = User::where('id',$id)->where('status',2)->count();

        $user = User::where('id',$id)->with('groups')->first();

        $group_id = $user->groups[0]->id;

        $contarParticipante = GroupUser::where('group_id',$group_id)->count();


        if($contarParticipante>2){

            if($nivel>0){

                return response()->json(['rpta'=>'error','mensaje'=>'no puedes eliminar este participante']);
            }else{
                User::where('id',$id)->delete();
                return response()->json(['rpta'=>'ok','mensaje'=>'participante eliminado']);
            }
        }else{
            return response()->json(['rpta'=>'error','mensaje'=>'No puedes eliminar mas participantes']);

        }

    }


    public function validarcelular($celular){

        return response()->json(['rpta'=>'ok']);
    }

    public function recuperarcodigo(Request $request){
            $numero = '51'.$request->numerocel;
            $contar2 = User::where('numero',$numero)->where('role_id',1)->count();

            if($contar2 > 0){
                $user = User::where('numero',$numero)->first();


                    $user_id = $user->id;

                    $existe = Code::where('user_id',$user->id)
                            ->where('status','2')->count();

                    if($existe>0){
                        $codigo = Code::where('user_id',$user->id)
                        ->where('status','2')->first();

                        $codigosms = $codigo->code;

                    }else{
                        //asigna nuevo codigo
                        $numcode = Code::whereNull('user_id')->first();
                        $code_asig = $numcode->id;
                        $nuevo_codigo = $numcode->code;
                        $codigo = Code::where('id',$code_asig)->first();
                        $codigo->user_id = $user->id;
                        $codigo->status = '2';
                        $codigo->save();
                    }

                    //Enviar notificacion


                    $notification = array(
                        'notification' => 'recupero-codigo-seguridad',
                        'users' => array($user->id)
                    );

                    $noti = json_encode(['data'=>$notification]);
                    $response = Curl::to('http://api-armatumancha.claro.com.pe/set-sms/run')
                                ->withData($noti)
                                ->post();

                return view('front.olvide_codigo');

            }else{

               return redirect()->route('home.ingresecelular')->with('alert','Número inválido');
            }




    }

    public function validarcodigorecuperado($codigo){

        return response()->json(['rpta'=>'ok']);
    }



    public function listamanchaingreso(){


        $user = User::where('id',Auth::id())->first();

        $group_id = $user->groups[0]->id;

        $grupores = Group::where('id',$group_id)->with('users')->first();

        $con=[];

        foreach($grupores->users as $k => $nu){
            if($nu->status==2){
                $con[]=$nu->status;
            }
        }


        $slogan ='';
        $numusuarios = intval(count($con));



        if($user->beneficio=="bonos")
        {
            $copy = "10 Gb por línea!";
            if($numusuarios==0){
                $slogan = "<span>0 GB</span>";
                }
            if($numusuarios==1){
            $slogan = "<span>0 GB</span>";
            }
            if($numusuarios==2){
                $slogan = "<span>2 GB</span>";
            }
            if($numusuarios==3){
                $slogan = "<span>3 GB</span>";
            }
            if($numusuarios==4){
                $slogan = "<span>4 GB</span>";
            }
            if($numusuarios==5){
                $slogan = "<span>5 GB</span>";
            }
            if($numusuarios==6){
                $slogan = "<span>6 GB</span>";
            }
            if($numusuarios==7){
                $slogan = "<span>7 GB</span>";
            }
            if($numusuarios==8){
                $slogan = "<span>8 GB</span>";
            }
            if($numusuarios==9){
                $slogan = "<span>9 GB</span>";
            }
            if($numusuarios==10){
                $slogan = "<span>10 GB</span>";
            }
        }else{
            $copy = "3,000 millas LATAM Pass!";
            if($numusuarios<2){
                $slogan = "<span>0 Millas</span>";
                }
            if($numusuarios>2 && $numusuarios<4){
                $slogan = "<span>1,000 Millas</span>";
            }
            if($numusuarios>4 &&$numusuarios<7){
                $slogan = "<span>2,000 Millas</span>";
            }
            if($numusuarios>7 &&$numusuarios<10){
                $slogan = "<span>3,000 Millas</span>";
            }
        }



        return view('front.lista_mancha_ingreso',['grupores'=>$grupores,'user'=>$user,'slogan'=>$slogan,"copy"=>$copy]);
    }


    public function listamanchasesion(Request $request){
        //verifico mi grupo
        $user = User::where('id',Auth::id())->first();

        $beneficio = $user->beneficio;

        $peticion = Petition::where('owner_user_id',Auth::id())->where('status',1)->count();

        if($peticion>0){
            $existe_peticion = true;
        }else{
            $existe_peticion = false;
        }
        $group_id = $user->groups[0]->id;
        $code = false;
        //dd($grupo_id);
        //extraigo de grupo users
        $patas = Group::where('id',$group_id)->with('users')->first();



        foreach( $patas->users as $pata){

            foreach($pata->codes as $icode){
               // crear arreglo de codigos



                if( $icode->code == $request->codigo && $icode->status == 2){
                    $user_id = $icode->id;
                    $user_rol = $pata->role_id;

                    $code = true;
                }
            }

          }

        if($code){


            $user = User::where('id',$user_id)->first();

            $grupores = Group::where('id',$group_id)->with('users')->first();

            $numusuarios = count($grupores->users);


            $con=[];

            foreach($grupores->users as $k => $nu){
                if($nu->status==2){
                    $con[]=$nu->status;
                }
            }


            $slogan ='';
            $numusuarios = intval(count($con));

            if( $beneficio =="bonos")
            {
                $copy = "10 Gb por línea!";
                if($numusuarios==0){
                    $slogan = "<span>0 GB</span>";
                    }
                if($numusuarios==1){
                $slogan = "<span>0 GB</span>";
                }
                if($numusuarios==2){
                    $slogan = "<span>2 GB</span>";
                }
                if($numusuarios==3){
                    $slogan = "<span>3 GB</span>";
                }
                if($numusuarios==4){
                    $slogan = "<span>4 GB</span>";
                }
                if($numusuarios==5){
                    $slogan = "<span>5 GB</span>";
                }
                if($numusuarios==6){
                    $slogan = "<span>6 GB</span>";
                }
                if($numusuarios==7){
                    $slogan = "<span>7 GB</span>";
                }
                if($numusuarios==8){
                    $slogan = "<span>8 GB</span>";
                }
                if($numusuarios==9){
                    $slogan = "<span>9 GB</span>";
                }
                if($numusuarios==10){
                    $slogan = "<span>10 GB</span>";
                }
            }else{
                $copy = "3,000 millas LATAM Pass!";
                if($numusuarios<2){
                    $slogan = "<span>0 Millas</span>";
                    }
                if($numusuarios>2 && $numusuarios<4){
                    $slogan = "<span>1,000 Millas</span>";
                }
                if($numusuarios>4 &&$numusuarios<7){
                    $slogan = "<span>2,000 Millas</span>";
                }
                if($numusuarios>7 &&$numusuarios<10){
                    $slogan = "<span>3,000 Millas</span>";
                }
            }

            $invitados = $numusuarios - 1;

            if($user_rol==1){
                return view('front.lista_mancha_sesion',['grupores'=>$grupores,'peticion'=>$existe_peticion,'user'=>$user,'invitados'=>$invitados,'codigo'=>$request->codigo,'slogan'=>$slogan,"copy"=>$copy]);
            }else{
                return redirect()->route('home.listamancha')->with('alert','No eres lider de equipo');
            }

        }else{
            //dd("error");
            return redirect()->route('home.listamancha')->with('alert','Tu código no pertenece a esta mancha');

        }



    }



    public function graciasgigas(){

       $group_id = Input::get('group_id');


        return view('front.confirmacion_mancha',['group_id'=>$group_id]);
    }


    public function graciasmillas(){

        $group_id = Input::get('group_id');

        return view('front.confirmacion_millas',['group_id'=>$group_id]);
    }


    public function ingresecelular()
    {
        return view('front.numero_celular');
    }


    public function validarasignacion(Request $request){
        //leer flat para ejecucion
        $conteo = Code::where('code',$request->code)->count();

        if($conteo>0){

            $code = Code::where('code',$request->code)->first();

            $peticion = Petition::where('code_id',$code_id)
                            ->where('status',1)->first();


            //ejecuta asignacion de lider a pata
            User::where('user_id',$petition->owner_user_id)->update(['role_id'=>2]);

            //ejecuta asignacion de pata a lider

            //buscar codigo de pata


            $disabledCode = Code::where('user_id',$request->owner_user_id)->update(['status'=>3]);

            User::where('user_id',$petition->sucessor_user_id)->update(['role_id'=>1]);



            //
            //nuevo codigo lider
            $numcode = Code::whereNull('user_id')->first();
            $codesa= Code::where('id',$numcode->id)->update(['user_id'=>$request->owner_user_id,'status'=>2]);


            $findCodePata = Code::where('user_id',$petition->sucessor_user_id)->count();

            if($findCodePata>0)
            {
            $disabledCode2 = Code::where('user_id',$request->sucessor_user_id)->update(['status'=>3]);
            }

            $numcode2 = Code::whereNull('user_id')->first();

             Code::where('id',$numcode2->id)
                ->update(['user_id'=>$request->sucessor_user_id,'status'=>2]);


            //Enviar notificacion


            $notification = array(
                'notification' => 'cambio-lider',
                'users' => array($request->sucessor_user_id)
            );

            $noti = json_encode(['data'=>$notification]);
            $response = Curl::to('http://api-armatumancha.claro.com.pe/set-sms/run')
                        ->withData($noti)
                        ->post();

        }
        ///se envian nuevos codigos ..notificacion
        dd("asignacion ejecutada..");



    }

    public function comprobarCelPata(Request $request){
        $numero = '51'.$request->telefono;

        $user = User::where('numero',$numero)->count();

        if($user>0){
             //verificar lider
              $mensaje = "este numero esta registrado en tu mancha";

            return response()->json(["rpta"=>"error","mensaje"=>$mensaje]);
        }else{
            return response()->json(["rpta"=>"ok"]);
        }

    }

    public function comprobarAlias(Request $request){
        $user = User::where('id',Auth::id())->first();
        $filtro=[];
        $group = Group::where('id',$user->groups[0]->id)->with('users')->get();

        foreach($group[0]->users as  $usuario){


            if(strtolower($usuario->alias) == strtolower($request->alias)){

                $filtro[] = $request->alias;

            }
        }



        if(count($filtro)>0){
             //verificar lider
              $mensaje = "este alias esta registrado en tu mancha";

            return response()->json(["rpta"=>"error","mensaje"=>$mensaje]);
        }else{
            return response()->json(["rpta"=>"ok"]);
        }

    }


}
