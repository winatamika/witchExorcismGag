<?php

require_once 'PatternGenerator.php';
require_once 'Helpers.php';

class Calculation
{
    private $patternGenerator;
    private $Helpers;

    public function __construct()
    {
        $this->patternGenerator = new PatternGenerator();
        $this->Helpers = new Helpers();
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
        $summary .= "On the ".$this->Helpers->getOrdinalSuffix($i)." ".$yearLabel." she kills ".$value." ".$villagerLabel."<br>";
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
    
}
