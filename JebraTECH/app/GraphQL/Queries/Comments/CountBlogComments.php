<?php

namespace App\GraphQL\Queries\Comments;

use App\Models\Comment;

final class CountBlogComments
{
    public function __invoke($_, array $args)
    {
        $id = $args['id'];
        return Comment::where('blog_id', $id)->count();
    }
}
