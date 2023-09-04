<?php

namespace App\GraphQL\Mutations\Users;

use App\Models\Admin;
use App\Models\User;

final class Logout
{
    public function __invoke($_, array $args)
    {
        if ($args['role'] == 'user'){
            $table = User::where('id', $args['id'])->first();
        }elseif ($args['role'] == 'admin'){
            $table = Admin::where('id', $args['id'])->first();
        }else{
            $table = false;
        }

        $table->tokens()->delete();
        return $table;
    }
}
