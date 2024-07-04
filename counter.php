<?php
date_default_timezone_set('UTC');

$counterFile = 'counter.json';

// Initialize or load the counter data
if (!file_exists($counterFile)) {
    $data = [
        'total' => 0,
        'yearly' => [],
        'monthly' => [],
        'daily' => []
    ];
    file_put_contents($counterFile, json_encode($data));
} else {
    $data = json_decode(file_get_contents($counterFile), true);
}

// Get current date components
$currentYear = date('Y');
$currentMonth = date('Y-m');
$currentDay = date('Y-m-d');

// Initialize yearly, monthly, and daily counters if not already present
if (!isset($data['yearly'][$currentYear])) {
    $data['yearly'][$currentYear] = 0;
}
if (!isset($data['monthly'][$currentMonth])) {
    $data['monthly'][$currentMonth] = 0;
}
if (!isset($data['daily'][$currentDay])) {
    $data['daily'][$currentDay] = 0;
}

// Increment the counters
$data['total']++;
$data['yearly'][$currentYear]++;
$data['monthly'][$currentMonth]++;
$data['daily'][$currentDay]++;

// Save the updated data back to the file
file_put_contents($counterFile, json_encode($data));

// Output the counts as a JSON object
echo json_encode([
    'total' => $data['total'],
    'yearly' => $data['yearly'][$currentYear],
    'monthly' => $data['monthly'][$currentMonth],
    'daily' => $data['daily'][$currentDay]
]);
?>
