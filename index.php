<?php
// Function to load environment variables from a .env file
function loadEnv($filePath) {
    if (file_exists($filePath)) {
        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            // Ignore comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            // Split the line into key and value
            list($key, $value) = explode('=', $line, 2);
            // Trim whitespace and set the environment variable
            $_ENV[trim($key)] = trim($value);
        }
    }
}

// Load the .env file
loadEnv(__DIR__ . '/.env');

// Database connection parameters from .env
$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

// Create a new mysqli instance
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Set the character set to utf8mb4
$mysqli->set_charset("utf8mb4");

// Query to retrieve content
$query = "SELECT language_code, content, text_direction FROM content";
$result = $mysqli->query($query);

// Check if the query was successful
if ($result) {
    // Start HTML output
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Multilingual Content</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .rtl {
                direction: rtl;
                text-align: right;
            }
            .ltr {
                direction: ltr;
                text-align: left;
            }
        </style>
    </head>
    <body>";

    // Fetch and display each row of content
    while ($row = $result->fetch_assoc()) {
        $language_code = htmlspecialchars($row['language_code']);
        $content = htmlspecialchars($row['content']);
        $text_direction = $row['text_direction'] === 'RTL' ? 'rtl' : 'ltr';

        echo "<div class='$text_direction'>$content ($language_code)</div>";
    }

    // End HTML output
    echo "</body>
    </html>";

    // Free result set
    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>
