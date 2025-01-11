<?php
// renderContentInput.php

function renderContentInput($result) {

    echo "<div class='content_form'>
    <h3>Enter New Content</h2>
    <form action='src/submitContent.php' method='POST'>
        <label for='language_code'>Language Code</label>
        <input type='text' id='language_code' name='language_code' required>

        <br>
        <label for='text_direction'>Text Direction</label>
        <select id='text_direction' name='text_direction'>
            <option value='LTR'>Left to Right</option>
            <option value='RTL'>Right to Left</option>
        </select>

        <br>
        <label for='content'>Content</label>
        <textarea id='content' name='content' rows='4' required></textarea>

        <br>
        <button type='submit'>Submit</button>
    </form>
</div>
    ";
}


?>
