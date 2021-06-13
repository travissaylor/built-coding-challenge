<?php

namespace App\Strategies\PricingStrategy;

class RegularPricingStrategy implements IPricingStrategy
{
    /**
     * @var float
     */
    protected float $standardPrice = 2;

    public function caclulatePrice(int $daysRented): float
    {
        $thisAmount = $this->standardPrice;

        if ($daysRented > 2) {
            $thisAmount += ($daysRented - 2) * 1.5;
        }

        return $thisAmount;
    }
}
