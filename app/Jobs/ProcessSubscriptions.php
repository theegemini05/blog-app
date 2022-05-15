<?php

namespace App\Jobs;

use App\Http\Resources\UserResource;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class ProcessSubscriptions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subscribers;
    protected $post;

    /**
     * Process Subscriptions Job constructor.
     * @param $website
     * @param $post
     * @return void
     */
    public function __construct($subscribers, $post)
    {
        $this->subscribers = $subscribers;
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->subscribers as $subscriber){
            Artisan::queue(
                'blog:email-send', 
                [
                    "email_address" => $subscriber->email,
                    "post_title" => $this->post->title,
                    "post_description" => $this->post->description
                ]
            );
        }
    }
}
