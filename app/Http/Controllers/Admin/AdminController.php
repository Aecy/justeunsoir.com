<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\User\UserActivityService;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct(
        private UserActivityService $activityService
    ) { }

    public function index(): View
    {
        $products = Product::all();
        $users = User::all();
        $onlineUsers = $this->activityService->getOnlineUsers();
        $orders = Order::with('product')->orderByDesc('created_at')->get();

        $costs = $orders->sum('price') / 100;

        return view('admin.index', [
            'products' => $products,
            'orders' => $orders,
            'users' => $users,
            'onlineUsers' => $onlineUsers,
            'user' => $this->getUser(),
            'data' => [
                'cost_ndd' => 100,
                'available_ndd' => $costs - 100,
                'cost_host' => 100,
                'available_host' => $costs - 100,
                'total_revenu' => ($orders->sum('price') / 100),
            ]
        ]);
    }
}
