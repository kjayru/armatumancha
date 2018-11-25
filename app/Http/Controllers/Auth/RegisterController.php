<?php

namespace App\Http\Controllers\Auth;

use App\Code;
use App\User;
use App\Group;
use App\GroupUser;

use App\Http\Controllers\Controller;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


     public function showRegistrationForm()
        {
            return view('auth.register');
        }


    public function register(Request $request)
    {


         $this->validator($request->all())->validate();

         //dd("primer paso");
        //event(new Registered($user = $this->create($request->all())));


        $numcode = Code::whereNull('user_id')->first();
        $code_asig = $numcode->id;

        $beneficio =  $request->beneficio;

        $grupo = new Group();
        $grupo->name = strtolower($request->nombres);
        $grupo->save();

        $usuario = new User();
        $usuario->alias = $request->lidername;
        $usuario->numero = $request->lidercel;
        $usuario->email = $request->lideremail;
        $usuario->beneficio = $request->beneficio;
        $usuario->status = 2;
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

            $numcode2 = Code::whereNull('user_id')->first();
            $code_asig2 = $numcode2->id;

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
            ->update(['user_id'=>$pata->id,'status'=>1]);

        }

        //envio de sms


        $this->guard()->login($usuario);
        switch ($beneficio) {
            case 'bonos':

            return redirect()->route('home.graciasgigas',['group_id'=> $grupo->id]);

            break;

            case 'latam':
            return redirect()->route('home.graciasmillas',['group_id'=> $grupo->id]);
            break;
        }

        /*$this->guard()->login($usuario);

        return $this->registered($request, $usuario)
                        ?: redirect($this->redirectPath());*/





    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [

            'nombres' => ['required', 'string', 'max:255'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    protected function registered(Request $request, $user)
    {
        //
    }
}
