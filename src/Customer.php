<?php

namespace App;

use App\Builders\TemplateBuilder;

class Customer
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var Rental[]
     */
    protected array $rentals;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->rentals = [];
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @param Rental $rental
     * @return void
     */
    public function addRental(Rental $rental): void
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return string
     */
    public function statement(): string
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;

        $result = 'Rental Record for ' . $this->name() . PHP_EOL;

        foreach ($this->rentals as $rental) {
            $thisAmount = $rental->movie()->classification()->getPrice($rental->daysRented());

            $totalAmount += $thisAmount;

            $frequentRenterPoints += $rental->getRewardPoints();

            $result .= "\t" . str_pad($rental->movie()->name(), 30, ' ', STR_PAD_RIGHT) . "\t" . $thisAmount . PHP_EOL;
        }

        $result .= 'Amount owed is ' . $totalAmount . PHP_EOL;
        $result .= 'You earned ' . $frequentRenterPoints . ' frequent renter points' . PHP_EOL;

        return $result;
    }

    /**
     * Return statement in HTML format
     *
     * @return string
     */
    public function htmlStatement(): string
    {
        $templateBuilder = new TemplateBuilder();
        return $templateBuilder->renderTemplate('customerStatement', [
            'name' => $this->name,
            'rentals' => $this->rentals,
        ]);
    }
}
