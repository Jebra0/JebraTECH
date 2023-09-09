<?php

namespace App\GraphQL\Mutations\Users;

use App\Models\User;
use Illuminate\Validation\ValidationException;

final class UpdauteUser
{


    public function __invoke($_, array $args)
    {

        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'id' => ['required', 'integer', 'exists:users,id'],
            'name' => ['required', 'string', 'max:250'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min: 8', 'max: 100' ],
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $user = User::find($args['id']);
        if($user){

            $user->name = $args['name'];

            $user->password = $args['password'];

            if($args['email'] !== $user->email){
                $user->email_verified_at = NULL;
            }

            $user->save();

        }else{

            throw ValidationException::withMessages([
                'message' => ['user not found '],
            ]);

        }

    }
}
