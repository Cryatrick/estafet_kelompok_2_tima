<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Optional: Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <style>
        body { padding: 20px; background-color: #f8f9fa; }
        .table th { background-color: #0d6efd; color: white; }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Daftar Mahasiswa</h2>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>IPK</th>
                    <th>Predikat IPK</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Program Studi</th>
                    <th>Kepala Program Studi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $host = "localhost";
                $user = "root";        // ganti jika pakai username lain
                $pass = "";            // ganti jika ada password
                $db   = "nama_database_kamu";   // ganti dengan nama database kamu

                $mysqli = new mysqli($host, $user, $pass, $db);

                // Cek koneksi
                if ($mysqli->connect_error) {
                    die("Koneksi gagal: " . $mysqli->connect_error);
                }

                // Query utama (sesuaikan nama kolom jika berbeda)
                $query = "
                    SELECT 
                        m.npm,
                        m.nama AS nama_mahasiswa,
                        ROUND(m.ipk, 2) AS ipk,
                        m.tempat_lahir,
                        DATE_FORMAT(m.tanggal_lahir, '%d-%m-%Y') AS tanggal_lahir,
                        ps.nama_prodi AS program_studi,
                        d.nama_dosen AS kepala_program_studi,
                        CASE 
                            WHEN m.ipk >= 3.75 THEN 'Cumlaude'
                            WHEN m.ipk >= 3.50 THEN 'Sangat Memuaskan'
                            WHEN m.ipk >= 3.00 THEN 'Memuaskan'
                            WHEN m.ipk >= 2.50 THEN 'Cukup'
                            ELSE 'Kurang'
                        END AS predikat_ipk
                    FROM mahasiswa m
                    INNER JOIN program_studi ps ON m.kode_prodi = ps.kode_prodi
                    INNER JOIN dosen d ON ps.kode_kepala = d.nidn
                    ORDER BY m.npm ASC
                ";

                $result = $mysqli->query($query);
                $no = 1;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['npm']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_mahasiswa']) . "</td>";
                        echo "<td>" . $row['ipk'] . "</td>";
                        echo "<td><span class='badge bg-success'>" . $row['predikat_ipk'] . "</span></td>";
                        echo "<td>" . htmlspecialchars($row['tempat_lahir']) . "</td>";
                        echo "<td>" . $row['tanggal_lahir'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['program_studi']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['kepala_program_studi']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>Tidak ada data mahasiswa</td></tr>";
                }

                $mysqli->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>