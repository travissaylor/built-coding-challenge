<?php

namespace App;

use App\Strategies\IPricingStrategy;

class Classification
{
    protected string $name;

    protected IPricingStrategy $pricingStragegy;

    public function __construct($name, $pricingStragegy)
    {
        $this->name = $name;
        $this->pricingStragegy = $pricingStragegy;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->pricingStragegy->caclulatePrice();
    }
}