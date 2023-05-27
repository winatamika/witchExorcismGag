<?php

class PatternGenerator
{
    private $fibonacci;

    public function __construct()
    {
        $this->fibonacci = [1, 1];
    }

    public function generatePattern($iterations)
    {
        $result = [];
        $fibonacci = [1, 1];

        for ($i = 0; $i < $iterations; $i++) {
            $sum = 0;

            // Calculate the sum of Fibonacci numbers
            for ($j = 0; $j <= $i; $j++) {
                $sum += $fibonacci[$j];

            }

            $result[] = $sum;

            // Generate the next Fibonacci number
            $fibonacci[] = $fibonacci[$i] + $fibonacci[$i + 1];
        }

        return $result;
    }

    public function generateSummary($iterations)
    {
        $result = [];
        $fibonacci = [1, 1];

        for ($i = 0; $i < $iterations; $i++) {
            $sum = 0;
            $pattern = "";
            
            // Calculate the sum of Fibonacci numbers
            for ($j = 0; $j <= $i; $j++) {
                $sum += $fibonacci[$j];
                $pattern .= $fibonacci[$j];

                if ($j < $i) {
                    $pattern .= " + ";
                }
            }

            $result[] = $pattern . " = " . $sum;
        

            // Generate the next Fibonacci number
            $fibonacci[] = $fibonacci[$i] + $fibonacci[$i + 1];
        }


        
        return $result;
    }

}
