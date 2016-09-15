<?php

use App\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostsTest extends \TestCase
{
    use DatabaseTransactions;

    /** @test */
    function it_displays_the_index_page()
    {
        $post = factory(Post::class)->create();

        $this->visit('/posts')
            ->see($post->title);
    }

    /** @test */
    function it_displays_the_create_form()
    {
        $this->visit('posts/create');
    }

    /** @test */
    function it_stores_a_valid_post()
    {
        $attributes = factory(Post::class)->build()->toArray();

        $this->visit('/posts/create');

        //
    }
}
