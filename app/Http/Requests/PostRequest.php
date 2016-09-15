<?php

namespace App\Http\Requests;

class PostRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $post = $this->parameter('post');

        return [
            'title'   => 'required',
            'slug'    => 'required|unique:posts,slug,' . ($post ? ',' . $post->id : 'NULL') . ',id,deleted_at,NULL',
            'content' => 'required',
        ];
    }
}
