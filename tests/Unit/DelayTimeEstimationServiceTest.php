<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Services\DelayTimeEstimatorService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DelayTimeEstimationServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $estimationService;

    public function setUp(): void
    {
        parent::setUp();

        $this->estimationService = app()->make(DelayTimeEstimationService::class);
    }

    /** @test */
    public function testDelayEstimation_works()
    {
        $order = Order::factory()->create();

        $result = $this->estimationService->estimate($order);

        $this->assertIsNumeric($result);
    }
}
