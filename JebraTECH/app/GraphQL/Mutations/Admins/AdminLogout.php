<?php

namespace App\GraphQL\Mutations\Admins;

use App\Models\Admin;

final class AdminLogout
{

    public function __invoke($_, array $args)
    {

        $table = Admin::where('id', $args['id'])->first();

        $table->tokens()->delete();
        return $table;
    }
}
