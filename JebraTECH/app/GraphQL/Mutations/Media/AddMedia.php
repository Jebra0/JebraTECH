<?php

namespace App\GraphQL\Mutations\Media;

use App\Models\Media;

final class AddMedia
{

    public function __invoke($_, array $args)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'url' => ['required', 'String', 'max:500', 'url'],
            'image' => ['required', 'image', 'max:3060'],
            'caption' => ['String', 'max:600'],
            'blog_id' => ['required', 'max:1', 'exists:blogs,id']
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $file = $args['image'];

        $media = new Media();
        $media->url = $args['url'];
        $media->image = $file->storePublicly('public/Images/BlogMedia');
        $media->caption = $args['caption'];
        $media->blog_id = $args['blog_id'];

        $media->save();
        return $media;

    }
}
