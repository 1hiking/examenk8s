<?php
// Set the API endpoint URL
$host = getenv('API_URL');


$api_url = "http://.$host./todos";

// Make the GET request
$response = file_get_contents($api_url);

// Check if the response is not empty
if ($response === FALSE) {
    die('Error occurred while fetching data.');
}

// Decode the JSON response into an associative array
$todos = json_decode($response, true);

// Check if the decoding was successful
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON.');
}

// Output the todos (or you can format it as needed)
echo "<h1>Todo List</h1>";
echo "<ul>";
foreach ($todos as $todo) {
    echo "<li><strong>" . htmlspecialchars($todo['title']) . ":</strong> " . htmlspecialchars($todo['description']) . " - " . ($todo['is_done'] ? 'Done' : 'Not Done') . "</li>";
}
echo "</ul>";
?>
