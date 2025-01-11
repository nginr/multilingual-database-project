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

// Load environment variables from the ../.env file
loadEnv(__DIR__ . '/../.env');

// Database connection parameters
$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

// Create a new mysqli instance and return it
function getDbConnection() {
    global $host, $username, $password, $database;
    $mysqli = new mysqli($host, $username, $password, $database);

    // Check for connection errors
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Set the character set to utf8mb4
    $mysqli->set_charset("utf8mb4");

    return $mysqli;
}
?>

