<?php

namespace App\GraphQL\Queries;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;

final class LatestComments
{
    public function __invoke($_, array $args)
    {
        $count = $args['count'];

        return   Comment::orderBy('id', 'desc')
            ->limit($count)
            ->get();

    }
}
