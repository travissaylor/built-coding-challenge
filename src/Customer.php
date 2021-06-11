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

    protected $totalOwedAmount;

    protected $frequentRenterPoints;

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

    /**
     * @return string
     */
    public function statement()
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;

        $result = 'Rental Record for ' . $this->name() . PHP_EOL;

        foreach ($this->rentals as $rental) {
            $thisAmount = 0;

            switch($rental->movie()->priceCode()) {
                case Movie::REGULAR:
                    $thisAmount += 2;
                    if ($rental->daysRented() > 2) {
                        $thisAmount += ($rental->daysRented() - 2) * 1.5;
                    }
                    break;
                case Movie::NEW_RELEASE:
                    $thisAmount += $rental->daysRented() * 3;
                    break;
                case Movie::CHILDRENS:
                    $thisAmount += 1.5;
                    if ($rental->daysRented() > 3) {
                        $thisAmount += ($rental->daysRented() - 3) * 1.5;
                    }
                    break;
            }

            $totalAmount += $thisAmount;

            $frequentRenterPoints++;
            if ($rental->movie()->priceCode() === Movie::NEW_RELEASE && $rental->daysRented() > 1) {
                $frequentRenterPoints++;
            }

            $result .= "\t" . str_pad($rental->movie()->name(), 30, ' ', STR_PAD_RIGHT) . "\t" . $thisAmount . PHP_EOL;
        }

        $result .= 'Amount owed is ' . $totalAmount . PHP_EOL;
        $result .= 'You earned ' . $frequentRenterPoints . ' frequent renter points' . PHP_EOL;

        return $result;
    }

    public function newStatement()
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;

        $result = 'Rental Record for ' . $this->name() . PHP_EOL;

        foreach ($this->rentals as $rental) {
            $thisAmount = $rental->movie()->classification()->getPrice($rental->daysRented());

            $totalAmount += $thisAmount;

            $frequentRenterPoints++;
            // if ($rental->movie()->priceCode() === Movie::NEW_RELEASE && $rental->daysRented() > 1) {
            //     $frequentRenterPoints++;
            // }

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
        $templateBuilder->renderTemplate('customerStatement', [
            'name' => $this->name,
            'rentals' => $this->rentals,
        ]);
    }
}
