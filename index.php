<?php

require __DIR__ . '/loader.php';

use App\Classification;
use App\Customer;
use App\Factories\ConfigRentalFactory;
use App\Movie;
use App\Strategies\PricingStrategy\ChildrensPricingStrategy;
use App\Strategies\PricingStrategy\NewReleasePricingStrategy;
use App\Strategies\PricingStrategy\RegularPricingStrategy;

$rentalFactory = new ConfigRentalFactory();

$rental1 = $rentalFactory->createRental(new Movie(
    'Back to the Future',
    new Classification('childrens', new ChildrensPricingStrategy())
), 4);

$rental2 = $rentalFactory->createRental(new Movie(
    'Office Space',
    new Classification('regular', new RegularPricingStrategy())
), 3);

$rental3 = $rentalFactory->createRental(new Movie(
    'The Big Lebowski',
    new Classification('new_release', new NewReleasePricingStrategy())
), 5);

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->htmlStatement();
