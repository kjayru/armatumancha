<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Code;
use App\User;
use App\Group;
use App\GroupUser;

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

      /*  $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);*/
        //redirect segun beneficio
        //dd($request);
         //get code
        $numcode = Code::whereNotNull('user_id')->count();
        $code_asig = intval($numcode+1);

        $beneficio =  $request->beneficio;

        $grupo = new Group();
        $grupo->name = $request->nombres;
        $grupo->save();

        $usuario = new User();
        $usuario->alias = $request->lidername;
        $usuario->numero = $request->lidercel;
        $usuario->email = $request->lideremail;
        $usuario->beneficio = $request->beneficio;
        $usuario->role_id = 1;
        $usuario->save();

        //distribucion
        $usergroup = new GroupUser();
        $usergroup->user_id =  $usuario->id;
        $usergroup->group_id = $grupo->id;
        $usergroup->save();

        //codigo
        $codigo = Code::where('id',$code_asig)
                      ->update(['user_id'=>$usuario->id,'status'=>2]);


        ///bucle patas
        $numpatas = count($request->alias);

        for($i=0; $i<$numpatas; $i++){

            $numcode2 = Code::whereNotNull('user_id')->count();
            $code_asig2 = intval($numcode2+1);

            $pata = new User();

            $pata->alias = $request->alias[$i];
            $pata->numero = $request->telefono[$i];
            $pata->beneficio = $beneficio;

            if($request->email[$i]){
                 $pata->email = $request->email[$i];
            }

            $pata->role_id = '2';
            $pata->save();

            $usergroup = new GroupUser();
            $usergroup->user_id =  $pata->id;
            $usergroup->group_id = $grupo->id;

            $usergroup->save();

            $codigo2 = Code::where('id',$code_asig2)
            ->update(['user_id'=>$pata->id,'status'=>2]);

        }

        //envio de sms



        switch ($beneficio) {
            case 'bonos':
            return redirect()->route('home.graciasgigas',['group_id'=> $grupo->id]);

            break;

            case 'latam':
            return redirect()->route('home.graciasmillas',['group_id'=> $grupo->id]);
            break;
        }




    }



    public function crearpata(Request $request){

        $numcode = Code::whereNotNull('user_id')->count();
        $code_asig = intval($numcode+1);

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

    public function asignarlider(Request $request,$id){
        //actualiza estado en user

        //cambiar privilegio lider
        $user = User::where('id',$request->lider_id)
            ->update(['role_id'=>'2']);

        $disabledCode = Code::where('user_id',$request->lider_id)->update(['status'=>3]);
        //
        //insert user en code y extrae

        $user2 = User::where('id',$request->user_id)
            ->update(['role_id'=>'1']);

        $disabledCode2 = Code::where('user_id',$request->user_id)->update(['status'=>3]);

        //nuevo codigo lider
        $numcode = Code::whereNotNull('user_id')->count();
        $code_asig = intval($numcode+1);

         Code::where('id',$code_asig)
            ->update(['user_id'=>$request->lider_id,'status'=>2]);

        //nuevo codigo user

        $numcode2 = Code::whereNotNull('user_id')->count();
        $code_asig2 = intval($numcode2+1);

         Code::where('id',$code_asig2)
            ->update(['user_id'=>$request->user_id,'status'=>2]);

        //send new code sms

        return response()->json(['rpta'=>'ok']);
    }

    public function borrarpata($id){


        User::where('id',$id)->delete();

        return response()->json(['rpta'=>'ok']);
    }


    public function validarcelular($celular){

        return response()->json(['rpta'=>'ok']);
    }

    public function recuperarcodigo($nombrecelular){
        $imancha = $nombrecelular;

        //busqueda mancha
        $contar = Group::where('name','like','%'.$imancha.'%')->count();

       if($contar>0){

            $grupores = Group::where('name','like','%'.$imancha.'%')->with('users')->first();
           if($grupores->users[0]->role_id==1){


                $user = User::where('id',$grupores->users[0]->id)->first();
                $user_id = $user->id;

                $codigo = Code::where('user_id',$user_id)
                        ->where('status','2')->first();

                $codigosms = $codigo->code;

                ///ENVIO DE NOTIFICACION
           }


       }else{
            $contar2 = User::where('numero',$imancha)->count();

            if($contar2 > 0){
                $user = User::where('numero',$imancha)->first();
                $group_id = $user->groups[0]->id;
                $grupores = Group::where('id',$group_id)->with('users')->first();

                if($grupores->users[0]->role_id==1){


                    $user = User::where('id',$grupores->users[0]->id)->first();
                    $user_id = $user->id;

                    $codigo = Code::where('user_id',$user_id)
                            ->where('status','2')->first();

                    $codigosms = $codigo->code;
                    //ENVIO DE NOTIFICACION
               }

            }
       }


        return view('front.olvide_codigo');
    }

    public function validarcodigorecuperado($codigo){

        return response()->json(['rpta'=>'ok']);
    }

}
