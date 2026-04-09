<?php
include "conn.php";
$result = mysqli_query($dbConnection, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Database Mahasiswa</title>
</head>

<body>
    <h2>Daftar Mahasiswa</h2>
    
    <table class="table">
        <tr>
            <th style="width: 10%;">Nim</th>
            <th style="width: 70%;">Nama</th>
            <th style="width: 20%; text-align: center;">Aksi</th>
        </tr>

        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>        </td>
                    <td>        </td>
                    <td>
                    </td>
                </tr>
        <?php }
        } else { ?>
            <tr>
                <td colspan="3" style="text-align: center;">
                    Data Mahasiswa Tidak Ada
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>