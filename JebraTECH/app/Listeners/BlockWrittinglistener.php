<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\UserBlock;
use Carbon\Carbon;
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
         $blocks = UserBlock::where('user_blocked_id', $event->block->user_blocked_id);

         if($blocks->count() == 10 ){
             $blocks->delete();

             $writer->is_writer = 0;
             $writer->block_expiration_date = Carbon::now()->addMonth();
             $writer->save();

             // her u will notify the writer by email and db

         }elseif($blocks->count() < 10 ){

             // her u will notify the writer by database
             // someone blocked u now u have 4 blocks remains 6 to block from writing for month

         }



    }
}
