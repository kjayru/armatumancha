<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const GIGAS = 'gigas';
    const MILLAS = 'millas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alias','numero','email','beneficio','role_id'
    ];



    public function groups(){
        return $this->belongsToMany('App\Group');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function codes(){
        return $this->hasMany('App\Code');
    }


    public static function correoslice($correo){

        $corte = explode("@",$correo);
        $cnueva = $corte[0];
        @$exten = $corte[1];
        $resultado = substr($cnueva, 0,4);
        $generado = $resultado."***@".$exten;
        return $generado;
    }

    public static function numeroslice($numero){
        $resultado = substr($numero, 2,3);
        $resultado2 =  substr($resultado, 0,3);

        return $resultado."******";
    }

    public static function numerosview($numero){
        $resultado = substr($numero, 2,9);


        return $resultado;
    }

    public static function updateHora($registro){
        //2018-11-28 05:22:08
        $difhora = 5;

        $h = explode(" ",$registro);

        $fecha = $h[0];
        $hora  = $h[1];

        $f = explode("-",$fecha);

        $dia = $f[2];
        $mes = $f[1];
        $year = $f[0];


        //sumas

        $hm = explode(":",$hora);

        $horax   = $hm[0];
        $minuto  = $hm[1];
        $segundo = $hm[2];

        //suma horaria

        $result = $horax + $difhora;

        if($result>23){

            $ndia = $dia + 1;
            if( $mes===11){
                if($ndia===31){
                    $mes = 12;
                    $ndia =  1;
                }
            }
            $det = $result - 24;

            $dig =  strlen($det);
            if($dig==1){
                $horanueva = "0".$det;
            }else{
                $horanueva = $det;
            }
        }else{
            $ndia = $dia;
            $dig =  strlen($result);
            if($dig==1){
                $horanueva = "0".$result;
            }else{
                $horanueva = $result;
            }
        }

        //composicion de registro

        $horagenerada =$year."-".$mes."-".$ndia." ".$horanueva.":".$minuto.":".$segundo;

        return $horagenerada;

    }


    public static function validarUsuarioGrupo($pata,$grupo){

        //vericar registros patas y su status
        $registrosPata = \App\User::where('numero',$pata)->get();

        echo "<pre>";
            print_r($registrosPata);

        echo "</pre>";

        //validar si pertence al grupo retorna boleano


    }
}
