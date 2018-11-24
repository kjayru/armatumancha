<?php

use Faker\Generator as Faker;
use App\Role;
use App\User;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'alias' => $faker->name,
        'numero' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'beneficio'=>$faker->randomElement([User::GIGAS, User::MILLAS]),
        'role_id'=>$faker->randomElement([Role::LIDER, Role::PATA]),

    ];
});
