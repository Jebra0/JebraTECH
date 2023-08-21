<?php

namespace App\GraphQL\Mutations\Replies;

use App\Models\Reply;
use Illuminate\Validation\ValidationException;

final class UpdateReply
{
    public function __invoke($_, array $args)
    {
        $id = $args['id'];

        $reply = Reply::find($id);
        if($reply){

            $reply->content = $args['content'];
            $reply->save();

        }else{
            throw ValidationException::withMessages([
                'reply' => ['the reply not found'],
            ]);
        }
    }
}
