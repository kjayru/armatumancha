<?php

use Faker\Generator as Faker;
use App\GroupUser;

$factory->define(GroupUser::class, function (Faker $faker) {
    return [

        'group_id' => \App\Group::all()->random()->id,
        'user_id' => \App\User::all()->random()->id,
    ];
});

