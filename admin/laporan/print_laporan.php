<?php
    include "inc/koneksi.php";

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perpustakaan - Laporan Peminjaman</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div id="print-area">
        <h1 class="report-title">Laporan Perpustakaan</h1>
        <h2 class="report-subtitle">Laporan Peminjaman</h2>
        <table class="report-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pinjam</th>
                    <th>Buku</th>
                    <th>Peminjam</th>
                    <th>Tgl Pinjam</th>
                    <th>Jatuh Tempo</th>
                    <th>Tgl Dikembalikan</th>
                    <th>Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "inc/koneksi.php";

                $sql = mysqli_query($koneksi, "SELECT tb_peminjaman.id_buku, 
                tb_buku.judul_buku, 
                tb_mahasiswa.nim,
                tb_mahasiswa.nama,
                tb_peminjaman.id_pinjam,
                tb_peminjaman.tgl_pinjam,
                tb_peminjaman.tgl_kembali,
                tb_peminjaman.tgl_dikembalikan,
                IF(DATEDIFF(NOW(), tb_peminjaman.tgl_kembali) <= 0, 0, DATEDIFF(NOW(), tb_peminjaman.tgl_kembali)) telat_pengembalian 
                FROM tb_peminjaman 
                JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_peminjaman.nim 
                JOIN tb_buku ON tb_buku.id_buku = tb_peminjaman.id_buku 
                WHERE tb_peminjaman.status = 'KEM'
                ORDER BY nim");

                $no = 0;
                $total_denda = 0;
                $tarif_denda = 1000;

                if (mysqli_num_rows($sql) > 0) {
                    while ($data = mysqli_fetch_assoc($sql)) {
                        $no++;
                        $denda = $data['telat_pengembalian'] * $tarif_denda;
                        $total_denda += $denda;
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$data['id_pinjam']}</td>
                                <td>{$data['judul_buku']}</td>
                                <td>{$data['nama']}</td>
                                <td>" . date('d/M/Y', strtotime($data['tgl_pinjam'])) . "</td>
                                <td>" . date('d/M/Y', strtotime($data['tgl_kembali'])) . "</td>
                                <td>" . date('d/M/Y', strtotime($data['tgl_dikembalikan'])) . "</td>
                                <td>Rp. " . number_format($denda, 0, ',', '.') . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='no-data'>Data tidak ada</td></tr>";
                }
                ?>
                <tr class="total-row">
                    <td colspan="7">Total Denda</td>
                    <td>Rp. <?php echo number_format($total_denda, 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <button class="print-button" onclick="window.print()">Print Laporan</button>
</body>

</html>
