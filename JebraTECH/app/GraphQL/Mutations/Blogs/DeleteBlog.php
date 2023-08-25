<?php

namespace App\GraphQL\Mutations\Blogs;

use App\Models\Blog;
use Illuminate\Validation\ValidationException;

final class DeleteBlog
{
    public function __invoke($_, array $args)
    {
        $id = $args['id'];
        $blog = Blog::with('media', 'blogtags')->find($id);
        if($blog && $blog->deleted_at === NULL){
            $blog->delete();
            return $blog;
        }else{
            throw ValidationException::withMessages([
                'blog' => ['Blog not found '],
            ]);
        }
    }
}
