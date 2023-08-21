<?php

namespace App\GraphQL\Mutations\Comments;

use App\Models\Comment;

final class DeleteComment
{
    public function __invoke($_, array $args)
    {
        $id = $args['id'];

        $comment = Comment::find($id);

        $comment->delete();
    }
}
