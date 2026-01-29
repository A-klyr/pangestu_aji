<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Stats Grid
        $todayRevenue = Sale::whereDate('created_at', now()->today())->sum('total_price');
        $todayTransactions = Sale::whereDate('created_at', now()->today())->count();
        $totalProducts = Product::count();
        $totalCustomers = Customer::count();
        $lowStockCount = Product::lowStock(10)->count();

        // 2. Notifications (Low Stock Items)
        $lowStockItems = Product::lowStock(10)->take(5)->get();

        // 3. Recent Transactions
        $recentTransactions = Sale::with(['customer', 'saleItems.product'])
            ->latest()
            ->take(5)
            ->get();

        // 4. Top Products
        $topProducts = SaleItem::selectRaw('product_id, sum(quantity) as total_qty, sum(subtotal) as total_revenue')
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->take(4)
            ->with('product')
            ->get();

        return view('admin.dashboard', compact(
            'todayRevenue',
            'todayTransactions',
            'totalProducts',
            'totalCustomers',
            'lowStockCount',
            'lowStockItems',
            'recentTransactions',
            'topProducts'
        ));
    }
}
