<?php 
session_start();
$error = "";
$user_error = "";
$pass_error = "";

?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <div class="login-form">
                    <h1>Ulogujte se</h1>
                    <form action="" method="POST">
                        <input type="text" name="username" placeholder="Username..."><br>
                        <input type="password" name="password" placeholder="Password..."><br><br>
                        <div class="log-reg">
                            <input class="sign-in" type="submit" name="login" value="Sign in">
                            <p>Nemate nalog?</p>
                            <input class="register" type="submit" name="new_register" value="Registrujte se">
                        </div>
                        <?php 

                        if(isset($_POST["login"])) {
                            $username = $_POST["username"];
                            $password = $_POST["password"];
                            
                            $user = "";
                            $pass = "";
                            $file = fopen("baza_korisnika.dat", "r");
                            $length = filesize("baza_korisnika.dat");
                            $content = fread($file, $length);
                            $content = str_replace("\n", "", $content);
                            $content = explode("||", $content);
                        
                            for($i = 0; $i < count($content); $i++) {
                                if($username == $content[$i]) {
                                    $user = $content[$i];
                                }
                        
                                if($password == $content[$i]) {
                                    $pass = $content[$i];
                                }
                            }
                            if($username == "") {
                                $user_error = "<h4 class='empty'>Molimo Vas da unesete vas username.</h4>";
                            }
                            
                            if($password == "") {
                                $pass_error = "<h4 class='empty'>Molimo Vas da unesete vas password.</h4>";
                            }
                        
                            if($username != "" && $password != "" && $username == $user && $password == $pass) {
                                $_SESSION["korisnik"] = $username;
                                header("location:kviz.php");
                            }
                        
                            fclose($file);
                        
                            if($username == "admin" && $password == "admin") {
                                $_SESSION["administrator"] = "admin";
                                header("location:nova_pitanja.php");
                            } else {
                                $error = "<h4 class='not-valid'>Kredencijali koje ste uneli nisu validni.</h4><div><a href='log_in.php'>Pokusajte ponovo</a></div>";
                            }
                        }
                        
                        if(isset($_POST["new_register"])) {
                            header("location:register.php");
                        }
                        
                        ?>

                        <div class="error-message">
                            <?php 
                            echo $error;
                            echo $user_error;
                            echo $pass_error;
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </body>
</html>

<?php 






?>