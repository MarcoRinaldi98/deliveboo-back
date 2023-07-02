<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class StatisticController extends Controller
{
    public function index()
    {
        $orders = Order::selectRaw('YEAR(date) as year, MONTH(date) as month, COUNT(*) as total, SUM(amount) as amount')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $chartData = [];
        foreach ($orders as $order) {
            $year = $order->year;
            $month = $order->month;
            $total = $order->total;
            $amount = $order->amount;
            $label = "$year-$month";

            if (!isset($chartData[$label])) {
                $chartData[$label] = [
                    'total' => 0,
                    'amount' => 0,
                ];
            }

            $chartData[$label]['total'] += $total;
            $chartData[$label]['amount'] += $amount;
        }

        return view('admin.statistics.index', compact('chartData'));
    }
}