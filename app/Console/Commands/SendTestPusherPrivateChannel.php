<?php

namespace App\Console\Commands;

use App\Events\SimplePusherPrivateChannel;
use App\Models\Products\Warehouse;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SendTestPusherPrivateChannel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:products {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $warehousesProducts = Warehouse::first();
        $warehousesProducts->load('products');

        $user = User::first();

        if (Auth::check()) {
            SimplePusherPrivateChannel::dispatch($user, $warehousesProducts);
        }
    }
}
