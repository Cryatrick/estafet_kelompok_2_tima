<?php
$host = "10.11.12.109";
$username = "estafet_user";
$pass = "Qwerty123$%";
$db = "estafet_db";

$dbConnection = mysqli_connect($host, $usename, $pass, $db);

if (!$dbConnection) {
    die ("Connection Error: " . mysqli_connect_error());
}
?>