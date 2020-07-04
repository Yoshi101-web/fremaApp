<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'image' => 'dummy.png',
        'item_id' => function() {
            return factory(App\Item::class)->create()->id;
        },
    ];
}); 