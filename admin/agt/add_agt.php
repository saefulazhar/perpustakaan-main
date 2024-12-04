<?php
//kode 9 digit
  
$carikode = mysqli_query($koneksi, "SELECT id_anggota FROM tb_mahasiswa ORDER BY id_anggota DESC");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_anggota'];
$urut = substr($kode, 1, 3);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1) {
    $format = "A" . "00" . $tambah;
} else if (strlen($tambah) == 2) {
    $format = "A" . "0" . $tambah;
} else { // Default case untuk 3 digit
    $format = "A" . $tambah;
}
?>



<section class="content">
	<div class="row">
		<div class="col-md-12 form-tambah-buku">
			<!-- general form elements -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah anggota</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>ID anggota</label>
							<input type="text" name="id_anggota" id="id_anggota" class="form-control" value="<?php echo $format; ?>"
							 readonly/>
						</div>

						<div class="form-group">
							<label>Nama Anggota</label>
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Anggota">
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jekel" id="jekel" class="form-control" required>
								<option>-- Pilih --</option>
								<option>Laki-laki</option>
								<option>Perempuan</option>
							</select>
						</div>

						<div class="form-group">
							<label>prodi</label>
							<input type="text" name="prodi" id="prodi" class="form-control" placeholder="prodi">
						</div>

						<div class="form-group">
							<label>No HP</label>
							<input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="No HP">
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
						<a href="?page=MyApp/data_agt" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>

<?php

    if (isset ($_POST['Simpan'])){
    
        $sql_simpan = "INSERT INTO tb_mahasiswa (id_anggota,nama,jekel,prodi,no_hp) VALUES (
           '".$_POST['id_anggota']."',
          '".$_POST['nama']."',
          '".$_POST['jekel']."',
          '".$_POST['prodi']."',
          '".$_POST['no_hp']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan){

      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_agt';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/add_agt';
          }
      })</script>";
    }
  }
    
