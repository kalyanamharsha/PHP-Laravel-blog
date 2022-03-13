<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Blog;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\HasFactory;

$factory->define(Blog::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->company,
        'content' => $faker->paragraph,
        'author_id' => \App\Models\User::factory()
    ];
});

