<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Order\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\User\UserActivityService;
use Carbon\Carbon;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct(
        private UserActivityService $activityService
    ) { }

    public function index(): View
    {
        $products = Product::orderByDesc('price')->get();
        $orders = Order::with(['product', 'user'])->orderByDesc('created_at');
        $allOrders = $orders->get();
        $todayOrders = $orders->whereDate('created_at', Carbon::today())->get();
        $orders = $orders->where('status', OrderStatusEnum::VALIDATED)->get();

        $costs = $orders->sum('price') / 100;

        return view('admin.index', [
            'products' => $products,
            'orders' => $orders,
            'allOrders' => $allOrders,
            'todayOrders' => $todayOrders,
            'users' => User::all(),
            'onlineUsers' => $this->activityService->getOnlineUsers(),
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
