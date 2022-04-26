<?php

namespace App\Services\Distance;



class Hamming extends Algorithm
{
    public CONST NAME = "Hamming";
    /**
     * Hamming distance between two strings
     * @param string $string1
     * @param string $string2
     * @return int
     */
    public function distance(string $string1, string $string2): int
    {

        $res = array_diff_assoc(str_split($string1), str_split($string2));
        return count($res);
    }
}
