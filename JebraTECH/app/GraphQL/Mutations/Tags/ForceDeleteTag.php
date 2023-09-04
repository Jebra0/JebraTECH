<?php

namespace App\GraphQL\Mutations\Tags;

use App\Models\BlogTag;
use App\Models\Tag;

final class ForceDeleteTag
{

    public function __invoke($_, array $args)
    {
        $tag = Tag::withTrashed()->find($args['id']);
        if ($tag) {
            $blogTags = BlogTag::withTrashed()->where('tag_id', $args['id'])->get();
            foreach ($blogTags as $blogTag) {
                $blogTag->forceDelete();
            }

            $tag->forceDelete();

            return "Final Deleting";
        }

    }
}
