<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckUserIfIsWriter implements ValidationRule
{
    protected $id;

    public function __construct($id){
        $this->id = $id;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where('id', $this->id)->where('is_writer', 1)->exists();

        if (!$user) {
            $fail('The selected user must have to be writer');
        }
    }
}
