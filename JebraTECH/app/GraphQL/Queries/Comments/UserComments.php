<?php

namespace App\GraphQL\Queries\Comments;

use App\Models\Comment;

final class UserComments
{
    public function __invoke($_, array $args)
    {
        $id = $args['id'];
        return Comment::with('replies')->where('user_id', $id)->get();
    }
}
