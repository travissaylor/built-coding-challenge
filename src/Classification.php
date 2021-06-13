<?php

namespace App;

use App\Strategies\PricingStrategy\IPricingStrategy;

class Classification
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var IPricingStrategy
     */
    protected IPricingStrategy $pricingStragegy;

    public function __construct(string $name, IPricingStrategy $pricingStragegy)
    {
        $this->name = $name;
        $this->pricingStragegy = $pricingStragegy;
    }

    /**
     * Get Name of Classification
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Get Price of Item
     *
     * @param integer $daysRented
     * @return float
     */
    public function getPrice(int $daysRented): float
    {
        return $this->pricingStragegy->caclulatePrice($daysRented);
    }
}
