<?php

namespace App\GraphQL\Mutations\Media;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

final class DeleteMedia
{

    public function __invoke($_, array $args)
    {
        $media = Media::find($args['id']);
        if($media){
            $media->forceDelete();
            Storage::delete($media->image); // to delete the old image
            return $media;
        }else{
            throw ValidationException::withMessages([
                'blog' => ['Blog not found '],
            ]);
        }
    }
}
