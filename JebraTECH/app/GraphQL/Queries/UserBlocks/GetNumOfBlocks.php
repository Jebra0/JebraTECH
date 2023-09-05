<?php

namespace App\GraphQL\Queries\UserBlocks;

use App\Models\UserBlock;

final class GetNumOfBlocks
{

    public function __invoke($_, array $args)
    {
        $writer = UserBlock::where('user_blocked_id', $args['writer']);

        if($writer){
            return $writer->count();
        }
    }
}
