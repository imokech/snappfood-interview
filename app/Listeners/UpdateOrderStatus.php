<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;
use App\Services\OrderService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateOrderStatus
{
    /**
     * Create the event listener.
     */
    public function __construct(protected OrderService $orderService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderStatusChanged $event): void
    {
        $this->orderService->updateOrderStatus($event->order, $event->status, $event->agent);
    }
}
