<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index', [
            'data' => [
                'ndd' => 100,
                'host' => 100,
                'total_revenu' => rand(20000, 80000),
            ],
            'products' => Product::all(),
            'user' => $this->getUser()
        ]);
    }
}
