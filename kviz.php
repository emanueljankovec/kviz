<?php 
session_start();
include_once "functions.php";
?>
 
<html>
    <head>
        <title>Kviz</title>
        <link rel="stylesheet" href="css/style.css">
        <?php 
        $username = "";
        if(isset($_SESSION["korisnik"]) || isset($_SESSION["administrator"])) {
            if(isset($_SESSION["administrator"])) {
                $username = $_SESSION["administrator"];
            } else {
                $username = $_SESSION["korisnik"];
            } 
        } else {
            die("<h2>Niste ulogovani. Molimo Vas da se ulogujete sa sledece <a href='log_in.php'>forme.</a></h2>");
        }
        
        ?>
    </head>
    <body>
        <div class="quiz">
            <div class="container-fluid">
                <div class="container">
                    <h1>KVIZ</h1>
                    <div class="welcome-user">
                        <h3>Dobro dosli</h3>
                        <h2><?php echo $username;?></h2>
                    </div>
                    <div class="quiz-questions">
                        <form action="provera_odgovora.php" method="POST">
                            <?php                            
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

                            questions_print($pitanje1, 1);

                            //$sadrzaj = file("pitanja.txt");
                            
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
                                questions_print($pitanje2, 2);

                                $_SESSION["tacan_odgovor2"] = $odg2;
                            }
                            else
                            {
                                header("location: kviz.php");
                            }
                          
                            //$sadrzaj = file("pitanja.txt");
                            
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
                                questions_print($pitanje3, 3);

                                $_SESSION["tacan_odgovor3"] = $odg3;
                            }
                            else
                            {
                                header("location: kviz.php");
                            }
                            

                            //$sadrzaj = file("pitanja.txt");
                            
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
                                questions_print($pitanje4, 4);

                                $_SESSION["tacan_odgovor4"] = $odg4;
                            }
                            else
                            {
                                header("location: kviz.php");
                            }
                                                       
                            //$sadrzaj = file("pitanja.txt");
                            
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
                                questions_print($pitanje5, 5);

                                $_SESSION["tacan_odgovor5"] = $odg5;
                            }
                            else
                            {
                                header("location: kviz.php");
                            }
                            
                            ?>
                            <div class="quiz-end">
                                <input type='submit' name='proveri_odgovore' value='Kraj kviza'>
                                <input type='submit' name='logout' value='Izloguj se'>
                            </div>
                            
                        </form>
                        <form class="admin-edit" action="" method="POST">
                            <?php 
                            if(isset($_SESSION["administrator"])) {
                                echo "<div><input class='add-quest-admin' type='submit' name='dodaj_pitanje' value='Dodaj novo pitanje u kviz'></div>";
                            }
                            
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
   
        
<?php     
if(isset($_POST["dodaj_pitanje"])) {
    header("location:nova_pitanja.php");
}
?>


  


