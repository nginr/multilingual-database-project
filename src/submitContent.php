<?php
// submitContent.php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $languageCode = $_POST['language_code'];
    $content = $_POST['content'];
    $textDirection = $_POST['text_direction'];

    // Validate the form data
    if (empty($languageCode) || empty($content) || empty($textDirection)) {
        echo "Please fill in all fields.";
        exit;
    }

    require_once __DIR__ . '/config.php';

    // You can also use a database to store the form data
    $conn = getDbConnection();
    $sql = "INSERT INTO content (language_code, content, text_direction) VALUES ('$languageCode', '$content', '$textDirection')";
    $conn->query($sql);
    $conn->close();

    // Redirect the user back to the original page
    header('Location: ../index.php');
    exit;
} else {
    echo "Invalid request method.";
}

?>
