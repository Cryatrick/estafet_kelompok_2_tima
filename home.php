<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $npm    = mysqli_real_escape_string($dbConnection, $_POST["mahasiswa_npm"]);
    $nama_mahasiswa   = mysqli_real_escape_string($dbConnection, $_POST["mahasiswa_nama"]);
    $prodi_mahasiswa = mysqli_real_escape_string($dbConnection, $_POST["mahasiswa_prodi"]);
}

$nim = $_GET["mahasiswa_npm"];
$result = mysqli_query($dbConnection, "SELECT * FROM mahasiswa WHERE mahasiswa_npm='$nim'");
$row = mysqli_fetch_assoc($result);
?>
<?php
$nama_mahasiswa = $_GET["mahasiswa_nama"];
$result = mysqli_query($dbConnection, "SELECT * FROM mahasiswa WHERE mahasiswa_nama='$nama_mahasiswa'");
$row = mysqli_fetch_assoc($result);
?>
<?php
$prodi_mahasiswa = $_GET["mahasiswa_prodi"];
$result = mysqli_query($dbConnection, "SELECT * FROM mahasiswa WHERE mahasiswa_prodi='$prodi_mahasiswa'");
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <Title>aplikasi_estafet</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <head>
