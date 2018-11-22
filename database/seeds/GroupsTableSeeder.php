<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Group;
class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $userQuantity = 25;

        factory(Group::class, $userQuantity)->create();
    }
}
