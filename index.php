<?php

require __DIR__ . '/loader.php';

use App\Classification;
use App\Customer;
use App\Movie;
use App\Rental;
use App\Strategies\ChildrensPricingStrategy;
use App\Strategies\NewReleasePricingStrategy;
use App\Strategies\RegularPricingStrategy;

$rental1 = new Rental(
    new Movie(
        'Back to the Future',
        new Classification('Childrens', new ChildrensPricingStrategy())
    ), 4
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        new Classification('Commedy', new RegularPricingStrategy())
    ), 3
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        new Classification('Commedy', new NewReleasePricingStrategy())
    ), 5
);

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->newStatement();
