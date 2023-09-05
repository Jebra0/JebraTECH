<?php

namespace App\GraphQL\Mutations\Users;

use App\GraphQL\Queries\UserBlocks\GetNumOfBlocks;
use App\Models\User;
use App\Models\UserBlock;

final class BeUser
{

    public function __invoke($_, array $args)
    {

        $writer = User::find($args['writer']);

        if($writer->is_writer == 1){

            $blocks = new GetNumOfBlocks();

            if($blocks->__invoke($_,$args) >= 10){
                $writer->is_writer = 0;
                $writer->save();
                return "Done Turned To Ordinary User! ";
            }else{
                return "this writer is blocked ". $blocks->__invoke($_,$args) . " times only! ";
            }

        }else{
            return "this is not a writer";
        }
    }
}
