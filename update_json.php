<?php
// Read the JSON file
$jsonFile = 'example.json';
$jsonData = file_get_contents($jsonFile);
$data = json_decode($jsonData, true);

// Get the request body
$requestBody = file_get_contents('php://input');
$newData = json_decode($requestBody, true);

// Merge the new data with the existing data
$data = array_merge_recursive($data, $newData);

// Encode the data back to JSON
$newJsonData = json_encode($data, JSON_PRETTY_PRINT);

// Write the JSON data back to the file
file_put_contents($jsonFile, $newJsonData);

// Send a response
header('Content-Type: application/json');
echo json_encode(['success' => true]);
?>
