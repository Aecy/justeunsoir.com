<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\User\UserActivityService;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(
        private UserActivityService $activityService
    ) { }

    /**
     * Page d'arrivée sur le site.
     *
     * @return View
     */
    public function welcome(): View
    {
        $users = User::orderByDesc('created_at')->get();
        $onlineUsers = $this->activityService->getOnlineUsers();
        $onlineMens = $this->activityService->getOnlineByGender('H');
        $onlineWomans = $this->activityService->getOnlineByGender('F');

        return view('welcome', [
            'users' => $users,
            'onlineUsers' => $onlineUsers,
            'onlineMens' => $onlineMens,
            'onlineWomans' => $onlineWomans
        ]);
    }
}
