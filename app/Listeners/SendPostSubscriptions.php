<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\ProcessSubscriptions;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendPostSubscriptions
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        Log::debug($event->post);
        dispatch(new ProcessSubscriptions($event->subscribers, $event->post));
    }
}
