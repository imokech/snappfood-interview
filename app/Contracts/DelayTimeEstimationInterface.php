<?php

namespace App\Contracts;

use App\Models\Order;

interface DelayTimeEstimationInterface
{
    public function estimate(Order $order): int|null;
}
