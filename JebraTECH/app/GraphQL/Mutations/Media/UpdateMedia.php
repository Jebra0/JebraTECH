<?php

namespace App\GraphQL\Mutations\Media;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

final class UpdateMedia
{

    public function __invoke($_, array $args)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'id' => ['required', 'max:1', 'exists:media,id'],
            'url' => ['required', 'String', 'max:500', 'url'],
            'image' => ['required', 'image', 'max:3060'],
            'caption' => ['String', 'max:600'],
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $media = Media::find($args['id']);

        if($media){

            $file = $args['image'];

            $media->url = $args['url'];
            Storage::delete($media->image); // to delete the old image
            $media->image = $file->storePublicly('public/Images/BlogMedia');
            $media->caption = $args['caption'];

            $media->save();

            return $media;

        }else{

            throw ValidationException::withMessages([
                'media' => ['media not found '],
            ]);
        }

    }
}
