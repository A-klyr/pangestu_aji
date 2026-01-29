<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// Duplicates removed

class AnalyticsController extends Controller
{
    public function index()
    {
        // 1. Revenue Stats
        $todayRevenue = Sale::whereDate('created_at', now()->today())->sum('total_price');
        $monthRevenue = Sale::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');
        $totalTransactions = Sale::count();

        // 2. Best Sellers (Top 5 Products)
        $bestSellers = SaleItem::selectRaw('product_id, sum(quantity) as total_qty, sum(subtotal) as total_revenue')
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->take(5)
            ->with('product') // Eager load product info
            ->get();

        // 3. Recent Sales (Last 5)
        $recentSales = Sale::with(['user', 'customer'])
            ->latest()
            ->take(5)
            ->get();

        return view('analytics.index', compact(
            'todayRevenue',
            'monthRevenue',
            'totalTransactions',
            'bestSellers',
            'recentSales'
        ));
    }
}
