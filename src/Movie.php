<?php

namespace App;

class Movie
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var Classification
     */
    protected Classification $classification;

    /**
     * @param string $name
     * @param int $priceCode
     */
    public function __construct(string $name, Classification $classification)
    {
        $this->name = $name;
        $this->classification = $classification;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return Classification
     */
    public function classification(): Classification
    {
        return $this->classification;
    }
}
