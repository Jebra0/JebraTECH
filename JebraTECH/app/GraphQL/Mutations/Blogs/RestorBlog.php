<?php

namespace App\GraphQL\Mutations\Blogs;

use App\Models\Blog;
use Illuminate\Validation\ValidationException;

final class RestorBlog
{
    public function __invoke($_, array $args)
    {
        $id = $args['id'];
        $blog = Blog::withTrashed()->find($id);
        if($blog && $blog->deleted_at != NULL){
            $blog->restore();
            return $blog;
        }else{
            throw ValidationException::withMessages([
                'blog' => ['Blog not found '],
            ]);
        }
    }
}
