<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Shopping\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(155),
        'price' => $faker->randomFloat,
        'stock' => $faker->numberBetween(0,100),
        'paymentType' =>$faker->randomElement(array('Download','Mail','Subscription')),
    ];
});
