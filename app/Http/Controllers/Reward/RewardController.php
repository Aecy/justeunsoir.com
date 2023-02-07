<?php

namespace App\Http\Controllers\Reward;

use App\Actions\User\RewardUserAction;
use App\Http\Controllers\Controller;
use App\Services\Reward\RewardService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RewardController extends Controller
{
    /**
     * Affiche la page pour obtenir une récompense.
     *
     * @return View
     */
    public function index(): View
    {
        $can = app(abstract: RewardService::class)->can(
            user: $this->getUser()
        );

        return view('rewards.index', [
            'user' => $this->getUser(),
            'can' => $can
        ]);
    }

    /**
     * Récupère une récompense quotidienne.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        app(abstract: RewardUserAction::class)->execute(
            user: $request->user()
        );

        return redirect()->back();
    }
}
