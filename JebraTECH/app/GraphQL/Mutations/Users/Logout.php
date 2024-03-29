<?php

namespace App\GraphQL\Mutations\Users;

use App\Models\Admin;
use App\Models\User;

final class Logout
{
    public function __invoke($_, array $args)
    {

        $table = User::where('id', $args['id'])->first();

        $table->tokens()->delete();
        return $table;
    }
}
