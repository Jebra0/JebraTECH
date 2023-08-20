<?php

namespace App\GraphQL\Queries\Comments;

use App\Models\Comment;

final class LatestComments
{

    public function __invoke($_, array $args)
    {
        $count = $args['count'];

        return   Comment::orderBy('id', 'desc')
            ->limit($count)
            ->get();
    }
}
