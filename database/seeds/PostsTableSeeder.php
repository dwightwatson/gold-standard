<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        factory(Post::class, 100)->create()
            ->each(function ($post) {
                $post->user()->save(
                    factory(User::class)->make()
                );
            });

        factory(Post::class, 'unpublished', 10)->create()
            ->each(function ($post) {
                $post->user()->save(
                    factory(User::class)->make()
                );
            });
    }
}
