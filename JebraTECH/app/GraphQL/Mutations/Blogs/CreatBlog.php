<?php

namespace App\GraphQL\Mutations\Blogs;

use App\Models\Blog;
use App\Rules\CheckUserIfIsWriter;

final class CreatBlog
{
    public function __invoke($_, array $args )
    {
        
        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'title' => ['required', 'string', 'max:250'],
            'body' => ['required', 'string'],
            'is_hidden' => ['Boolean'],
            'description' => ['required', 'string', 'max:500'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'writter_id' => ['required', 'integer', 'exists:users,id', new CheckUserIfIsWriter($args['writter_id'])],
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $blog = new Blog();

        $blog->title = $args['title'];
        $blog->body = $args['body'];
        $blog->description = $args['description'];
        $blog->is_hidden = $args['is_hidden'];
        $blog->category_id  = $args['category_id'];
        $blog->writter_id   = $args['writter_id'];

        $blog->save();

        return $blog;
    }
}
