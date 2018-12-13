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
      /*  $difhora = 5;

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
        */
    }

//env('APP_HASH')
     public static function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "MCRYPT_RIJNDAEL_128";
        $secret_key = '25D97D571C85FFBABB8FBA83E462EE2B';
        $secret_iv = '62B22654DCE5DAD139AFA8ACE84ECFFF';
        // hash
        $key = $secret_key;


        //$iv = substr($secret_iv, 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0);
        }
        return $output;
    }
}
