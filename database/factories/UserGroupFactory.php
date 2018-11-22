<?php

use Faker\Generator as Faker;
use App\UserGroup;

$factory->define(UserGroup::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'group_id' => \App\Group::all()->random()->id,
    ];
});

