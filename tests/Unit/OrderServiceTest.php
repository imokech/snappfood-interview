<?php

namespace Tests\Unit;

use App\Enum\OrderStatus;
use App\Models\Agent;
use App\Models\Order;
use App\Models\Trip;
use App\Services\OrderService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $orderService;

    public function setUp(): void
    {
        parent::setUp();

        $this->orderService = app()->make(OrderService::class);
    }

    /** @test */
    public function testUpdatingAnOrder_canUpdateAnOrderStatus_ExpectedDifferentStatus()
    {
        $order = Order::factory()->create();

        $agent = Agent::factory()->create();

        $this->orderService->updateOrderStatus($order, OrderStatus::ASSIGNED_AGENT, $agent->id);

        $freshOrder = $order->fresh();

        $this->assertEquals(OrderStatus::ASSIGNED_AGENT->value, $freshOrder->status);

        $this->assertEquals($agent->id, $freshOrder->agent_id);
    }

    /** @test */
    public function testFindingAnOrder_canFindAnOrder_ExpectedEqualOrderID()
    {
        $oldOrder = Order::factory()->create();

        $order = $this->orderService->findOrder($oldOrder->id);

        $this->assertEquals($oldOrder->id, $order->id);
    }

    /** @test */
    public function testTripExistence_doesTripConditionExist_ExpectedFalse()
    {
        $order = Order::factory()->create();

        $result = $this->orderService->isNeedNewDelayTime($order);

        $this->assertEquals(false, $result);
    }

    /** @test */
    public function testTripExistence_TripCondition_ExpectedTrue()
    {
        $order = Order::factory()->create();

        Trip::factory()->create(['order_id' => $order->id]);

        $result = $this->orderService->isNeedNewDelayTime($order);

        $this->assertEquals(true, $result);
    }
}
