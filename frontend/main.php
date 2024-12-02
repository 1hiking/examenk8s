<?php
// Set the API endpoint URL
$host = getenv('API_URL');
$api_url = "http://$host:90/todos";

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string

// Execute the cURL request
$response = curl_exec($ch);

// Check if the request was successful
if ($response === false) {
    die('Error occurred while fetching data: ' . curl_error($ch));
}

// Close cURL session
curl_close($ch);

// Decode the JSON response into an associative array
$todos = json_decode($response, true);

// Check if the decoding was successful
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON: ' . json_last_error_msg());
}

// Output the todos (or you can format it as needed)
echo "<h1>Todo List</h1>";
echo "<ul>";
foreach ($todos as $todo) {
    echo "<li><strong>" . htmlspecialchars($todo['title']) . ":</strong> " . htmlspecialchars($todo['description']) . " - " . ($todo['is_done'] ? 'Done' : 'Not Done') . "</li>";
}
echo "</ul>";
?>
