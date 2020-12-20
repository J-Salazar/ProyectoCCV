<?php

use Faker\Generator as Faker;

$factory->define(App\Administrador::class, function (Faker $faker) {
    return [

        'name' => $faker->name,
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456'), // secret
        'remember_token' => str_random(10),

    ];
});
