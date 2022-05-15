<?php

namespace App\Console\Commands;

use App\Mail\PostSubscriptions;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:email-send {email_address} {post_title} {post_description}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send subscription emails to subscribers of a particular website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $details = [
            "title" => $this->argument('post_title'),
            "description" => $this->argument('post_description')
        ];
        
        Mail::to($this->argument('email_address'))
            ->send(new PostSubscriptions($details));
    }
}
