<?php

namespace App;

use App\Builders\TemplateBuilder;

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Rental[]
     */
    private $rentals;

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
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    public function statement()
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
     * Needs
     * 
     * - name
     * - rental name & 
     */
    public function htmlStatement()
    {
        $templateBuilder = new TemplateBuilder();
        return $templateBuilder->renderTemplate('customerStatement', [
            'name' => $this->name,
            'rentals' => $this->rentals,
        ]);
    }
}
