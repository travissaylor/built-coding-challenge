<?php

namespace App\Strategies\PricingStrategy;

interface IPricingStrategy
{
    public function caclulatePrice(int $daysRented);
}