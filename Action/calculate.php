<?php

require_once '../Classes/Calculation.php'; // Include the Calculation class file

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $calculation = new Calculation();

    $data = json_decode($_POST['data'], true);
    $description = '';
    $killingCounts = [];
    $maxKillingCount = 0;
    $maxYear = 0;
    $maxAge = 0;

    foreach ($data as $i => $item) {
        $year = $item['year'];
        $age = $item['age'];
        $min = $year - $age;
        $killingCount = $calculation->getKillingCount($year, $age);
        $description .= "Person " . ($i + 1) . " born on Year = $year – $age = $min, number of people killed on year $min is $killingCount.<br>";
        $killingCounts[] = $killingCount;

        if ($killingCount > $maxKillingCount) {
            $maxKillingCount = $killingCount;
            $maxYear = $year;
            $maxAge = $age;
        }
    }

    $average = round($calculation->getAverage($killingCounts), 1);
    $summary = $calculation->getKillingSummary($maxYear, $maxAge);
    $averageDesc = "The average is (" . implode(' + ', $killingCounts) . ")/" . count($data) . " = $average";

    $response = [
        'success' => true,
        'summary' => $summary,
        'description' => $description,
        'averageDesc' => $averageDesc,
        'average' => $average
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
