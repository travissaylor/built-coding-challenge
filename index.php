<?php

require __DIR__ . '/loader.php';

use App\Classification;
use App\Customer;
use App\Movie;
use App\Rental;
use App\Strategies\PricingStrategy\ChildrensPricingStrategy;
use App\Strategies\PricingStrategy\NewReleasePricingStrategy;
use App\Strategies\PricingStrategy\RegularPricingStrategy;
use App\Strategies\RewardPointsStrategy\StandardRewardPointsStrategy;

$rental1 = new Rental(
    new Movie(
        'Back to the Future',
        new Classification('Childrens', new ChildrensPricingStrategy())
    ),
    4,
    new StandardRewardPointsStrategy()
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        new Classification('Regular', new RegularPricingStrategy())
    ),
    3,
    new StandardRewardPointsStrategy()
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        new Classification('New Release', new NewReleasePricingStrategy())
    ),
    5,
    new StandardRewardPointsStrategy()
);

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->htmlStatement();
