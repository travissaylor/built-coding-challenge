<?php

require __DIR__ . '/vendor/autoload.php';

use App\Customer;
use App\Movie;
use App\Rental;

$rental1 = new Rental(
    new Movie(
        'Back to the Future',
        Movie::CHILDRENS
    ), 4
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        Movie::REGULAR
    ), 3
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        Movie::NEW_RELEASE
    ), 5
);

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->statement();
