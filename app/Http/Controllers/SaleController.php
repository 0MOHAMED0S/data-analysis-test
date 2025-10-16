<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();

        $totalSales = $sales->sum('sales');
        $totalProfit = $sales->sum('profit');
        $profitMargin = $totalSales > 0 ? round(($totalProfit / $totalSales) * 100, 2) : 0;

        return response()->json([
            'status' => true,
            'summary' => [
                'total_sales' => $totalSales,
                'total_profit' => $totalProfit,
                'profit_margin' => $profitMargin . '%',
            ],
            'data' => $sales,
            'secured_by' => 'None (Public)'
        ]);
    }

    public function test()
    {
        $sales = Sale::all();

        $totalSales = $sales->sum('sales');
        $totalProfit = $sales->sum('profit');
        $profitMargin = $totalSales > 0 ? round(($totalProfit / $totalSales) * 100, 2) : 0;

        return response()->json([
            'status' => true,
            'summary' => [
                'total_sales' => $totalSales,
                'total_profit' => $totalProfit,
                'profit_margin' => $profitMargin . '%',
            ],
            'data' => $sales,
            'secured_by' => 'Custom API Token'
        ]);
    }
}
