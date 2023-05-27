<?php

require_once 'PatternGenerator.php'; // Include the PatternGenerator class file

class Calculation
{
    private $patternGenerator;

    public function __construct()
    {
        $this->patternGenerator = new PatternGenerator();
    }

    public function getKillingCount($year, $age)
    {
        $diff = $year - $age;
        $pattern = $this->patternGenerator->generatePattern($diff);
        $count = $pattern[$diff - 1];

        return $count;
    }


    public function getKillingSummary($year, $age)
    {
    $summary = "";
    $diff = $year - $age;
    $pattern = $this->patternGenerator->generateSummary($diff);
    $i = 1;
    foreach ($pattern as $value) {
        $yearLabel = ($i === 1) ? "year" : "years";
        $villagerLabel = ($i === 1) ? "villager" : "villagers";
        $summary .= "On the ".$this->getOrdinalSuffix($i)." ".$yearLabel." she kills ".$value." ".$villagerLabel."<br>";
        $i++;
    }

    return $summary;
    }

    public function getAverage($data)
    {
        $sum = array_sum($data);
        $average = $sum / count($data);

        return $average;
    }

    public function getOrdinalSuffix($number)
    {
        if ($number % 100 >= 11 && $number % 100 <= 13) {
            return $number . 'th';
        } else {
            switch ($number % 10) {
                case 1:
                    return $number . 'st';
                case 2:
                    return $number . 'nd';
                case 3:
                    return $number . 'rd';
                default:
                    return $number . 'th';
            }
        }
    }
}
