<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'item_name' =>  $faker->realText(20),
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'category_id' => $faker->numberBetween(1, 10),
        'category_child_id' => $faker->numberBetween(101, 300),
        'brand_name'=> $faker->word,
        'description' => $faker->realText(200),
        'price'=> $faker->numberBetween(301, 10000),
        'size' => $faker->numberBetween(2, 10),
        'condition' => $faker->randomElement($array = array ('新品、未使用','未使用に近い','目立った傷や汚れなし', 'やや傷や汚れあり', '傷や汚れあり', '全体的に状態が悪い')),
        'shipping_fee_payer' => $faker->randomElement($array = array ('送料込み（出品者負担）','着払い（購入者負担')),
        'prefecture_id' => $faker->numberBetween(1,47),
        'shipping_days' => $faker->randomElement($array = array 
        ('１〜２日で発送','２〜３日で発送', '４〜７日で発送')),
    ];
});