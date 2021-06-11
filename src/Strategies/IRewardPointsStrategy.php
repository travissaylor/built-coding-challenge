<?php

namespace App\Strategies;

use App\Rental;

interface IRewardPointsStrategy
{
    public function caclulateRewardPoints(Rental $rental);
}