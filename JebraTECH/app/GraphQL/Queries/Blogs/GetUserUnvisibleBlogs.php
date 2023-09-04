<?php

namespace App\GraphQL\Queries\Blogs;

use App\Models\Blog;

final class GetUserUnvisibleBlogs
{

    public function __invoke($_, array $args)
    {
        $blogs = Blog::where('writter_id', $args['writer_id'])->where('is_hidden', 1);
        if ($blogs){
            return $blogs->get();
        }
    }
}
