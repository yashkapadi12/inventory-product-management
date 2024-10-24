<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Gaming Laptop',
                'sku' => 'GL-001',
                'quantity' => 15,
                'price' => 149999, 
                'description' => 'High-performance gaming laptop with advanced graphics.',
            ],
            [
                'name' => 'Wireless Mouse',
                'sku' => 'WM-002',
                'quantity' => 50,
                'price' => 2999, 
                'description' => 'Ergonomic wireless mouse with customizable buttons.',
            ],
            [
                'name' => 'Mechanical Keyboard',
                'sku' => 'MK-003',
                'quantity' => 30,
                'price' => 8999, 
                'description' => 'RGB mechanical keyboard with tactile switches.',
            ],
            [
                'name' => '27-inch Monitor',
                'sku' => 'MON-004',
                'quantity' => 20,
                'price' => 29999, 
                'description' => 'High-definition 27-inch monitor with HDR support.',
            ],
            [
                'name' => 'Gaming Headset',
                'sku' => 'GH-005',
                'quantity' => 25,
                'price' => 7999, 
                'description' => 'Surround sound gaming headset with noise cancellation.',
            ],
            [
                'name' => 'Graphics Card',
                'sku' => 'GC-006',
                'quantity' => 10,
                'price' => 49999, 
                'description' => 'High-end graphics card for immersive gaming.',
            ],
            [
                'name' => 'SSD 1TB',
                'sku' => 'SSD-007',
                'quantity' => 40,
                'price' => 11999, 
                'description' => '1TB SSD for faster data access and boot times.',
            ],
            [
                'name' => 'Motherboard',
                'sku' => 'MB-008',
                'quantity' => 12,
                'price' => 19999, 
                'description' => 'High-performance motherboard for gaming PCs.',
            ],
            [
                'name' => 'RAM 16GB',
                'sku' => 'RAM-009',
                'quantity' => 35,
                'price' => 8999, 
                'description' => '16GB DDR4 RAM for smooth multitasking.',
            ],
            [
                'name' => 'Power Supply Unit 600W',
                'sku' => 'PSU-010',
                'quantity' => 20,
                'price' => 6999, 
                'description' => '600W power supply for stable system performance.',
            ],
        ]);
    }
}
