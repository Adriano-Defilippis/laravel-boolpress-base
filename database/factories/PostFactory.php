<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
      "title" => $faker -> word,
      "desc" => $faker -> sentence,
      "content" => $faker -> text,
      "author" => $faker -> username
    ];
});
