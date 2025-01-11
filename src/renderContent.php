<?php
// renderContent.php

function renderContent($result) {
    
    // Fetch and display each row of content
    echo "<div class='content_list'>
    <h3>Content List</h2>
    <div class='content-list-wrapper'>";
    while ($row = $result->fetch_assoc()) {
        $language_code = htmlspecialchars($row['language_code']);
        $content = htmlspecialchars($row['content']);
        $text_direction = $row['text_direction'] === 'RTL' ? 'rtl' : 'ltr';

        echo "<div class='content-item'>
            <p style='direction: $text_direction'>$content ($language_code)</p>
        </div>";

    }
    echo "</div>
    </div>";
}
?>

