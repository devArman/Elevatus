<?php

namespace App\Services\Distance;

abstract class Algorithm
{

    // Self-referential 'abstract' declaration
    public const NAME = self::NAME;

    /**
     * Abstract method to calculate the distance metric
     *
     * @param string $string1
     * @param string $string2
     */

    abstract public function distance(string $string1, string $string2);


}
