<?php

namespace App\Strategies\RewardPointsStrategy;

use App\Rental;

interface IRewardPointsStrategy
{
    public function caclulateRewardPoints(Rental $rental);
}