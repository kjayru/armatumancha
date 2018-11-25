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

        $numcode = Code::whereNull('user_id')->first();
        $code_asig = $numcode->id;

        $user = new User();
        $user->alias = $request->alias;
        $user->numero = $request->telefono;
        $user->email = $request->email;
        $user->beneficio = ' ';
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

        return response()->json(['rpta'=>'ok']);
    }

    public function asignarlider(Request $request){

        $contar = User::where('id',$request->user_id)
                    ->where('status',2)->count();

        if($contar>0){
            $codigo = Code::where('user_id',$request->user_id)
                        ->where('status',2)->first();


            $peticion = new Petition();

            $peticion->owner_user_id = $request->lider_id;
            $peticion->sucessor_user_id = $request->user_id;
            $peticion->code_id = $codigo->id;

            $peticion->save();
            return response()->json(['rpta'=>'ok','mensaje'=>'Se envio una petición a tu pata.']);
        }else{
            return response()->json(['rpta'=>'error','mensaje'=>'El usuario aun no participa..']);
        }

    }



    public function borrarpata($id){


        User::where('id',$id)->delete();

        return response()->json(['rpta'=>'ok']);
    }


    public function validarcelular($celular){

        return response()->json(['rpta'=>'ok']);
    }

    public function recuperarcodigo(Request $request){

            $contar2 = User::where('numero',$request->numerocel)->where('role_id',1)->count();

            if($contar2 > 0){
                $user = User::where('numero',$request->numerocel)->first();


                    $user_id = $user->id;
                    $codigo = Code::where('user_id',$user->id)
                            ->where('status','2')->first();

                    $codigosms = $codigo->code;
                    //Enviar notificacion

                return view('front.olvide_codigo');

            }else{

               return redirect()->route('home.ingresecelular',['mensaje'=>1]);
            }




    }

    public function validarcodigorecuperado($codigo){

        return response()->json(['rpta'=>'ok']);
    }



    public function listamanchaingreso(){


        $user = User::where('id',Auth::id())->first();

        $group_id = $user->groups[0]->id;

        $grupores = Group::where('id',$group_id)->with('users')->first();


        return view('front.lista_mancha_ingreso',['grupores'=>$grupores]);
    }


    public function listamanchasesion(Request $request){
        //verifico mi grupo
        $user = User::where('id',Auth::id())->first();

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

        //$code = Code::where('code',$request->codigo)
         //           ->where('status',2)->first();


        foreach( $patas->users as $pata){

            foreach($pata->codes as $icode){
               // crear arreglo de codigos

                if( $icode->code==$request->codigo && $icode->status==2){
                    $user_id = $icode->id;
                    $user_rol = $pata->role_id;

                    $code = true;
                }
            }

          }


        if($code){


            $user = User::where('id',$user_id)->first();

            $grupores = Group::where('id',$group_id)->with('users')->first();



            if($user_rol==1){
                return view('front.lista_mancha_sesion',['grupores'=>$grupores,'peticion'=>$existe_peticion]);
            }else{
                return redirect()->route('home.listamancha',['mensaje'=>1]);
            }

        }else{
            //dd("error");
            return redirect()->route('home.listamancha',['mensaje'=>2]);

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
            User::where('user_id',$petition->sucesor_user_id)->update(['role_id'=>1]);


            $disabledCode = Code::where('user_id',$request->owner_user_id)->update(['status'=>3]);
            //
            //nuevo codigo lider
            $numcode = Code::whereNull('user_id')->first();
            $codesa= Code::where('id',$numcode->id)->update(['user_id'=>$request->owner_user_id,'status'=>2]);



            $disabledCode2 = Code::where('user_id',$request->sucesor_user_id)->update(['status'=>3]);


            $numcode2 = Code::whereNull('user_id')->first();

             Code::where('id',$numcode2->id)
                ->update(['user_id'=>$request->sucesor_user_id,'status'=>2]);
        }
        ///se envian nuevos codigos ..notificacion
        dd("asignacion ejecutada..");

    }


}
