<?php

use Faker\Generator as Faker;

$factory->define(App\Asset::class, function (Faker $faker) {
    $category = App\Category::active()->get()->random();
    $employee = "";
    $truck = "";
    $trailer = "";
    $equipment = "";
    $safety = "";
    $other = "";
    switch ($category->name) {
        case 'Employee':
            $name = $faker->unique()->randomElement($array = array ('Foreman', 'Laborer', 'Supervisor', 'Welder', 'Job Planner'));
            break;
        case 'Truck':
            $name = $faker->unique()->randomElement($array = array ('Roustabout Truck', 'Auto Crane Truck', 'Bucket Truck', 'Pick-Up Truck'));
            break;
        case 'Trailer':
            $name = $faker->unique()->randomElement($array = array ('30ft Trailer', '25ft Trailer', 'Enclosed Trailer', 'Dump Trailer', 'Air Trailer'));
            break;
        case 'Equipment':
            $name = $faker->unique()->randomElement($array = array ('Backhoe', '45ft Manlift', 'Skidsteer', 'Telehandler', '60ft Manlift'));
            break;
        case 'Safety':
            $name = $faker->unique()->randomElement($array = array ('Decon Trailer', '5 Min Pack', 'Air Refill', 'Tyvek Suit'));
            break;
        case 'Other':
            $name = $faker->unique()->randomElement($array = array ('Zerks', 'Gas', 'Diesil', 'Citrol'));
            break;
    }

    return [
        'name' => $name,
        'category_id' => $category->id,
    ];
});
