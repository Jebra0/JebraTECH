<?php

namespace App\GraphQL\Mutations\Tags;

use App\Models\Tag;

final class ForceDeleteTag
{

    public function __invoke($_, array $args)
    {
        $tag = Tag::withTrashed()->find($args['id']);
        if($tag){
            $tag->forceDelete();
            return " Final Deleting ";
        }
    }
}
