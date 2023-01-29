<?php

namespace App\Services\Reward;

class RewardService
{
    private const INTERVAL = 24;
    private const REWARDS = ['2', '0', '4', '0', '0', '6', '0', '0', '0', '8', '0', '0', '0', '0'];

    public function getReward(): int
    {
        return collect(self::REWARDS)->random();
    }

    public function can($user): bool
    {
        return now()->diffInHours($user->last_reward) >= self::INTERVAL;
    }
}
