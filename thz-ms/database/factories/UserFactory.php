<?php

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/** @var Factory $factory */
$factory->define(User::class, static function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'second_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('secret')
    ];
});
