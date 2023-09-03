<?php

namespace App\GraphQL\Mutations\BlogTags;

use App\Models\BlogTag;

final class UpdateBlogTags
{

    public function __invoke($_, array $args)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'blog_id' => ['required', 'integer', 'exists:blogs,id'],
            'tag_id' => ['required', 'integer', 'exists:tags,id'],
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $blogtag = BlogTag::find($args['id']);

        $blogtag->blog_id  = $args['blog_id'];
        $blogtag->tag_id  = $args['tag_id'];

        $blogtag->save();
        return $blogtag;
    }
}
