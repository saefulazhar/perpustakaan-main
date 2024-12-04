<section class="content-header">
	<h1>
		Pengguna Sistem
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<a href="?page=MyApp/add_pengguna" class="btn btn-primary">
			<ion-icon name="add-circle" class="icon-top"></ion-icon>Tambah Data</a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Level</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("select * from tb_pengguna");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nama_pengguna']; ?>
							</td>
							<td>
								<?php echo $data['username']; ?>
							</td>
							<td>
								<?php echo $data['level']; ?>
							</td>
							<td>
								<a href="?page=MyApp/edit_pengguna&kode=<?php echo $data['id_pengguna']; ?>"
								 title="Ubah" class="btn-success btn-action">
								 <ion-icon name="create"></ion-icon>
								</a>
								<a href="?page=MyApp/del_pengguna&kode=<?php echo $data['id_pengguna']; ?>"
								 onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn-danger btn-action">
								 <ion-icon name="trash"></ion-icon>
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