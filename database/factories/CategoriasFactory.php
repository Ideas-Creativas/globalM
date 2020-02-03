<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categorias;
use Faker\Generator as Faker;
use App\User;

$factory->define(Categorias::class, function (Faker $faker) {
    return [
        'categoria'=> $faker->company(),
        'user_id' => User::all()->random()
    ];
});
