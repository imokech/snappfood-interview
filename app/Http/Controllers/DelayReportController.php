<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignDelayReportRequest;
use App\Models\Order;
use App\Services\DelayReportService;
use Illuminate\Http\Request;

class DelayReportController extends BaseController
{
    public function __construct(protected Request $request, protected DelayReportService $delayReportService)
    {
        parent::__construct($request);
    }

    public function store(Order $order)
    {
        $response = $this->delayReportService->create($order);

        return $this->successResponse($response);
    }

    public function assign(AssignDelayReportRequest $request)
    {
        $response = $this->delayReportService->assignDelayToAgent($request->agent);

        return $this->successResponse($response);
    }

    public function getCurrentWeekDelayReports()
    {
        $startDate = Carbon::now()->subDays(7)->format('Y-m-d');
        $endDate = now()->format('Y-m-d');

        $response = $this->delayReportService->findDelays($startDate, $endDate);

        return $this->successResponse($response);
    }
}
