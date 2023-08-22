<?php

namespace App\GraphQL\Queries\Blogs;

use App\Models\Blog;

final class GetBlogsWithTime
{
    public function __invoke($_, array $args)
    {
        $date1 = $args['date1'];
        $date2 = $args['date2'];

        return Blog::orderBy('id', 'desc')
            ->whereBetween('created_at', [$date1, $date2])
            ->get();
    }
}
