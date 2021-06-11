<?php

namespace App\Strategies\RewardPointsStrategy;

use App\Rental;

class StandardRewardPointsStrategy implements IRewardPointsStrategy
{
    public function caclulateRewardPoints(Rental $rental)
    {
        if ($rental->movie()->classification()->name() === "New Release" && $rental->daysRented() > 1) {
            return 2;
        }

        return 1;
    }
}