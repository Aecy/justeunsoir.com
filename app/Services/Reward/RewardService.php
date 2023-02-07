<?php

namespace App\Services\Reward;

class RewardService
{
    private const HOURS_INTERVAL = 24;
    private const REWARDS = [2, 0, 4, 0, 6, 0, 0, 8, 0, 0, 0];

    /**
     * Récupère une récompense dans la liste ci-dessus.
     *
     * @return int
     */
    public function getReward(): int
    {
        return collect(self::REWARDS)->random();
    }

    /**
     * Vérifie si l'utilisateur peut obtenir une récompense ou non.
     *
     * @param $user
     * @return bool
     */
    public function can($user): bool
    {
        return is_null($user->last_reward) || now()->diffInHours($user->last_reward) >= self::HOURS_INTERVAL;
    }
}
