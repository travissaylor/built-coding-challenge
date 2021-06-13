<?php

namespace App;

use App\Strategies\RewardPointsStrategy\IRewardPointsStrategy;

class Rental
{
    /**
     * @var Movie
     */
    protected Movie $movie;

    /**
     * @var int
     */
    protected int $daysRented;

    /**
     * @var IRewardPointsStrategy
     */
    protected IRewardPointsStrategy $rewardPointsStrategy;

    /**
     * @param Movie $movie
     * @param integer $daysRented
     * @param IRewardPointsStrategy $rewardPointsStrategy
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
    public function movie(): Movie
    {
        return $this->movie;
    }

    /**
     * @return int
     */
    public function daysRented(): int
    {
        return $this->daysRented;
    }

    /**
     * @return integer
     */
    public function getRewardPoints(): int
    {
        return $this->rewardPointsStrategy->caclulateRewardPoints($this);
    }
}
