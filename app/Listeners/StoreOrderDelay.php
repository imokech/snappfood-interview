<?php

namespace App\Listeners;

use App\Events\OrderDelayed;
use App\Models\DelayReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreOrderDelay
{
    public function __construct()
    {}

    public function handle(OrderDelayed $event): void
    {
        DelayReport::create([
            'vendor_id' => $event->order->vendor->id,
            'order_id' => $event->order->id,
            'date_at' => now()->format('Y-m-d')
        ]);
    }
}
