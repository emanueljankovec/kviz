<?php 

function questions_print($pitanje, $broj_pitanja) {
    echo "<p>$pitanje</p>";
    echo "<input type='text' name='odgovor$broj_pitanja'>";
}

?>