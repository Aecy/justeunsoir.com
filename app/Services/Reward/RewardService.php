<?php

namespace App\Services\Reward;

class RewardService
{
    private const REWARDS = ['2', '0', '4', '0', '0', '6', '0', '0', '0', '8', '0', '0', '0', '0'];

    public function getReward(): int
    {
        return collect(self::REWARDS)->random();
    }
}
