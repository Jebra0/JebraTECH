<?php

namespace App\GraphQL\Mutations\Blogs;

use App\Models\Blog;
use Illuminate\Validation\ValidationException;

final class HideBlog
{
    public function __invoke($_, array $args)
    {
        $id = $args['id'];
        $blog = Blog::find($id);

        if($blog && $blog->is_hidden === 0 ){

            $blog->is_hidden = true;
            $blog->save();

            return $blog ;

        }else{

            throw ValidationException::withMessages([
                'blog' => ['Blog not found '],
            ]);

        }
    }
}
