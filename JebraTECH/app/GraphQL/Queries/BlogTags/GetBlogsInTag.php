<?php

namespace App\GraphQL\Queries\BlogTags;

use App\Models\Blog;
use App\Models\BlogTag;

final class GetBlogsInTag
{

    public function __invoke($_, array $args)
    {
        $blogsId = BlogTag::where('tag_id', $args['tag'])->pluck('blog_id');

        if($blogsId){

            $blogs = Blog::whereIn('id', $blogsId);

            if($blogs){
               return $blogs->get();
            }
        }

    }
}
