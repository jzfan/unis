<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Unis\Order\WechatPay;

class WechatRefund extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wechat:refund {transactionId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'wechat pay refund by transaction id';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    protected $wechatPay;

    public function __construct(WechatPay $wechatPay)
    {
        parent::__construct();
        $this->wechatPay = $wechatPay;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $transactionId = $this->argument('transactionId');
        $this->wechatPay->refundByTransactionId($transactionId);
        $this->info('refund success!');
    }
}
