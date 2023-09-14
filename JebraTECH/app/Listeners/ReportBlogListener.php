<?php

namespace App\Listeners;

use App\Mail\HideBlog;
use App\Models\Blog;
use App\Models\User;
use App\Models\UserReport;
use App\Notifications\HideBlogNotification;
use App\Notifications\WarningUserFromHideHisBlog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ReportBlogListener
{

    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        $blog = Blog::find($event->report->blog_id);
        $writer = User::find($blog->writter_id);
        $reports = UserReport::where('blog_id', $event->report->blog_id);

        if($reports->count() < 10){
            //notify the writer of that blog
            $writer->notify(new WarningUserFromHideHisBlog($blog, $reports->count()));

        }elseif ($reports->count() == 10){
            //notify the writer of that blog that his blog gonna be hidden
            $reports->forcedelete();

            $blog->is_hidden = 1;
            $blog->save();

            Mail::to($writer->email)->send(new HideBlog($writer->name, $blog->title));
            $writer->notify(new HideBlogNotification($writer->name, $blog));

        }
    }
}
