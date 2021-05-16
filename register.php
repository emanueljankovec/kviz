
<html>
    <head>
        <title>Registracija</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="register-form">
            <div class="container-fluid">
                <div class="container">
                    <div class="register-con">
                        <h1>Register Form</h1>
                        <form action="" method="POST">
                            <input type="text" name="ime" placeholder="Unesite Vase Ime..."><br>
                            <input type="text" name="prezime" placeholder="Unesite Vase Prezime..."><br>
                            <input type="text" name="korisnicko" placeholder="Unesite Vase korisnicko ime..."><br>
                            <input type="password" name="password_register" placeholder="Unesite Vas passowrd"><br>
                            <input type="email" name="email" placeholder="Unesite Vas email"><br>
                            <input type="radio" name="pol" value="Muski"><span class="male">Muski</span>
                            <input type="radio" name="pol" value="Zenski"><span>Zenski</span><br><br>
                            <input class="reg-btn" type="submit" name="register" value="Registruj se"><br>
                            <input type="submit" name="back_to_login" value="Vrati se na login stranicu">
                            <?php 
                            $error_name = "";
                            $error_last_name = "";
                            $error_username = "";
                            $error_password = "";
                            $error_email = "";
                            $error_radio = "";
                            $success = "";

                            if(isset($_POST["register"])) {
                                $ime = "";
                                $prezime = "";
                                $username = "";
                                $password = "";
                                $email = "";
                                $pol = "";
                            
                                if($_POST["ime"] != "") {
                                    $ime = $_POST["ime"];
                                } else {
                                    $error_name = "<h4>Molimo Vas da unesete Vase Ime.</h4>";
                                }
                            
                                if($_POST["prezime"] != "") {
                                    $prezime = $_POST["prezime"];
                                } else {
                                    $error_last_name = "<h4>Molimo Vas da unesete Vase Prezime.</h4>";
                                }
                            
                                if($_POST["korisnicko"] != "") {
                                    $username = $_POST["korisnicko"];
                                } else {
                                    $error_username = "<h4>Molimo Vas da unesete Vase korisnicko ime.</h4>";
                                }
                            
                                if($_POST["password_register"] != "") {
                                    $password = $_POST["password_register"];
                                } else {
                                    $error_password = "<h4>Molimo Vas da unesete Vas password.</h4>";
                                }
                                
                                if($_POST["email"] != "") {
                                    $email = $_POST["email"];
                                } else {
                                    $error_email = "<h4>Molimo Vas da unesete Vas email.</h4>";
                                }
                                
                                if(isset($_POST["pol"])) {
                                    $pol = $_POST["pol"];
                                } else {
                                    $error_radio = "<h4>Molimo Vas da izaberete Vas pol.</h4>";
                                }
                            
                                $dm = "||";

                                if($ime != "" && $prezime != "" && $username != "" && $password != "" && $pol != "" && $email != "") {
                                    $success = "<h4>Uspesno ste se registrovali!</h4><br>";
                                    $red_u_fajlu = $ime . $dm . $prezime . $dm . $username . $dm . $password . $dm . $pol . $dm . $email . "\n";
                            
                                    $fajl = fopen("baza_korisnika.dat", "a");
                                    fwrite($fajl, $red_u_fajlu);
                                    fclose($fajl);
                                }
                                
                            }
                            
                            ?>
                            <div class="error-reg">
                                <?php 
                                echo $success;
                                echo $error_name;
                                echo $error_last_name;
                                echo $error_username;
                                echo $error_password;
                                echo $error_email;
                                echo $error_radio;
                                ?>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>

<?php 



if(isset($_POST["back_to_login"])) {
    header("location:log_in.php");
}

?>