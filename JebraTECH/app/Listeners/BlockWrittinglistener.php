<?php

namespace App\Listeners;

use App\Mail\BlockedUser;
use App\Models\User;
use App\Models\UserBlock;
use App\Notifications\BlockUserViaDatabase;
use App\Notifications\WarningUserFromBlock;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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

             Mail::to($writer->email)->send(new BlockedUser($writer));
             $writer->notify(new BlockUserViaDatabase($writer));

         }elseif($blocks->count() < 10 ){

             $writer->notify(new WarningUserFromBlock($writer, $blocks->count()));

         }



    }
}
