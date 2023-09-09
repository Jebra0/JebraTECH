<?php

namespace App\GraphQL\Mutations\Admins;

use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

final class UpdateAdminPhoto
{

    public function __invoke($_, array $args)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'id' => ['required', 'max:1', 'exists:admins,id'],
            'photo' => ['required', 'image', 'max:3060'],
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }
        $photo = Admin::find($args['id']);

        if ($photo) {

            $file = $args['photo'];
            if($photo->photo != "Default.jpg"){
                Storage::delete($photo->photo);  // to delete the old image if it was not the default image .
            }
            $photo->photo = $file->storePublicly('public/Images/AdminPhoto');

            $photo->save();

            return $photo;
        }else{
            throw ValidationException::withMessages([
                'message' => ['admin not found '],
            ]);
        }
    }
}
