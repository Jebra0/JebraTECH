<?php

namespace App\GraphQL\Mutations\Tags;

use App\Models\Tag;

final class DeleteTag
{

    public function __invoke($_, array $args)
    {
        $tag = Tag::find($args['id']);
        if($tag){
            $tag->delete();
            return " Deleted Successfully ";
        }
    }
}
