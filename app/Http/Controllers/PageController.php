<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\User\UserActivityService;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Instancie le service permettant de jouer avec l'activité d'un utilisateur.
     *
     * @param UserActivityService $activityService
     */
    public function __construct(
        private UserActivityService $activityService
    ) { }

    /**
     * Page principale du site.
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

    /**
     * Affiche la page FAQ.
     *
     * @return View
     */
    public function faq(): View
    {
        return view('faq');
    }
}
