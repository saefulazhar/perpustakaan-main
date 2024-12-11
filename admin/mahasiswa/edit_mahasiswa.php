<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_mahasiswa WHERE nim='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
		Kelola Mahasiswa
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12 form-style">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header ">
					<h3 class="box-title">Ubah Data Mahasiswa</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<label>Id Mahasiswa</label>
							<input type='text' class="form-control" name="nim" value="<?php echo $data_cek['nim']; ?>"
							 readonly/>
						</div>

						<div class="form-group">
							<label>Nama</label>
							<input type='text' class="form-control" name="nama" value="<?php echo $data_cek['nama']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jekel" id="jekel" class="form-control" required>
								<option value="">-- Pilih --</option>
								<?php
                                //cek data yg dipilih sebelumnya
                                if ($data_cek['jekel'] == "Laki-laki") echo "<option value='Laki-laki' selected>Laki-laki</option>";
                                else echo "<option value='Laki-laki'>Laki-laki</option>";
                                
                                if ($data_cek['jekel'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                                else echo "<option value='Perempuan'>Perempuan</option>";
                            ?>
							</select>
						</div>

						<div class="form-group">
							<label>Prodi</label>
							<select name="prodi" id="prodi" class="form-control" required>
								<option>-- Pilih --</option>
								<option>Informatika</option>
								<option>Sistem Informasi</option>
								<option>Akuntansi</option>
								<option>Manajemen</option>
								<option>Keperawatan</option>
								<option>Kebidanan</option>
								<option>Profesi Ners</option>
							</select>
						</div>

						<div class="form-group">
							<label>No HP</label>
							<input type='number' class="form-control" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>"
							/>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_mahasiswa" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE tb_mahasiswa SET
		nama='".$_POST['nama']."',
		jekel='".$_POST['jekel']."',
		prodi='".$_POST['prodi']."',
        no_hp='".$_POST['no_hp']."'
        WHERE nim='".$_POST['nim']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_mahasiswa';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=MyApp/data_mahasiswa';
            }
        })</script>";
    }
}

