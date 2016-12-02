<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Unis\Order\WechatPay;
class WechatRefundByParms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wechat:refundByParms {billing_id} {order_no} {total}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'wechatpay refund by parameters: billing id, order number, total fee.';

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
        $args = $this->arguments();
        $result = $this->wechatPay->refundByParms($args['billing_id'], $args['order_no'], $args['total']);
        if ($result === true){
            $this->info('refund success!');
        }
        $this->info($result);
    }
}
