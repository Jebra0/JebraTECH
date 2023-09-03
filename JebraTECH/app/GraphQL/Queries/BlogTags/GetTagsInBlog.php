<?php

namespace App\GraphQL\Queries\BlogTags;

use App\Models\BlogTag;
use App\Models\Tag;

final class GetTagsInBlog
{
    public function __invoke($_, array $args)
    {
        $tagId = BlogTag::where('blog_id', $args['blog'])->pluck('tag_id');

        if($tagId){

            $tags = Tag::whereIn('id', $tagId);

            if($tags){
                return $tags->get();
            }
        }
    }
}
