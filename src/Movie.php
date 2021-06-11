<?php

namespace App;

class Movie
{
    /**
     * @var string
     */
    private string $name;

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
    public function name()
    {
        return $this->name;
    }

    public function classification()
    {
        return $this->classification;
    }
}
