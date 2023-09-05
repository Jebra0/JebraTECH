<?php

namespace App\GraphQL\Queries\UserReports;

use App\Models\UserReport;

final class GetNumOfReports
{

    public function __invoke($_, array $args)
    {
        $blog = UserReport::where('blog_id', $args['blog']);

        if($blog){
            return $blog->count();
        }
    }
}
