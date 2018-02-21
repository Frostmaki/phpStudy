<?php

use Faker\Generator as Faker;

$factory->define(App\status::class, function (Faker $faker) {
        //
        $date_time = $faker->date . ' ' . $faker->time;
    return [

        'title'    => $faker->text(10),
        'content'    => $faker->text(),
        'user_id'    =>$faker->numberBetween(1,3),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];

});
