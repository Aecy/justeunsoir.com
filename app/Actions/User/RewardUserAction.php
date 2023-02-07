<?php

namespace App\Actions\User;

use App\Models\User;
use App\Services\Reward\RewardService;

final class RewardUserAction
{
    public function execute(User $user)
    {
        if (app(RewardService::class)->can($user)) {
            $reward = app(RewardService::class)->getReward();

            $user->last_reward = now();
            $user->save();
            $user->refresh();

            if ($reward > 0) {
                app(IncrementUserCreditAction::class)->execute(
                    user: $user,
                    credits: $reward
                );

                alert()->success("Vous avez reçu {$reward} crédits");
            }

            alert("Pas de chance...", "Vous n'avez pas reçu de crédits.", 'info');
        }

        return $user->refresh();
    }
}
