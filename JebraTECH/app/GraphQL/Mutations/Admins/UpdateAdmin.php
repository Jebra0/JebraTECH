<?php

namespace App\GraphQL\Mutations\Admins;

use App\Models\Admin;
use Illuminate\Validation\ValidationException;

final class UpdateAdmin
{

    public function __invoke($_, array $args)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'id' => ['required', 'integer', 'exists:users,id'],
            'name' => ['required', 'string', 'max:250'],
            'email' => ['required', 'string', 'email'],
            'gender' => ['Boolean', 'max: 1'],
            'password' => ['required', 'string', 'min: 8', 'max: 100' ],
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $admin = Admin::find($args['id']);
        if($admin){

            $admin->name = $args['name'];

            $admin->gender = $args['gender'];

            $admin->password = $args['password'];

            if($args['email'] !== $admin->email){
                $admin->email = $args['email'];
                $admin->email_verified_at = NULL;
            }

            $admin->save();
            return $admin;
        }else{

            throw ValidationException::withMessages([
                'message' => ['admin not found '],
            ]);

        }

    }
}
