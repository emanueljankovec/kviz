<?php 

session_start();

?>

<html>
    <head>
        <title>Logging in</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div>
            <div>
                <form action="" method="POST">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" name="login" value="Login">
                </form>
            </div>
            <div>
                <form action="" method="POST">
                    <input type="text" name="first_name" placeholder="Enter your first name">
                    <input type="text" name="last_name" placeholder="Enter your last name">
                    <input type="text" name="user" placeholder="Enter your username">
                    <input type="password" name="pass" placeholder="Enter your password">
                    <input type="email" name="email" placeholder="Enter your email adress">
                    <input type="radio" name="gender" value="Male"><strong>M</strong>
                    <input type="radio" name="gender" value="Female"><strong>F</strong>
                    <input type="submit" name="register" value="Sing Up">
                </form>
            </div>
        </div>
        
    </body>
</html>

<?php 

if(isset($_POST["login"])) {
    $username = "";
    $password = "";
    $user = "";
    $pass = "";

    if($_POST["username"] != "" && $_POST["password"] != "") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $file = fopen("user_base.dat", "r");
        $file_length = filesize("user_base.dat");
        $file_content = fread($file, $file_length);
        $file_content = str_replace("\n", "", $file_content);
        $file_content = explode("||", $file_content);

        for($i = 0; $i < count($file_content); $i++) {
            if($username == $file_content[$i]) {
                $user = $file_content[$i];
            }
            if($password == $file_content[$i]) {
                $pass = $file_content[$i];
            }
        }

        if($username == $user && $password == $pass) {
            $_SESSION["user_name"] = $username;
            header("location:quiz.php");
        } 

        fclose($file);
    } 

    if($username == "admin" && $password == "admin") {
        $_SESSION["administrator"] = "admin";
        header("location:edit_quiz.php");
    } else {
        echo "The credentials you entered are invalid.<a href='index.php'>Please try again.</a>";
    }
   
}

?>

<?php 

if(isset($_POST["register"])) {
    $first_name = "";
    $last_name = "";
    $username = "";
    $password = "";
    $email = "";
    $gender = "";

    if($_POST["first_name"] == "") {
        echo "Please enter your First name.<br>";
    } else {
        $first_name = $_POST["first_name"];
    }

    if($_POST["last_name"] == "") {
        echo "Please enter your Last name.<br>";
    } else {
        $last_name = $_POST["last_name"];
    }

    if($_POST["user"] == "") {
        echo "Please enter your username.<br>";
    } else {
        $username = $_POST["user"];
    }

    if($_POST["pass"] == "") {
        echo "Please enter your username.<br>";
    } else {
        $password = $_POST["pass"];
    }

    if($_POST["email"] == "") {
        echo "Please eneter your email adress.<br>";
    } else {
        $email = $_POST["email"];
    }

    if(!isset($_POST["gender"])) {
        echo "Please choose your gender.<br>";
    } else {
        $gender = $_POST["gender"];
    }

    $delimiter = "||";

    $row = $first_name . $delimiter . $last_name . $delimiter . $username . $delimiter . $password . $delimiter . $email . $delimiter . $gender . "\n";

    $file = fopen("user_base.dat", "a");
    fwrite($file, $row);
    fclose($file);

    if($first_name != "" && $last_name != "" && $username != "" && $password != "" && $email != "" && $gender != "") {
        echo "Congratulations, your account has been successfully created.";
    }
}


?>