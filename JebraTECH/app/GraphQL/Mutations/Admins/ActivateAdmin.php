<?php

namespace App\GraphQL\Mutations\Admins;

use App\Models\Admin;

final class ActivateAdmin
{

    public function __invoke($_, array $args)
    {
        $admin = Admin::find($args['id']);
        $admin->is_active = true ;
        $admin->save();
        return $admin;
    }
}
