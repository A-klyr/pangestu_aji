<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KasirController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Stats for current user today
        $totalTransactions = Sale::where('user_id', $user->id)
            ->whereDate('created_at', now()->today())
            ->count();

        $todayRevenue = Sale::where('user_id', $user->id)
            ->whereDate('created_at', now()->today())
            ->sum('total_price');

        // Products for simple list
        $products = Product::all();
        $totalProductsCount = Product::count();
        $lowStockProductsCount = Product::where('stock', '<', 10)->count();

        // Low stock items for the alert section (stok <= 5)
        $lowStockItems = Product::where('stock', '<=', 5)
            ->where('status', 'active')
            ->limit(3)
            ->get();

        return view('dashboard', compact(
            'totalTransactions',
            'todayRevenue',
            'products',
            'totalProductsCount',
            'lowStockProductsCount',
            'lowStockItems'
        ));
    }

    public function pos()
    {
        $products = Product::where('status', 'active')->get();
        return view('kasir.pos', compact('products'));
    }

    public function history()
    {
        $user = Auth::user();
        $sales = Sale::where('user_id', $user->id)
            ->with(['customer', 'saleItems.product'])
            ->latest()
            ->paginate(10);

        return view('kasir.history', compact('sales'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:cash,transfer',
            'cart' => 'required|array|min:1',
            'cart.*.id' => 'required|exists:products,id',
            'cart.*.qty' => 'required|integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            $totalPrice = 0;
            foreach ($request->cart as $item) {
                $totalPrice += $item['price'] * $item['qty'];
            }

            // Create Sale record
            $sale = Sale::create([
                'transaction_code' => 'TRX-' . strtoupper(Str::random(10)),
                'user_id' => Auth::id(),
                'total_price' => $totalPrice,
                'payment_method' => $request->payment_method,
                'status' => 'completed',
            ]);

            // Create Sale Items and Reduce Stock
            foreach ($request->cart as $item) {
                $product = Product::findOrFail($item['id']);

                if ($product->stock < $item['qty']) {
                    throw new \Exception("Stok untuk {$product->name} tidak mencukupi.");
                }

                $sale->saleItems()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['qty'],
                    'price' => $item['price'],
                    'subtotal' => $item['price'] * $item['qty'],
                ]);

                $product->decrement('stock', $item['qty']);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil!',
                'transaction_code' => $sale->transaction_code
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 422);
        }
    }
}


// // Route untuk user biasa
// Route::middleware(['auth'])->group(function () {
//     Route::get('/kasir/dashboard', [KasirController::class, 'dashboard'])->name('kasir.dashboard');
//     Route::get('/kasir/pos', [KasirController::class, 'pos'])->name('kasir.pos');
// });