<?php

namespace App\Services\Reward;

class RewardService
{
    private const REWARDS = ['2', '0', '5', '0', '10', '0', '0', '0', '8'];

    public function getReward(): int
    {
        return collect(self::REWARDS)->random();
    }
}
