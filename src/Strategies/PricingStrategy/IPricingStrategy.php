<?php

namespace App\Strategies\PricingStrategy;

interface IPricingStrategy
{
    /**
     * Calculates the price of the given item
     *
     * @param integer $daysRented
     * @return float
     */
    public function caclulatePrice(int $daysRented): float;
}