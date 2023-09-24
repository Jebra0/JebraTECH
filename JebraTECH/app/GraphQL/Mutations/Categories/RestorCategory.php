<?php

namespace App\GraphQL\Mutations\Categories;

use App\Models\Category;
use Illuminate\Validation\ValidationException;

final class RestorCategory
{

    public function __invoke($_, array $args)
    {
        $id = $args['id'];
        $category = Category::with('blogs')->withTrashed()->find($id);

        if ($category && $category->trashed()) {

            $category->restore();

            $category->blogs->each(function ($blog) {

                $blog->blogtags()->withTrashed()->restore();

                $blog->comments()->withTrashed()->restore();
                $blog->comments->each(function ($comment) {
                    $comment->replies()->withTrashed()->restore();
                });

                $blog->media()->withTrashed()->restore();

                $blog->shares()->withTrashed()->restore();

                $blog->likes()->withTrashed()->restore();

                $blog->reborts()->withTrashed()->restore();

                $blog->reads()->withTrashed()->restore();

                $blog->restore();
            });

            return $category;

        } else {
            throw ValidationException::withMessages([
                'message' => ['category not found '],
            ]);
        }
    }
}
