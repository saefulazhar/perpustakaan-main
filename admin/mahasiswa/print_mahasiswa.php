<!DOCTYPE html>
<html>
<head>
    <title><?= $title_web; ?></title>
    <style>
        .container{
            display: block;
        }


        /* CSS untuk ID card */
        .id-card {
            background: white;
            width: 8.5cm; /* Lebar ID card */
            height: 5.4cm; /* Tinggi ID card */
            margin: 0 auto;
            padding: 1cm; /* Atur padding sesuai kebutuhan */
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
            border: 1px solid #ddd;
        }

@media print {
    * {
        visibility: hidden;
    }
    #printableArea, #printableArea * {
        visibility: visible;
    }
    #printableArea {
        position: absolute;
        left: 0;
        top: 0;
    }

    .id-card {
        font-size: 10px; /* Sesuaikan ukuran font secara proporsional */
        padding: 0.5cm; /* Kurangi padding untuk menyesuaikan */
    }

    .id-card h4 {
        font-size: 12px; /* Ukuran font untuk judul */
        margin-bottom: 0.3cm; /* Jarak antara elemen */
    }

    .table td {
        font-size: 10px; /* Ukuran font untuk isi tabel */
        padding: 2px; /* Sesuaikan jarak dalam tabel */
    }

    .table th {
        font-size: 10px; /* Ukuran font untuk header tabel */
    }
}


        /* CSS untuk tombol */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #28a745; /* Warna hijau */
            color: white;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838; /* Warna hijau lebih gelap saat hover */
        }

        /* CSS untuk modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            margin-bottom: 15px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 15px;
        }

        .modal-footer .btn {
            margin-left: 10px;
        }

        /* CSS untuk tabel */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #007bff; /* Warna biru untuk header */
            color: white;
        }

        .image-container {
            border: 1px solid rgb(100, 100, 100);
            height: 4cm;
            overflow: auto;
            padding: 10px;
            text-align: center;
            margin: auto;
        }

        .image-container h4 {
            margin-top: 1.4cm;
        }
    </style>
</head>
<body>
    <div class="container">
        <br/>
        <div class="text-center">
            <h3>Preview HTML to DOC</h3>
        </div>
        <div class="text-right">
            <button type="button" class="btn" onclick="showPreview()">
                <i class="fa fa-eye"></i> Preview
            </button>
            <button type="button" class="btn" onclick="printDiv('printableArea')">
                <i class="fa fa-print"></i> Print File
            </button>
        </div>
    </div>
    <br/>
    <div id="printableArea" class="id-card">
        <div>
            <h4 class="text-center">KARTU Mahasiswa PERPUSTAKAAN</h4>
            <table class="table">
                <?php
                $sql = $koneksi->query("SELECT * FROM tb_mahasiswa WHERE nim='".$_GET['kode']."'");
                while ($data = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td>ID Mahasiswa</td>
                        <td>:</td>
                        <td><?php echo $data['nim']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $data['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo $data['jekel']; ?></td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>:</td>
                        <td><?php echo $data['prodi']; ?></td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>:</td>
                        <td><?php echo $data['no_hp']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Modal Preview -->
    <div class="modal" id="previewModal">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Preview Print</h4>
                <button type="button" class="btn" onclick="closePreview()">Close</button>
            </div>
            <div id="previewContent"></div>
            <div class="modal-footer">
                <button type="button" class="btn" onclick="printDiv('previewContent')">Print</button>
            </div>
        </div>
    </div>

    <script>
        function showPreview() {
            var previewContent = document.getElementById('printableArea').innerHTML;
            document.getElementById('previewContent').innerHTML = previewContent;
            document.getElementById('previewModal').style.display = 'flex';
        }

        function closePreview() {
            document.getElementById('previewModal').style.display = 'none';
        }

        function printDiv(divName) {
            var printWindow = window.open('', '_blank');
            var printContents = document.getElementById(divName).innerHTML;
            printWindow.document.write('<html><head><title>Print</title></head><body>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>
</html>
