<?php

namespace App\GraphQL\Queries;

use App\Models\Comment;

final class TimeOfComments
{
    public function __invoke($_, array $args)
    {
        $date1 = $args['date1'];
        $date2 = $args['date2'];

        return Comment::orderBy('id', 'desc')
               ->whereBetween('created_at', [$date1, $date2])
               ->get();
    }
}
