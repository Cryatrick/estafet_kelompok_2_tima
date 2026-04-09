<?php
include "conn.php";
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <Title>aplikasi_estafet</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <head>

<body>
    <h2>Login Mahasiswa</h2>

    <a href="create.php" class="btn green">+ Tambah Data</a>

    <table class="table">
        <tr>
            <th style="width: 10%;">NPM</th>
            <th style="width: 70%;">Nama</th>
            <th style="width: 20%; text-align: center;">Aksi</th>
        </tr>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                </tr>
        <?php } 
        } else { ?>
            <tr>
                <td 
    </table> 
</body>
</html>
