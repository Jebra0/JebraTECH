<?php

namespace App\GraphQL\Mutations\Blogs;

use App\Models\Blog;

final class UpdateBlog
{
    public function __invoke($_, array $args)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'title' => ['required', 'string', 'max:250'],
            'body' => ['required', 'string'],
            'is_hidden' => ['Boolean'],
            'description' => ['required', 'string', 'max:500'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $id = $args['id'];
        $blog = Blog::find($id);

        $blog->title = $args['title'];
        $blog->body = $args['body'];
        $blog->description = $args['description'];
        $blog->is_hidden = $args['is_hidden'];
        $blog->category_id  = $args['category_id'];

        $blog->save();

        return $blog;

    }
}
