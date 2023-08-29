<?php

namespace App\GraphQL\Queries\Media;

use App\Models\Media;
use Illuminate\Validation\ValidationException;

final class GetMediToBlog
{
    public function __invoke($_, array $args)
    {
        $blog_id = $args['blog_id'];
        $media = Media::with('blog')->where('blog_id', $blog_id)->get();

        if($media){

            return $media;

        }
    }
}
