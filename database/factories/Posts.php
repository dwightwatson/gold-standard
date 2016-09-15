<?php

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title'   => $faker->catchPhrase,
        'slug'    => $faker->slug,
        'content' => $faker->paragraph,
    ];
});

$factory->define(App\Post::class, 'unpublished', function (Faker\Generator $faker) {
    $post = $factory->raw(App\Post::class);

    return array_merge($post, ['published_at' => null]);
});
