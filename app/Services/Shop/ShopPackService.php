<?php

namespace App\Services\Shop;

use Illuminate\Support\Collection;

final class ShopPackService
{
    public function getPacks(): Collection
    {
        return collect([
            [
                'name' => "Pack Essentiel",
                'price' => 2000,
                'credit' => 50,
            ],
            [
                'name' => "Pack Standard",
                'price' => 3500,
                'credit' => 100,
            ],
            [
                'name' => "Pack Professionnel",
                'price' => 6000,
                'credit' => 200,
            ],
            [
                'name' => "Pack Entreprise",
                'price' => 14000,
                'credit' => 500,
            ],
            [
                'name' => "Pack Maxi",
                'price' => 25000,
                'credit' => 1000,
            ],
        ]);
    }
}
