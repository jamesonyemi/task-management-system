<?php

use Faker\Generator as Faker;

$factory->define(App\Roles::class,3, function (Faker $faker) {
    return [
        'id'=>1,
        'name'=>'Admin',

    ];
});
