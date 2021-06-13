<?php

namespace App\Strategies\RewardPointsStrategy;

use App\Rental;

interface IRewardPointsStrategy
{
    /**
     * Calculates the reward points generated from a specific rental
     *
     * @param Rental $rental
     * @return integer
     */
    public function caclulateRewardPoints(Rental $rental): int;
}