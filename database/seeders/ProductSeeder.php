<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate();

        DB::table('products')->insert([
            [
                'name' => 'Arroz Largo Fino',
                'sku' => '204940',
                'description' => 'Arroz Largo Fino',
                'price' => "250",
                'quantity' => 100,
                'active' => 1,
                'provider_id' => 1,
                'brand_id'=> 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Yogurt Griego Natural',
                'sku' => '224940',
                'description' => 'Yogurt Griego Natural',
                'price' => "300",
                'quantity' => 40,
                'active' => 1,
                'provider_id' => 3,
                'brand_id'=> 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Atún en Lata Natural',
                'sku' => '244940',
                'description' => 'Atún en Lata Natural',
                'price' => "400",
                'quantity' => 25,
                'active' => 1,
                'provider_id' => 2,
                'brand_id'=> 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
