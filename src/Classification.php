<?php

namespace App;

use App\Strategies\IPricingStrategy;
use App\Strategies\IRewardPointsStrategy;

class Classification
{
    protected string $name;

    protected IPricingStrategy $pricingStragegy;

    public function __construct(string $name, IPricingStrategy $pricingStragegy)
    {
        $this->name = $name;
        $this->pricingStragegy = $pricingStragegy;
    }

    public function name()
    {
        return $this->name;
    }

    public function getPrice(int $daysRented)
    {
        return $this->pricingStragegy->caclulatePrice($daysRented);
    }
}