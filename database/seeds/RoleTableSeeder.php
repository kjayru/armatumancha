<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'name' => 'lider',
            'description'=>'lider de grupo'
        ]);

        Role::create([
            'name' => 'pata',
            'description'=>'participante pata'
        ]);
    }
}
