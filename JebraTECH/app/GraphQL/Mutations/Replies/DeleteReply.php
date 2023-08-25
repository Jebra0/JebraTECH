<?php

namespace App\GraphQL\Mutations\Replies;

use App\Models\Reply;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\returnArgument;

final class DeleteReply
{
    public function __invoke($_, array $args)
    {
        $id = $args['id'];

        $reply = Reply::find($id);
        if($reply && $reply->deleted_at === NULL){
            $reply->delete();
        }else{
            throw ValidationException::withMessages([
                'reply' => ['the reply not found'],
            ]);
        }


    }
}
