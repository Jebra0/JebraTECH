<?php

namespace App\GraphQL\Mutations\Media;

use App\Models\Media;

final class AddMedia
{
    
    public function __invoke($_, array $args)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'url' => ['required', 'String', 'max:500'],
            'image' => ['required', 'image', 'max:3060'],
            'caption' => ['String', 'max:600'],
            'blog_id' => ['required', 'max:1', 'exists:blogs,id']
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $media = new Media();
        
        $media->url = $args['url'];
        $media->image = $args['image'];
        $media->caption = $args['caption'];
        $media->blog_id = $args['blog_id'];

        $media->save();
        return $media;
    }
}
