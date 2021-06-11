<?php

namespace App\Strategies;

class RegularPricingStrategy implements IPricingStrategy
{
    protected float $standardPrice = 2;

    public function caclulatePrice(int $daysRented)
    {
        $thisAmount = $this->standardPrice;

        if ($daysRented > 2) {
            $thisAmount += ($daysRented - 2) * 1.5;
        }

        return $thisAmount;
    }
}
