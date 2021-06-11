<?php

namespace App\Strategies\PricingStrategy;

class NewReleasePricingStrategy implements IPricingStrategy
{
    public function caclulatePrice(int $daysRented)
    {
        return $daysRented * 3;
    }
}