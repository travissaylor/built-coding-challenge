<?php
    $totalAmount = 0;
    $frequentRenterPoints = 0;
?>

<h1>Rental Record for <em><?= $name ?></em></h1>
<ul>
    <?php foreach($rentals as $rental) : ?>
        <?php
            $thisAmount = $rental->movie()->classification()->getPrice($rental->daysRented());

            $totalAmount += $thisAmount;

            $frequentRenterPoints += $rental->getRewardPoints();
        ?>
        <li><?= $rental->movie()->name() ?> - <?= $thisAmount ?></li>
    <?php endforeach; ?>
</ul>
<p>Amount owed is <em><?= $totalAmount ?></em>
<p>You earned <em><?= $frequentRenterPoints ?></em> frequent renter points</p>