<section class="content-header">
	<h1>
		Kelola Buku
	</h1>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header ">
			<a href="?page=MyApp/add_buku" title="Tambah Data" class="btn btn-primary">
			<ion-icon name="add-circle" class="icon-top"></ion-icon>Tambah Data</a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Id Buku</th>
							<th>Judul Buku</th>
							<th>Pengarang</th>
							<th>Penerbit</th>
							<th>Tahun</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT * from tb_buku");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['id_buku']; ?>
							</td>
							<td>
								<?php echo $data['judul_buku']; ?>
							</td>
							<td>
								<?php echo $data['pengarang']; ?>
							</td>
							<td>
								<?php echo $data['penerbit']; ?>
							</td>
							<td>
								<?php echo $data['th_terbit']; ?>
							</td>

							<td>
								<a href="?page=MyApp/edit_buku&kode=<?php echo $data['id_buku']; ?>" title="Ubah"
								 class="btn-success btn-action">
								 <ion-icon name="create"></ion-icon>
								</a>
								<a href="?page=MyApp/del_buku&kode=<?php echo $data['id_buku']; ?>" onclick="return confirm('Yakin Hapus Data Ini ?')"
								 title="Hapus" class="btn-danger btn-action">
								 <ion-icon name="trash"></ion-icon>
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