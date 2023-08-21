<?php

namespace App\GraphQL\Mutations\Comments;

use App\Models\Comment;

final class UpdateComment
{
    public function __invoke($_, array $args)
    {
        $id = $args['id'];

        $comment = Comment::find($id);

        $comment->content = $args['content'];

        $comment->save();

        return $comment;
    }
}
