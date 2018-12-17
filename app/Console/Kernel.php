<?php

namespace App\Console;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Rap2hpoutre\FastExcel\FastExcel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
          //IN_LIDER
          $schedule->call(function () {

            $users = DB::select( DB::raw("select 'idlinea','idMancha','linea','beneficio'
            union all
            select t1.id idlinea,
                   t3.id idMancha,
                   t1.numero linea,
                   (case when t1.beneficio = 'bonos' then 'GIGAS' when t1.beneficio = 'latam' then 'MILLAS' end) as beneficio
            from users t1
            inner join group_user t2 on t2.user_id = t1.id
            inner join groups t3 on  t2.group_id = t3.id
            where t1.beneficio <> ''
            and t1.role_id = '1'
            and t1.numero not in('51000000010','51910467651','51967441839','51987414785','51949406090','51993144900','51992910007','51993144900','51000000222',
            '51000000110','51000299990','51999292992','51912345668','51912345678','51999999991','51933361369','51999999992','51997563311','51923152691','51932797055',
            '51935835601','51916428732','51999999998','51999912312','51960932565','51992910007','51961730610')"));
             $contents='';
             foreach($users as $k=> $user){
                 if($k>0){
                 $contents .= $user->idlinea."|".$user->idMancha."|".$user->linea."|".$user->beneficio."\r\n";
                 }
             }


             Storage::put('ftp/IN_LIDER.txt', $contents);

         })->dailyAt('09:30');
       // })->everyMinute();

         //IN_MIEMBRO
         $schedule->call(function () {

            $users = DB::select( DB::raw("select 'idlinea','idMancha','linea','beneficio'
            union all
            select t1.id idlinea,
                   t3.id idMancha,
                   t1.numero linea,
                   (case when t1.beneficio = 'bonos' then 'GIGAS' when t1.beneficio = 'latam' then 'MILLAS' end) as beneficio
            from users t1
            inner join group_user t2 on t2.user_id = t1.id
            inner join groups t3 on  t2.group_id = t3.id
            where t1.beneficio <> ''
            and t1.role_id = '2' and t1.status = 2
            and t1.numero not in('51000000010','51910467651','51967441839','51987414785','51949406090','51993144900','51992910007','51993144900','51000000222','51000000110','51000299990',
            '51999292992','51912345668','51912345678','51999999991','51933361369','51999999992','51997563311','51923152691','51932797055','51935835601','51916428732','51999999998',
            '51999912312','51960932565','51992910007','51961730610')"));

              $contents='';
              foreach($users as $k=> $user){
                  if($k>0){
                  $contents .= $user->idlinea."|".$user->idMancha."|".$user->linea."|".$user->beneficio."\r\n";
                  }
              }


              Storage::put('ftp/IN_MIEMBRO.txt', $contents);

          })->dailyAt('09:30');




          //reportemancha
         $schedule->call(function () {

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

              $fila =  (new FastExcel($users))->export("reporte_general_".DATE_FORMAT(now(),'d-m-Y').".xlsx");

          })->dailyAt('09:30');


           //Users
         $schedule->call(function () {

             $users =  DB::table('users')->get();

              $contents='';
              foreach($users as $k=> $user){

                  $contents .= $user->id."|".$user->alias."|".$user->email."|".$user->beneficio."|".$user->status."|".$user->califica."|".$user->role_id."|".$user->created_at."|".$user->updated_at."\r\n";

              }


              Storage::put('ftp/users.txt', $contents);

          })->dailyAt('09:30');


            //group
        $schedule->call(function () {

             $users =  DB::table('groups')->get();

              $contents='';
              foreach($users as $k=> $user){

                  $contents .= $user->name."|".$user->created_at."|".$user->updated_at."\r\n";

              }


              Storage::put('ftp/groups.txt', $contents);

        })->dailyAt('09:30');

        $schedule->call(function () {

             $users =  DB::table('group_user')->get();

              $contents='';
              foreach($users as $k=> $user){

                  $contents .= $user->group_id."|".$user->user_id."\r\n";

              }


              Storage::put('ftp/group_user.txt', $contents);

        })->dailyAt('09:30');


          //notification_response
        $schedule->call(function () {

             $users =  DB::table('notification_response')->get();

              $contents='';
              foreach($users as $k=> $user){

                  $contents .= $user->id."|".$user->supplier_code."|".$user->subaccount_name."|".$user->campaign_alias."|".$user->carrier_id."|".$user->carrier_name."|".$user->user_number."|".$user->shortcode."|".$user->content."|".$user->received_at."|".$user->received_date."|".$user->supplier_origin_code."|".$user->notification_origin_id."|".$user->sender_name."|".$user->sender_email."|".$user->created_at."|".$user->updated_at."|".$user->status."|".$user->id_users."\r\n";

              }


              Storage::put('ftp/notification_response.txt', $contents);

        })->dailyAt('09:30');


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
