<?php

namespace App\GraphQL\Queries\Blogs;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder;

final class GetPopoularBlog
{
    public function __invoke($_, array $args)
    {
        $first = $args['first'];
        $page = $args['page'];

        $offset = ($page - 1) * $first;

        $blogs = DB::table('blogs')
            ->select('blogs.*')
            ->selectRaw('(SELECT COUNT(*) FROM shares WHERE shares.blog_id = blogs.id) AS shares_count')
            ->selectRaw('(SELECT COUNT(*) FROM likes WHERE likes.blog_id = blogs.id) AS likes_count')
            ->selectRaw('(SELECT COUNT(*) FROM comments WHERE comments.blog_id = blogs.id) AS comments_count')
            ->orderByDesc('shares_count')
            ->orderByDesc('likes_count')
            ->orderByDesc('comments_count')
            ->skip($offset)
            ->take($first);


        return $blogs;
    }

}
