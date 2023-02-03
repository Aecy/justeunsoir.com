<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * Affiche tout les produits de la base de donnée pour faire les paiements.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::all();

        return view('shop', [
            'products' => $products
        ]);
    }
}
