<?php 
session_start();
$username = "";
if(isset($_SESSION["korisnik"]) || isset($_SESSION["administrator"])) {
    if(isset($_SESSION["administrator"])) {
        $username = $_SESSION["administrator"];
    } else {
        $username = $_SESSION["korisnik"];
    } 
     
    echo "<html>";
    echo "<head>";
    echo "<title>Kviz</title>";
    echo "</head>";
    echo "<body style='text-align:center;'>";
    echo "<h1 style='text-align: center;'>Kviz</h1>";
    echo "<h3 style='text-align: center;'>Dobro dosli</h3>";
    echo "<h2 sty;e='text-align: center;'>$username</h2>";
	echo "<form style='text-align: center;' action='provera_odgovora.php' method='POST'>";
        
    $sadrzaj = file("pitanja.txt");

    $red = $sadrzaj[array_rand($sadrzaj)];
    $red = str_replace("\n", "", $red);
    $delimiter = "---";
    $niz = explode($delimiter, $red);
    $pitanje1 = $niz[0];
    $odgovor1 = $niz[1];

    $odg1 = "";

    for($i = 0; $i < strlen($odgovor1) - 1; $i++) {
        $odg1 = $odg1 . $odgovor1[$i];
    }

    $_SESSION["tacan_odgovor1"] = $odg1;
    echo "<strong>$pitanje1</strong><br><br>";
    echo "<input type='text' name='odgovor1'><br><br>";

    

    $sadrzaj = file("pitanja.txt");
    
    $red = $sadrzaj[array_rand($sadrzaj)];
    $red = str_replace("\n", "", $red);
    $delimiter = "---";
    $niz = explode($delimiter, $red);
    $pitanje2 = $niz[0];
    $odgovor2 = $niz[1];
	$odg2 = "";

	for($i = 0; $i < strlen($odgovor2) - 1; $i++) {
        $odg2 = $odg2 . $odgovor2[$i];
    }

	if($pitanje2 != $pitanje1)
	{
		echo "<strong>$pitanje2</strong><br><br>";
		echo "<input type='text' name='odgovor2'><br><br>";

		$_SESSION["tacan_odgovor2"] = $odg2;
	}
	else
	{
		header("location: kviz.php");
	}

    
    $sadrzaj = file("pitanja.txt");
    
    $red= $sadrzaj[array_rand($sadrzaj)];
    $red = str_replace("\n", "", $red);
    $delimiter = "---";
    $niz = explode($delimiter, $red);
    $pitanje3 = $niz[0];
    $odgovor3 = $niz[1];

    $odg3 = "";

	for($i = 0; $i < strlen($odgovor3) - 1; $i++) {
        $odg3 = $odg3 . $odgovor3[$i];
    }

	if($pitanje3 != $pitanje2 && $pitanje3 != $pitanje1)
	{
		echo "<strong>$pitanje3</strong><br><br>";
		echo "<input type='text' name='odgovor3'><br><br>";

		$_SESSION["tacan_odgovor3"] = $odg3;
	}
	else
	{
		header("location: kviz.php");
	}
    

    $sadrzaj = file("pitanja.txt");
    
    $red = $sadrzaj[array_rand($sadrzaj)];
    $red = str_replace("\n", "", $red);
    $delimiter = "---";
    $niz = explode($delimiter, $red);
    $pitanje4 = $niz[0];
    $odgovor4 = $niz[1];

    $odg4 = "";

	for($i = 0; $i < strlen($odgovor4) - 1; $i++) {
        $odg4 = $odg4 . $odgovor4[$i];
    }
    
	if($pitanje4 != $pitanje3 && $pitanje4 != $pitanje2 && $pitanje4 != $pitanje1)
	{
		echo "<strong>$pitanje4</strong><br><br>";
		echo "<input type='text' name='odgovor4'><br><br>";

		$_SESSION["tacan_odgovor4"] = $odg4;
	}
	else
	{
		header("location: kviz.php");
	}
	
    

    $sadrzaj = file("pitanja.txt");
    
    $red = $sadrzaj[array_rand($sadrzaj)];
    $red = str_replace("\n", "", $red);
    $delimiter = "---";
    $niz = explode($delimiter, $red);
    $pitanje5 = $niz[0];
    $odgovor5 = $niz[1];

    $odg5 = "";

	for($i = 0; $i < strlen($odgovor5) - 1; $i++) {
        $odg5 = $odg5 . $odgovor5[$i];
    }
	
	if($pitanje5 != $pitanje4 && $pitanje5 != $pitanje3 && $pitanje5 != $pitanje2 && $pitanje5 != $pitanje1)
	{
		echo "<strong>$pitanje5</strong><br><br>";
		echo "<input type='text' name='odgovor5'><br><br>";

		$_SESSION["tacan_odgovor5"] = $odg5;
	}
	else
	{
		header("location: kviz.php");
	}
	
    

    echo "<input type='submit' name='proveri_odgovore' value='Kraj kviza'><br><br>";

   

    echo "<input type='submit' name='logout' value='Izloguj se'><br><br>";

    echo "</form>";
    echo "<form style='text-align: center;' action='' method='POST'>";
    if(isset($_SESSION["administrator"])) {
        echo "<input type='submit' name='dodaj_pitanje' value='Dodaj novo pitanje u kviz'>";
    }
    echo "</form>";
    echo "</body>";
    echo "</html>";
    
    if(isset($_POST["dodaj_pitanje"])) {
        header("location:nova_pitanja.php");
    }


} else {
    echo "Niste ulogovani. Molimo Vas da se ulogujete sa sledece <a href='log_in.php'>forme.</a><br>";
}

?>

