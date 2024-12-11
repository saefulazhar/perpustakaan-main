<link rel="stylesheet" href="style.css">

<section class="content-header">
	<h1>
		Kelola Mahasiswa
	</h1>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header ">
			<a href="?page=MyApp/add_mahasiswa" title="Tambah Data" class="btn btn-primary">
			<ion-icon name="add-circle" class="icon-top"></ion-icon>Tambah Data</a>
			<a href="?page=MyApp/print_allmahasiswa" title="Print" class="btn btn-success">
			<ion-icon name="print" class="icon-top"></ion-icon>Print</a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Nama</th>
							<th>JK</th>
							<th>prodi</th>
							<th>No HP</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

				<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_mahasiswa");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nim']; ?>
							</td>
							<td>
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php echo $data['jekel']; ?>
							</td>
							<td>
								<?php echo $data['prodi']; ?>
							</td>
							<td>
								<?php echo $data['no_hp']; ?>
							</td>

							<td>
								<a href="?page=MyApp/edit_mahasiswa&kode=<?php echo $data['nim']; ?>" title="Ubah Data"
								 class="btn-success btn-action">
								 <ion-icon name="create"></ion-icon>
								</a>

								<a href="?page=MyApp/del_mahasiswa&kode=<?php echo $data['nim']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn-danger btn-action">
								 <ion-icon name="trash"></ion-icon>
				 				 </a>

								<a href="?page=MyApp/print_mahasiswa&kode=<?php echo $data['nim'] ?>" title="print"
								 target="_blank" class="btn-primary btn-action">
								 <ion-icon name="print"></ion-icon>
								</a>
								
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>