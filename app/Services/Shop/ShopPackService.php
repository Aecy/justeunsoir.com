<?php

namespace App\Services\Shop;

use Illuminate\Support\Collection;

final class ShopPackService
{
    public function getPacks(): Collection
    {
        return collect([
            [
                'name' => "Pack Mini",
                'price' => 10 * 100,
                'credit' => 15,
            ],
            [
                'name' => "Pack Essentiel",
                'price' => 30 * 100,
                'credit' => 50,
            ],
            [
                'name' => "Pack Standard",
                'price' => 55 * 100,
                'credit' => 100,
            ],
            [
                'name' => "Pack Professionnel",
                'price' => 100 * 100,
                'credit' => 200,
            ],
            [
                'name' => "Pack Entreprise",
                'price' => 120 * 100,
                'credit' => 250,
            ],
        ]);
    }
}
