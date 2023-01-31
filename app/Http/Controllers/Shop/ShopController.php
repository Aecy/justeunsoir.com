<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\ShopPackService;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function __construct(
        private ShopPackService $packService
    ) { }

    public function index(): View
    {
        $packs = $this->packService->getPacks();
        return view('shop', [
            'packs' => $packs
        ]);
    }
}
