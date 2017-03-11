<?php

namespace Tests;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCaes
{
    use DatabaseTransactions;

    /** @test */
    function it_scopes_out_deleted_models()
    {
        $post = factory(Post::class)->create();
        $deletedPost = factory(Post::class)->create()->delete();

        $results = Post::get();

        $this->assertTrue($results->contains($post));
        $this->assertFalse($results->contains($deletedPost));
    }

    /** @test */
    function it_scopes_published_models()
    {
        $post = factory(Post::class)->create();
        $unpublishedPost = factory(Post::class, 'unpublished')->create();

        $results = Post::published()->get();

        $this->assertTrue($results->contains($post));
        $this->assertFalse($results->contains($unpublishedPost));
    }

    /** @test */
    function it_sets_slug_attribute()
    {
        $post = new Post(['slug' => 'Foo Bar Baz']);

        $this->assertEquals('foo-bar-baz', $post->slug);
    }
}
