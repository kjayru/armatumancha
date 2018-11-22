<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $userQuantity = 100;

        factory(App\UserGroup::class, $userQuantity)->create();

    }
}
