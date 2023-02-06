<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $product) {
            Product::create([
                'name' => $product['name'],
                'price' => $product['price'],
                'credits' => $product['credits']
            ]);
        }
    }

    private function data(): array
    {
        return [
            [
                'name' => "Pack Mini",
                'price' => 15 * 100,
                'credits' => 10,
            ],
            [
                'name' => "Pack Eco",
                'price' => 30 * 100,
                'credits' => 50,
            ],
            [
                'name' => "Pack Standard",
                'price' => 55 * 100,
                'credits' => 100,
            ],
            [
                'name' => "Pack Power",
                'price' => 100 * 100,
                'credits' => 200,
            ],
            [
                'name' => "Pack Premium",
                'price' => 120 * 100,
                'credits' => 250,
            ],
        ];
    }
}
