<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 4/26/2022
 * Time: 3:59 PM
 */

namespace App\Services;



use App\Services\Distance\Algorithm;

class DistanceService
{
    private string $string1;
    private string $string2;
    private Algorithm $algorithm;

    /**
     * @param Algorithm $algorithm
     */
    public function __construct(Algorithm $algorithm)
    {
        $this->algorithm($algorithm);
    }

    /**
     * Sets the distance algorithm to be used
     * @param Algorithm $algorithm
     * @return void
     */
    private function algorithm(Algorithm $algorithm): void
    {
        $this->algorithm = $algorithm;
    }

    /**
     * Validates and sets the data (vectors or strings)
     * @param string $string1
     * @param string $string2
     * @return DistanceService
     */
    public function data(string $string1, string $string2): static
    {
            $this->string1 = $string1;
            $this->string2 = $string2;
        return $this;
    }


    /**
     * Calls the appropriate algorithm to calculate the distance metric
     * @return int
     */
    public function distance(): int
    {
        return $this->algorithm->distance($this->string1, $this->string2);
    }
}
