<?php
// fetchContent.php

function fetchContent($mysqli) {
    // Query to retrieve content
    $query = "SELECT language_code, content, text_direction FROM content";
    $result = $mysqli->query($query);

    // Check if the query was successful
    if ($result) {
        return $result;
    } else {
        return false;
    }
}
?>

