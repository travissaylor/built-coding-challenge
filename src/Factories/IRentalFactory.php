<?php

namespace App\Factories;

use App\Movie;
use App\Rental;

interface IRentalFactory
{
    /**
     * Create a Rental
     *
     * @param Movie $movie
     * @param integer $daysRented
     * @return Rental
     */
    public function createRental(Movie $movie, int $daysRented): Rental;
}