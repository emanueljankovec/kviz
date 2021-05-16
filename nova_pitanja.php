<?php 

session_start();
$user = "";
if(isset($_SESSION["administrator"]) && $_SESSION["administrator"] == "admin") {
    $user = "Dobro dosli admine";
} else {
    die("<h2>Niste ulogovani. Molimo Vas da se ulogujete kao administrator ukoliko zelite da editujete kviz. <a href='log_in.php'>Login</a></h2>") ;
}

if(file_exists("pitanja.txt")) {
    $file_handler = fopen("pitanja.txt", "r");
    $file_length = filesize("pitanja.txt");
    $file_content = fread($file_handler, $file_length);
    fclose($file_handler);
} else {
    $file_content = "";
}


?>
<html>
    <head>
        <title>Dodavanje, brisanje ili editovanje pitanja</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="edit-quiz">
            <div class="container-fluid">
                <div class="container">
                    <div class="new-q">
                        <form action="" method="POST">
                            <h1>
                                <?php 
                                echo $user;
                                ?>
                            </h1>
                            <h3>Dodajte novo pitanje u kviz</h3>
                            <div class="edit-form">
                                <div class="add-q">
                                    <h4 class="quest">Pitanje</h4>
                                    <textarea name="novo_pitanje" cols="50" rows="6" placeholder="Unesite pitanje..."></textarea>
                                    <h4>Odgovor</h4>
                                    <textarea class="add-q-area" name="nov_odgovor" cols="50" rows="6" placeholder="Unesite odgovor..."></textarea>
                                    <input type="submit" name="dodaj" value="Dodaj pitanje">
                                </div>
                                <div class="edit-q">
                                    <h4>Obrisite ili promenite neko od pitanja</h4>
                                    <textarea name="sva_pitanja" cols="50" rows="17" placeholder="Obrisite zeljeno pitanje..."><?php echo $file_content?></textarea>
                                    <input type="submit" name="delete" value="Obrisite ili promenite zeljeno pitanje">
                                </div>
                            </div>
                            <div class="return-submit">
                                <input type="submit" name="povratak" value="Vratite se na kviz">
                                <input type="submit" name="logout" value="Izlogujte se">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </body>
</html>

<?php


if(isset($_POST["dodaj"])) {
    $file_handler = fopen("pitanja.txt", "a");
    $content = "\n" . $_POST["novo_pitanje"] . "---" . strtolower($_POST["nov_odgovor"]) . "\n";
    fwrite($file_handler, $content);
    echo "<h2 style='color: green; text-align: center;'>Uspesno ste dodali novo pitanje.</h2><br>";
    fclose($file_handler);
}

if(isset($_POST["delete"])) {
    $file_handler = fopen("pitanja.txt", "w");
    fwrite($file_handler, $_POST["sva_pitanja"]);
    header("location:nova_pitanja.php");
    fclose($file_handler);
}

if(isset($_POST["povratak"])) {
    header("location:kviz.php");
}

if(isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("location:log_in.php");
}

?>
