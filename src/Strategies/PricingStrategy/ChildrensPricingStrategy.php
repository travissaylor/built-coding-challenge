<?php

namespace App\Strategies\PricingStrategy;

class ChildrensPricingStrategy implements IPricingStrategy
{
    protected float $standardPrice = 1.5;

    public function caclulatePrice(int $daysRented)
    {
        $thisAmount = $this->standardPrice;

        if ($daysRented > 3) {
            $thisAmount += ($daysRented - 3) * 1.5;
        }

        return $thisAmount;
    }
}
