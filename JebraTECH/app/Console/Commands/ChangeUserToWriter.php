<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChangeUserToWriter extends Command
{

    protected $signature = 'Chang:to-writer';

    protected $description = 'Revert the user who was punished to his position as writer . ';

    public function handle()
    {

        $expiredRecords = User::where('block_expiration_date', '<=', Carbon::now())->where('is_writer', 0)->get();

        foreach ($expiredRecords as $record) {
            User::where('id', $record->id)->update([
                'is_writer' => 1,
                'block_expiration_date' => null,
            ]);
        }

    }
}
