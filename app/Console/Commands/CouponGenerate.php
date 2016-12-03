<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Unis\Business\Coupon;

class CouponGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coupon:generate {num}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create some coupons';

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
        $num = $this->argument('num');
        Coupon::generate($num);
        $this->info('Generate '.$num.' coupons success!');
    }
}
