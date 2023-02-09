<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::orderByDesc('created_at')
            ->where('name', "LIKE", "%{$request->get('name')}%")
            ->paginate(8);

        $users->appends($request->only('name'));

        return view('admin.users.index', [
            'users' => $users,
            'user' => $this->getUser()
        ]);
    }

    public function buy(): View
    {
        $orders = Order::with(['user', 'product'])
            ->orderByDesc('created_at')
            ->paginate(8);

        return view('admin.users.order', [
            'user' => $this->getUser(),
            'orders' => $orders
        ]);
    }
}
