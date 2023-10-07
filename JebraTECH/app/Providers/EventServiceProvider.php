<?php

namespace App\Providers;

use App\Events\LikeEvent;
use App\Events\ShareEvent;
use App\Events\FollowEvent;
use App\Events\BlockWriter;
use App\Events\AddComment;
use App\Events\AddReply;
use App\Events\ReportBlog;

use App\Listeners\LikeListener;
use App\Listeners\ShareListener;
use App\Listeners\FollowListener;
use App\Listeners\AddReplyListener;
use App\Listeners\AddCommentListener;
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
        LikeEvent::class=> [
            LikeListener::class,
        ],
        ShareEvent::class=> [
            ShareListener::class,
        ],
        FollowEvent::class=> [
            FollowListener::class,
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
