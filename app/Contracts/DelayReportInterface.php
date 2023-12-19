<?php

namespace App\Contracts;

use App\Models\Order;

interface DelayReportInterface
{
    const REDIS_DELAY_KEY = 'delay_report_list';

    public function create(Order $order): string;
    public function createOrderDeliveryTime(Order $order): string;
    public function addDelayReportToQueue(Order $order): void;
    public function assignDelayToAgent(int $agentID): mixed;
    public function findDelays(string $startDate, string $endDate): mixed;
}
