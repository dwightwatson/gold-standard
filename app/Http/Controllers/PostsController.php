<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    /**
     * GET /posts
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * GET /posts/create
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * POST /posts
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        return redirect()->route('posts.show', $post)
            ->withSuccess('Post was created successfully.');
    }

    /**
     * GET /posts/1
     *
     * @param  \App\Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * GET /posts/1/edit
     *
     * @param  \App\Post  $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * PUT /posts/1
     *
     * @param  \App\Post  $post
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->all());

        return redirect()->route('posts.show', $post)
            ->withSuccess('Post was updated successfully.');
    }

    /**
     * DELETE /posts/1
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
