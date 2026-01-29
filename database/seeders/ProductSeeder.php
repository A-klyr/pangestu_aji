<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Earbuds',
                'sku' => 'WE-001',
                'description' => 'Premium wireless earbuds with noise cancellation',
                'price' => 850000,
                'stock' => 50,
                'category' => 'Electronics',
                'status' => 'active',
            ],
            [
                'name' => 'Smart Watch',
                'sku' => 'SW-001',
                'description' => 'Fitness tracking smartwatch with heart rate monitor',
                'price' => 1200000,
                'stock' => 30,
                'category' => 'Electronics',
                'status' => 'active',
            ],
            [
                'name' => 'USB-C Cable',
                'sku' => 'UC-001',
                'description' => 'Fast charging USB-C cable 2 meters',
                'price' => 45000,
                'stock' => 100,
                'category' => 'Accessories',
                'status' => 'active',
            ],
            [
                'name' => 'Phone Case',
                'sku' => 'PC-001',
                'description' => 'Durable silicone phone case',
                'price' => 120000,
                'stock' => 75,
                'category' => 'Accessories',
                'status' => 'active',
            ],
            [
                'name' => 'Power Bank',
                'sku' => 'PB-001',
                'description' => '20000mAh power bank with fast charging',
                'price' => 350000,
                'stock' => 8,
                'category' => 'Electronics',
                'status' => 'active',
            ],
            [
                'name' => 'Wireless Mouse',
                'sku' => 'WM-001',
                'description' => 'Ergonomic wireless mouse',
                'price' => 150000,
                'stock' => 45,
                'category' => 'Computer',
                'status' => 'active',
            ],
            [
                'name' => 'Mechanical Keyboard',
                'sku' => 'MK-001',
                'description' => 'RGB mechanical gaming keyboard',
                'price' => 850000,
                'stock' => 5,
                'category' => 'Computer',
                'status' => 'active',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}