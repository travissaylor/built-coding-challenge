<?php

namespace App\Strategies\PricingStrategy;

class NewReleasePricingStrategy implements IPricingStrategy
{
    public function caclulatePrice(int $daysRented): float
    {
        return $daysRented * 3;
    }
}