<?php 

function questions_print($pitanje, $broj_pitanja) {
    echo "<p>$pitanje</p>";
    echo "<input type='text' name='odgovor$broj_pitanja'>";
}

function correct_answers($count) {
    if($count < 5) {
        $poruka1 = "Ukupno ste odgovorili tacno na $count/5 pitanja. Vise srece drugi put.";
        echo $poruka1;
    }
    if($count == 5) {
        $poruka2 = "CESTITAMO! Tacno ste odgovorili na sva pitanja!";
        echo $poruka2;
    }
}

function wrong_answers($a1, $a2, $a3, $a4, $a5) {
    if($a1 != "" || $a2 != "" || $a3 != "" || $a4 != "" || $a4 != "") {
        echo "<h4>";
        echo $a1 . "<br>";
        echo $a2 . "<br>";
        echo $a3 . "<br>";
        echo $a4 . "<br>";
        echo $a5 . "<br>";
        echo "</h4>";
    }
}

function success_register($ime, $prezime, $username, $password, $pol, $email) {
    $dm = "||";

    if($ime != "" && $prezime != "" && $username != "" && $password != "" && $pol != "" && $email != "" ) {
        
        $red_u_fajlu = $ime . $dm . $prezime . $dm . $username . $dm . $password . $dm . $pol . $dm . $email . $dm . "\n" ;
        $fajl = fopen("baza_korisnika.dat", "a");
        fwrite($fajl, $red_u_fajlu);
        fclose($fajl);
        echo $success = "<h2>Uspesno ste se registrovali!</h2>";
    }
}

?>