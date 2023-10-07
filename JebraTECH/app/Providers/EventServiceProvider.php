<?php

namespace App\Providers;

use App\Events\BlockWriter;
use App\Events\AddComment;
use App\Listeners\AddCommentListener;
use App\Events\AddReply;
use App\Listeners\AddReplyListener;
use App\Events\ReportBlog;
use App\Listeners\BlockWrittinglistener;
use App\Listeners\ReportBlogListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BlockWriter::class => [
            BlockWrittinglistener::class,
        ],
        ReportBlog::class => [
            ReportBlogListener::class,
        ],
        AddComment::class=> [
            AddCommentListener::class,
        ],
        AddReply::class=> [
            AddReplyListener::class,
        ],

    ];


    public function boot(): void
    {
        //
    }


    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
