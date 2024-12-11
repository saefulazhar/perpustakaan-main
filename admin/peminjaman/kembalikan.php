<?php

    if(isset($_GET['kode'])){
    $sql_ubah = "UPDATE tb_peminjaman SET status='KEM' WHERE id_pinjam='".$_GET['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Kembalikan Buku Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data_peminjaman';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Kembalikan Buku Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data_peminjaman';
            }
        })</script>";
    }
	}
