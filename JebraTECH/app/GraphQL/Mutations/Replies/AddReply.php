<?php

namespace App\GraphQL\Mutations\Replies;

use App\Models\Reply;

final class AddReply
{
    public function __invoke($_, array $args)
    {
        $reply = new Reply();

        $reply->content = $args['content'];
        $reply->comment_id = $args['comment_id'];
        $reply->user_id = $args['user_id'];

        $reply->save();

    }
}
