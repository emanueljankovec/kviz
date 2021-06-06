<?php 

session_start();

?>

<html>
    <head>
        <title>Profil</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <?php 
                    $ime = $_SESSION["ime"];
                    $prez = $_SESSION["prezime"];
                    $email = $_SESSION["email-adresa"];
                    echo $ime . "<br>";
                    echo $prez . "<br>";
                    echo $email . "<br>";
                    $username =  $_SESSION["korisnik"];
                    echo $username;
                    
                ?>
            </div>
            <div class="profile-img">
                <h4>Izaberite vasu profilnu sliku</h4>
                <input type="file" name="file"><br>
                <input type="submit" name="upload" value="Uplouduj fajl"><br>
                <input type="submit" name="logout" value="Logout"><br>
                <input type="text" name="new_username" placeholder="Unesite novi username"><br>
                <input type="submit" name="change_username" value="Promeni username">
            </div>
        </form>
    </body>
</html>

<?php 
if(isset($_POST["change_username"])) {
    
    $file = fopen("baza_korisnika.dat", "r");
    $length = filesize("baza_korisnika.dat");
    $content = fread($file, $length);

    $content_replace = str_replace("\n", "", $content);
    
    $test = explode("||", $content);

    for($i=0; $i<count($test); $i++) {
        if($test[$i] == $_POST["new_username"]) {
            header("location:profile.php?greska=1");
        }
       
    }
    
    $user_change = str_replace($username, $_POST["new_username"], $content); 
    
    $file_save = fopen("baza_korisnika.dat", "w");
    fwrite($file_save, $user_change);
    fclose($file_save);

    fclose($file);
    session_unset();
    session_destroy();
    header("location:log_in.php?username_change=1");

}

if(isset($_POST["upload"])) {
    if(isset($_SESSION["administrator"])) {
        $name = "admin.jpg";
    } elseif(isset($_SESSION["korisnik"])) {
        $name = $_FILES["file"]["name"];
    }

    
    $size = $_FILES["file"]["size"];
    $type = $_FILES["file"]["type"];
    $tmp_name = $_FILES["file"]["tmp_name"];

    if($name != "") {

        $tmp_array = explode(".", $name);
        $count = count($tmp_array);
        $ext = $tmp_array[$count - 1];

        if($ext == "jpg" || $ext == "jpeg" || $ext == "bmp" || $ext == "gif" || $ext == "png") {
            $max_size = 1024 * 1024 * 2;

            if(!is_dir("assets/profile_img")) {
                mkdir("assets/profile_img");
            } 
            $destination = "assets/profile_img/$name";

            $i = 1;

            move_uploaded_file($tmp_name, $destination);
        }
    } else {
        echo "Molimo Vas da odaberete neki fajl.<br>";
    }
}
if(isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("location:log_in.php");
}

?>