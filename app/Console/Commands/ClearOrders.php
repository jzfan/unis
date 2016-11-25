<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Unis\Order\Order;

class ClearOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unis:clear_order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear the expired orders.';

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
     * @return mixed
     */
    public function handle()
    {
        Order::clearNotPay();
        $this->info('The expired orders has been deleted.' . PHP_EOL);
    }
}
