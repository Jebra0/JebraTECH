<?php

namespace App\GraphQL\Queries\Blogs;

use Illuminate\Support\Facades\DB;

final class SearchBlog
{

    public function __invoke($_, array $args)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'data' => ['required', 'string', 'max:500']
        ]);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        $data = $args['data'];
        $first = $args['first'];
        $page = $args['page'];

        $offset = ($page - 1) * $first;

        $blogs = DB::table('blogs')
            ->where('title', 'like', '%' . $data . '%')
            ->orwhere('body', 'like', '%' . $data . '%')
            ->orwhere('description', 'like', '%' . $data . '%')
            ->skip($offset)
            ->take($first);

        return $blogs;
        //return Blog::where('title', 'like', '%' . $data . '%')->get();

    }
}
