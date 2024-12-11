<?php
//kode 9 digit
  
$carikode = mysqli_query($koneksi,"SELECT id_pinjam FROM tb_peminjaman order by id_pinjam desc");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_pinjam'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1) {
    $format = "P" . "00" . $tambah;
} else if (strlen($tambah) == 2) {
    $format = "P" . "0" . $tambah;
} else { // else menangani strlen($tambah) == 3
    $format = "P" . $tambah;
}

?>

<section class="content-header">
	<h1>
		Peminjaman
		<small>Buku</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12 form-style">
			<!-- general form elements -->
			<div class="box box-info">
				<div class="box-header ">
					<h3 class="box-title">Tambah Peminjaman</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>Id Pinjam</label>
							<input type="text" name="id_pinjam" id="id_pinjam" class="form-control"
								value="<?php echo $format; ?>" readonly />
						</div>

						<div class="form-group">
							<label>Nama Peminjam</label>
							<select name="nim" id="nim" class="form-control select2" style="width: 100%;">
								<option selected="selected">-- Pilih --</option>
								<?php
								// ambil data dari database
								$query = "select * from tb_mahasiswa";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
								<option value="<?php echo $row['nim'] ?>">
									<?php echo $row['nim'] ?>
									-
									<?php echo $row['nama'] ?>
								</option>
								<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Buku</label>
							<select name="id_buku" id="id_buku" class="form-control select2" style="width: 100%;">
								<option selected="selected">-- Pilih --</option>
								<?php
								// ambil data dari database
								$query = "select * from tb_buku";
								$hasil = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($hasil)) {
								?>
								<option value="<?php echo $row['id_buku'] ?>">
									<?php echo $row['id_buku'] ?>
									-
									<?php echo $row['judul_buku'] ?>
								</option>
								<?php
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label>Tgl Pinjam</label>
							<input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" />
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=data_peminjaman" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

    if (isset ($_POST['Simpan'])){

		//menangkap post tgl pinjam
		$tgl_p=$_POST['tgl_pinjam'];
		//membuat tgl kembali
		$tgl_k=date('Y-m-d', strtotime('+7 days', strtotime($tgl_p)));
		$tgl_hk=date('Y-m-d');
    
        $sql_simpan = "INSERT INTO tb_peminjaman (id_pinjam,id_buku,nim,tgl_pinjam,status,tgl_kembali,tgl_dikembalikan) VALUES (
           '".$_POST['id_pinjam']."',
          '".$_POST['id_buku']."',
          '".$_POST['nim']."',
          '".$_POST['tgl_pinjam']."',
		  'PIN',
		  '".$tgl_k."',
		  '".$tgl_hk."');";
		$sql_simpan .= "INSERT INTO log_pinjam (id_buku,nim,tgl_pinjam) VALUES (
			'".$_POST['id_buku']."',
			'".$_POST['nim']."',
            '".$_POST['tgl_pinjam']."')";   
        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=data_peminjaman';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=add_peminjaman';
          }
      })</script>";
    }
  }
    