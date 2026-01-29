<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Customer;
use App\Models\User;
use App\Models\Product;

class DummySaleSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin Test',
                'email' => 'admintest@example.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]);
        }

        $customer = Customer::firstOrCreate([
            'email' => 'budi@example.com'
        ], [
            'name' => 'Budi Santoso',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 1',
        ]);

        // Ensure products exist or create dummy
        $product = Product::first();
        if (!$product) {
            // If Product model has required fields, this might fail if not all provided. 
            // Assuming minimal product creation if empty.
            // But usually Products exist from previous steps/seeders. If not, just warn.
        }

        // Create Sale
        $sale = Sale::create([
            'transaction_code' => 'TRX-' . time(),
            'customer_id' => $customer->id,
            'user_id' => $user->id,
            'total_price' => 250000,
            'payment_method' => 'cash',
        ]);

        // Create Items
        SaleItem::create([
            'sale_id' => $sale->id,
            'product_id' => $product ? $product->id : null,
            'quantity' => 2,
            'price' => 100000,
            'subtotal' => 200000,
        ]);

        SaleItem::create([
            'sale_id' => $sale->id,
            'product_id' => null, // Deleted product scenario
            'quantity' => 1,
            'price' => 50000,
            'subtotal' => 50000,
        ]);
    }
}
