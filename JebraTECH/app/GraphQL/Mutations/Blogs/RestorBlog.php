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

        if ($blog && $blog->trashed()) {

            // Restore related BlogTag records
            $blog->blogtags()->withTrashed()->restore();

            // Restore related Media records
            $blog->media()->withTrashed()->restore();

            // Restore related Share records
            $blog->shares()->withTrashed()->restore();

            // Restore related Like records
            $blog->likes()->withTrashed()->restore();

            $blog->comments()->withTrashed()->restore();
            $blog->comments->each(function ($comment) {
                $comment->replies()->withTrashed()->restore();
            });

            // Restore related Report records
            $blog->reborts()->withTrashed()->restore();

            // Restore related Read records
            $blog->reads()->withTrashed()->restore();

            // Restore the main Blog record
            $blog->restore();

            return $blog;
        } else {
            throw ValidationException::withMessages([
                'blog' => ['Blog not found '],
            ]);
        }
    }

}
