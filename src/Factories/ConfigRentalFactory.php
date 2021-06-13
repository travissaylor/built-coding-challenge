<?php

namespace App\Factories;

use App\Movie;
use App\Rental;
use App\Utility\ConfigLoader;

class ConfigRentalFactory implements IRentalFactory
{
    /**
     * Creates a Rental and gets the reward points strategy for the Rental from the config
     *
     * @param Movie $movie
     * @param integer $daysRented
     * @return Rental
     */
    public function createRental(Movie $movie, int $daysRented): Rental
    {
        $RewardPointsStrategyClass = ConfigLoader::config('currentRewardPointStragey');
        return new Rental($movie, $daysRented, new $RewardPointsStrategyClass);
    }
}
