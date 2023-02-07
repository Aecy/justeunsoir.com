<?php

namespace App\Http\Controllers\Reward;

use App\Actions\User\IncrementUserCreditAction;
use App\Http\Controllers\Controller;
use App\Services\Reward\RewardService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
                app(IncrementUserCreditAction::class)->execute($user, $reward);

                alert()->success("Vous avez reçu {$reward} crédits");

                return redirect()->back();
            }

            $user->save();

            alert()->info("Oh non", "Vous n'avez pas reçu de crédit ! Pas de chance...");

            return redirect()->back();
        }

        $time = $user->last_reward->addHours(24);
        return redirect()->back()->with('danger', "Revenez le {$time->format('d à H:i')} pour obtenir une nouvelle récompense.");
    }
}
