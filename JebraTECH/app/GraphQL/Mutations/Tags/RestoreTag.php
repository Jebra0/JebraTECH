<?php

namespace App\GraphQL\Mutations\Tags;

use App\Models\Tag;

final class RestoreTag
{

    public function __invoke($_, array $args)
    {
        $tag = Tag::withTrashed()->find($args['id']);
        if($tag){
            $tag->restore();
            return " Restored Successfully ";
        }
    }
}
