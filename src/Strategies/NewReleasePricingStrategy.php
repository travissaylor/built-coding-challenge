<?php

namespace App\Strategies;

class NewReleasePricingStrategy implements IPricingStrategy
{
    public function caclulatePrice(int $daysRented)
    {
        return $daysRented * 3;
    }
}