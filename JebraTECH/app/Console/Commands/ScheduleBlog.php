<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ScheduleBlog extends Command
{

    protected $signature = 'schedule:blog';

    protected $description = 'post the scheduled blogs. ';

    public function handle()
    {
        $expiredRecords = Blog::where('scheduling_date', '<=', Carbon::now())->where('is_hidden', 1)->get();

        foreach ($expiredRecords as $record) {
            Blog::where('id', $record->id)->update([
                'scheduling_date' => null,
                'is_hidden' => 0,
            ]);
        }


    }
}
