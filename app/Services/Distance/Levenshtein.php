<?php
namespace App\Services\Distance;



class Levenshtein extends Algorithm
{
    public CONST NAME = "Levenshtein";

    /**
     * Calculate Levenshtein distance between two strings
     * @param string $string1
     * @param string $string2
     * @return int
     */
    public function distance(string $string1, string $string2): int
    {
        return  levenshtein( $string1,$string2);

    }

}
