<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendTestPush extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:name {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send push message';

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
        // Вызов события, пока просто выбирая первого пользователя
        $user = \App\Models\User::first();

        event(new \App\Events\SimplePusherPublicChannel($user));
    }
}
