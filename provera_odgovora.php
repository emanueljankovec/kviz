<?php 
session_start();
$tacni = 0;
if(isset($_POST["proveri_odgovore"])) {
    if($_POST["odgovor1"] == $_SESSION["tacan_odgovor1"]) {
        $tacni++;
    }

    if($_POST["odgovor2"] == $_SESSION["tacan_odgovor2"]) {
        $tacni++;
    }

    if($_POST["odgovor3"] == $_SESSION["tacan_odgovor3"]) {
        $tacni++;
    }

    if($_POST["odgovor4"] == $_SESSION["tacan_odgovor4"]) {
        $tacni++;
    }

    if($_POST["odgovor5"] == $_SESSION["tacan_odgovor5"]) {
        $tacni++;
    }
}
echo $_SESSION["tacan_odgovor1"] . "<br>";
echo $_POST["odgovor1"] . "<br>";
echo $_SESSION["tacan_odgovor2"] . "<br>";
echo $_POST["odgovor2"] . "<br>";
echo $_SESSION["tacan_odgovor3"] . "<br>";
echo $_POST["odgovor3"] . "<br>";
echo $_SESSION["tacan_odgovor4"] . "<br>";
echo $_POST["odgovor4"] . "<br>";
echo $_SESSION["tacan_odgovor5"] . "<br>";
echo $_POST["odgovor5"] . "<br>";

echo $tacni;

if(isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("location:log_in.php");
}

?>