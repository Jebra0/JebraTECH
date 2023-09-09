<?php

namespace App\GraphQL\Mutations\Admins;

use App\Models\Admin;

final class DissactivateAdmin
{

    public function __invoke($_, array $args)
    {
        $admin = Admin::find($args['id']);
        $admin->is_active = false ;
        $admin->save();
        return $admin;
    }
}
