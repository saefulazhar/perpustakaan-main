<section class="content-header">
	<h1>
		Riwayat Kembali Buku
	</h1>
</section>

<div class="btn-log">
			<a href="?page=log_pinjam" title="Log Pinjam" class="btn-pinjam">
			<ion-icon name="arrow-up" class="icon-log"></ion-icon>Log Pinjam</a>
</div>
<div class="btn-log">
			<a href="?page=log_kembali" title="Log Kembali" class="btn-kembali">
			<ion-icon name="arrow-down" class="icon-log"></ion-icon>Log Kembali</a>
</div>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
			
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Buku</th>
							<th>Peminjam</th>
							<th>Tgl Di kembalikan</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT b.judul_buku, a.id_anggota, a.nama, s.tgl_kembali, s.tgl_dikembalikan
                  from tb_peminjaman s inner join tb_buku b on s.id_buku=b.id_buku
				  inner join tb_mahasiswa a on s.id_anggota=a.id_anggota where status='KEM' order by tgl_kembali asc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['judul_buku']; ?>
							</td>
							<td>
								<?php echo $data['id_anggota']; ?>
								-
								<?php echo $data['nama']; ?>
							</td>
							<td>
							<?php  $tgl = $data['tgl_dikembalikan']; echo date("d/M/Y", strtotime($tgl))?>
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

