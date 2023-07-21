<?php

namespace App\GraphQL\Mutations;

use App\Models\Admin;
use App\Models\User;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class Login
{
    public function __invoke($_, array $args)
    {
        if ($args['role'] == 'user'){
            $table = User::where('email', $args['email'])->first();
        }elseif ($args['role'] == 'admin'){
            $table = Admin::where('email', $args['email'])->first();
        }else{
            $table = false;
        }

        if ( ! $table || ! Hash::check($args['password'], $table->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $table->createToken($args['email'])->plainTextToken;

    }
}
