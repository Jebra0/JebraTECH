<?php

namespace App\GraphQL\Queries\Blogs;

use App\Models\Blog;

final class GetUserBlogs
{

    public function __invoke($_, array $args)
    {
        $blogs = Blog::where('writter_id', $args['writer_id']);
        if ($blogs){
            return $blogs->get();
        }
    }
}
