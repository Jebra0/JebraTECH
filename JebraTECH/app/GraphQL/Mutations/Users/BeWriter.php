<?php

namespace App\GraphQL\Mutations\Users;

use App\Models\User;

final class BeWriter
{

    public function __invoke($_, array $args)
    {
        $user = User::find($args['id']);
        if($user && $user->is_writer == 0){
            $user->is_writer = 1;
            $user->save();
            return $user;
        }
    }
}
