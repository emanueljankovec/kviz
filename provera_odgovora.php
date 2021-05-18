<?php 
session_start();
include_once "functions.php";
$tacni = 0;
$pitanje1 = "";
$pitanje2 = "";
$pitanje3 = "";
$pitanje4 = "";
$pitanje5 = "";
$poruka1 = "";
$poruka2 = "";
if(isset($_POST["proveri_odgovore"])) {
    if($_POST["odgovor1"] != "") {
        if($_POST["odgovor1"] == $_SESSION["tacan_odgovor1"]) {
            $tacni++;
        } else {
            $pitanje1 = "Niste tacno odgovorili na prvo pitanje. <a class='try-again' href='kviz.php'>Pokusajte ponovo.</a>";
        }
    } else {
        $pitanje1 = "Molimo Vas da unesete odgovor na prvo pitanje.";
    }
    
    if($_POST["odgovor2"] != "") {
        if($_POST["odgovor2"] == $_SESSION["tacan_odgovor2"]) {
            $tacni++;
        } else {
            $pitanje2 = "Niste tacno odgovorili na drugo pitanje. <a class='try-again' href='kviz.php'>Pokusajte ponovo.</a>";
        }
    } else {
        $pitanje2 = "Molimo Vas da unesete odgovor na drugo pitanje.";
    }
    
    if($_POST["odgovor3"] != "") {
        if($_POST["odgovor3"] == $_SESSION["tacan_odgovor3"]) {
            $tacni++;
        } else {
            $pitanje3 = "Niste tacno odgovorili na trece pitanje. <a class='try-again' href='kviz.php'>Pokusajte ponovo.</a>";
        }
    } else {
        $pitanje3 = "Molimo Vas da unesete odgovor na trece pitanje.";
    }
    
    if($_POST["odgovor4"] != "") {
        if($_POST["odgovor4"] == $_SESSION["tacan_odgovor4"]) {
            $tacni++;
        } else {
            $pitanje4 = "Niste tacno odgovorili na cetvrto pitanje. <a class='try-again' href='kviz.php'>Pokusajte ponovo.</a>";
        }
    } else {
        $pitanje4 = "Molimo Vas da unesete odgovor na cetvrto pitanje.";
    }
    
    if($_POST["odgovor5"] != "") {
        if($_POST["odgovor5"] == $_SESSION["tacan_odgovor5"]) {
            $tacni++;
            
        } else {
            $pitanje5 = "Niste tacno odgovorili na peto pitanje. <a class='try-again' href='kviz.php'>Pokusajte ponovo.</a>";
        }
    } else {
        $pitanje5 = "Molimo Vas da unesete odgovor na peto pitanje.";
    }
}

?>
<html>
    <head>
        <title>Provera odgovora</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="answer-check">
            <div class="container-fluid">
                <div class="container">
                    <div class="results">
                        <?php 
                        wrong_answers($pitanje1, $pitanje2, $pitanje3, $pitanje4, $pitanje5);
                        ?>
                        <h2>
                            <?php 
                            correct_answers($tacni);
                            ?>
                        </h2>
                        
                        <div class="buttons">
                            <form action="" method="POST">
                                <input type="submit" name="nazad" value="Vrati se na kviz">
                                <input type="submit" name="logout" value="Izlogujte se">
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>


<?php
if(isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("location:log_in.php");
}
if(isset($_POST["nazad"])) {
    header("location:kviz.php");
}
?>