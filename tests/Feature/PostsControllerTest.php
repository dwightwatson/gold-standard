<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostsControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    function it_displays_the_index_page()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    /** @test */
    function it_displays_the_create_page()
    {
        $response = $this->get('/posts/create');

        $response->assertStatus(200);
    }

    /** @test */
    function it_stores_a_valid_post()
    {
        $attributes = factory(Post::class)->build()->toArray();

        $response = $this->post('/posts', $attributes);

        $post = Post::first();

        $response->assertRedirect("/posts/$[post->id}");
    }

    /** @test */
    function it_does_not_store_invalid_post()
    {
        $response = $this->post('/posts', []);

        $response->assertSessionHasErrors();

        $this->assertNull(Post::first());
    }

    /** @test */
    function it_displays_the_show_page()
    {
        $post = factory(Post::class)->create();

        $response = $this->get("/posts/{$post->id}");

        $response->assertStatus(200);
    }

    /** @test */
    function it_displays_the_edit_page()
    {
        $post = factory(Post::class)->create();

        $response = $this->get("/posts/{$post->id}/edit");

        $response->assertStatus(200);
    }

    /** @test */
    function it_updates_valid_post()
    {
        $post = factory(Post::class)->create();

        $response = $this->put("/posts/{$post->id}", ['title' => 'Updated']);

        $response->assertRedirect("/posts/{$post->id}");

        $this->assertEquals('Updated', $post->fresh()->title);
    }

    /** @test */
    function it_does_not_update_invalid_post()
    {
        $post = factory(Post::class)->create(['title' => 'Example']);

        $response = $this->put("/posts/{$post->id}", []);

        $response->assertSessionHasErrors();

        $this->assertEquals('Example', $post->fresh()->title);
    }

    /** @test */
    function it_deletes_post()
    {
        $post = factory(Post::class)->create();

        $response = $this->delete("/posts/{$post->id}");

        $response->assertRedirect('/posts');

        $this->assertNull($post->fresh());
    }
}
