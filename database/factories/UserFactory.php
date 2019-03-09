<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Model\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'sex' => random_int(0,2),
        'avatar' => 'http://wx.qlogo.cn/mmhead/Q3auHgzwzM6dqkWZbgT555ahwPIT1CbzGEs8RFibPtLwoEPbiabZT2Lg/0',
        'phone' => $faker->regexify('1[3-8]{2}[0-9]{8}'),
        'description' => "This is a test for 'description'"
    ];
});
