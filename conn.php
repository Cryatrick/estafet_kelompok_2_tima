<?php
$host = "10.11.12.109";
$username = "estafet_user";
$pass = "Qwerty123$%";
$db = "estafet_db";

$dbConnection = mysqli_connect($host, $username, $pass, $db);

if (!$dbConnection) {
    die ("Connection Error: " . mysqli_connect_error());
}
?>