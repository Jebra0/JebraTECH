<?php

namespace App\GraphQL\Queries\Users;

use Illuminate\Support\Facades\DB;

final class SearchUser
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

        $blogs = DB::table('users')
            ->where('name', 'like', '%' . $data . '%')
            ->skip($offset)
            ->take($first);

        return $blogs;

    }
}
