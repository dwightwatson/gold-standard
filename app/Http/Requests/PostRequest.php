<?php

namespace App\Http\Requests;

use Illuminate\validation\Rule;

class PostRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'   => 'required',
            'slug'    => ['required', $this->uniqueSlug()],
            'content' => 'required',
        ];
    }

    /**
     * Build a unique rule for the slug.
     *
     * @return \Illuminate\Validation\Rule
     */
    protected function uniqueSlug()
    {
        $post = $this->parameter('post');

        Rule::unique('posts', 'slug')
            ->ignore($post->id)
            ->where(function ($query) {
                $query->whereNull('deleted_at');
            });
    }
}
