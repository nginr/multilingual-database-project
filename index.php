<?php
// index.php

// Include required files
require_once 'src/config.php';
require_once 'src/fetchContent.php';
require_once 'src/renderContent.php';
require_once 'src/renderContentInput.php';

// Get the database connection
$mysqli = getDbConnection();

// Fetch content from the database
$result = fetchContent($mysqli);

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Multilingual Content</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>";

if ($result) {

echo "<div class='main'>";
    renderContentInput($result);
    renderContent($result);
echo "</div>";

    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}

// End HTML output
echo "</body>
</html>";

// Close the database connection
$mysqli->close();
?>
