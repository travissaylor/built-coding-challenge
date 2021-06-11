<?php

namespace App;

use App\Strategies\IRewardPointsStrategy;

class Rental
{
    /**
     * @var Movie
     */
    private $movie;

    /**
     * @var int
     */
    private $daysRented;

    protected IRewardPointsStrategy $rewardPointsStrategy;

    /**
     * @param Movie $movie
     * @param int $daysRented
     */
    public function __construct(Movie $movie, int $daysRented, IRewardPointsStrategy $rewardPointsStrategy)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
        $this->rewardPointsStrategy = $rewardPointsStrategy;
    }

    /**
     * @return Movie
     */
    public function movie()
    {
        return $this->movie;
    }

    /**
     * @return int
     */
    public function daysRented()
    {
        return $this->daysRented;
    }

    public function getRewardPoints()
    {
        return $this->rewardPointsStrategy->caclulateRewardPoints($this);
    }
}
