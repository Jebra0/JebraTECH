<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\UserBlock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BlockWrittinglistener
{

    public function __construct()
    {
        //
    }


    public function handle(object $event)
    {

         $writer = User::find($event->block->user_blocked_id);
         if(UserBlock::where('user_blocked_id', $event->block->user_blocked_id)->count() >= 10 ){
             $writer->is_writer = 0;
             $writer->save();

             // her u will notify the writer
         }


    }
}
