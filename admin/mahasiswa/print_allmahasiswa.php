<?php
    include "inc/koneksi.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perpustakaan - Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>

	<body>
        <div id="print-area">
        <h1 class='report-title'>Laporan Perpustakaan</h1>
        <h2 class='report-subtitle'>Data Mahasiswa</h2>
    <?php
    // Load file koneksi.php
    include "inc/koneksi.php";
 

        $query = "SELECT * from tb_mahasiswa"; // Tampilkan semua data Mahasiswa 
    
    ?>
    <table class="report-table">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>      
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>prodi</th>
            <th>No Telepon</th>
        </tr>
    <?php
    $no=1;
    ?>
        <?php
        $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                $tgl = date('d-m-Y', strtotime($data['nim']));

                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $data['nim'] . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['jekel']. "</td>";
                echo "<td>" . $data['prodi'] . "</td>";
                echo "<td>" . $data['no_hp'] . "</td>";

                echo "</tr>";
            }
        } else { // Jika data tidak ada
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        }
        ?>
    </table>
</div>
<button class="print-button" onclick="window.print()">Print Laporan</button>
    </body>

</html>

