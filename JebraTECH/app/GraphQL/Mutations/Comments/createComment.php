<?php

namespace App\GraphQL\Mutations\Comments;

use App\Models\Comment;

final class createComment
{
    public function __invoke($_, array $args)
    {

        $comment = new Comment();

        $comment->content = $args['content'];
        $comment->user_id = $args['user_id'];
        $comment->blog_id = $args['blog_id'];

        $comment->save();

        return $comment;
    }
}
