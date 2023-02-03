<?php

namespace App\Http\Controllers\Reward;

use App\Http\Controllers\Controller;
use App\Services\Reward\RewardService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RewardController extends Controller
{
    /**
     * Instancie les méthodes de la classe RewardService
     *
     * @param RewardService $rewardService
     */
    public function __construct(
        private RewardService $rewardService
    ) { }

    public function index(): View
    {
        $user = $this->getUser();
        $can = $this->rewardService->can($user);

        return view('rewards.index', [
            'user' => $user,
            'can' => $can
        ]);
    }

    /**
     * Obtenir la récompense quotidienne pour un utilisateur.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $user = $request->user();
        if ($this->rewardService->can($user) || is_null($user->last_reward)) {
            $reward = $this->rewardService->getReward();
            $user->last_reward = now();

            if ($reward > 0) {
                $user->credits += $reward;
                $user->save();

                return Redirect::back()->with('success', "Vous avez reçu {$reward} crédits.");
            }

            $user->save();

            return Redirect::back()->with('success', "Vous n'avez pas reçu de crédits malheureusement.");
        }

        $time = $user->last_reward->addHours(24);
        return Redirect::back()->with('danger', "Revenez le {$time->format('d à H:i')} pour obtenir une nouvelle récompense.");
    }
}
