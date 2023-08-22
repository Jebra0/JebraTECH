<?php

namespace App\GraphQL\Queries\Blogs;

use App\Models\Blog;

final class GetPopoularBlog
{
    public function __invoke($_, array $args)
    {
//        it gets all data and need to be paginated
//        ********************************************
        $blogs = Blog::withCount(['shares', 'likes', 'comments'])
            ->orderByDesc('shares_count')
            ->orderByDesc('likes_count')
            ->orderByDesc('comments_count')
            //->take(10)
            ->get();

        return $blogs;
    }
}
