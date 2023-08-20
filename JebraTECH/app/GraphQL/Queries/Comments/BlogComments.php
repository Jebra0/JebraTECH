<?php

namespace App\GraphQL\Queries\Comments;

use App\Models\Comment;

final class BlogComments
{
    public function __invoke($_, array $args)
    {
        $id = $args['id'];
        return Comment::with('replies')
            ->withCount('replies')
            ->where('blog_id', $id)
            ->orderBy('replies_count', 'desc')
            ->get();
    }
}
