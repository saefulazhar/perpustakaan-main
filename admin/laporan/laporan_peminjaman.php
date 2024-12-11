<section class="content-header">
	<h1>
		Laporan Peminjaman
	</h1>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header ">
		<a href="?page=MyApp/print_laporan" title="Print" class="btn btn-success">
		<ion-icon name="print" class="icon-top"></ion-icon>Print</a>
		</div>
		<!-- /.box-header -->

		
		<div class="box-body">
			<div class="table-responsive">
			
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Pinjam</th>
							<th>Buku</th>
							<th>Peminjam</th>
							<th>Tgl Pinjam</th>
							<th>Jatuh Tempo</th>
							<th>Tgl dikembalikan</th>
							<th>Denda</th>
							
						</tr>
					</thead>
				<tbody>

				<?php

				$sql = mysqli_query($koneksi, "
				SELECT 
					tb_peminjaman.id_buku, 
					tb_buku.judul_buku, 
					tb_mahasiswa.nim,
					tb_mahasiswa.nama,
					tb_peminjaman.id_pinjam,
					tb_peminjaman.tgl_pinjam,
					tb_peminjaman.tgl_kembali,
					tb_peminjaman.tgl_dikembalikan,
					IF(DATEDIFF(NOW(), tb_peminjaman.tgl_kembali) <= 0, 0, DATEDIFF(NOW(), tb_peminjaman.tgl_kembali)) AS telat_pengembalian 
				FROM tb_peminjaman 
				JOIN tb_mahasiswa ON tb_mahasiswa.nim = tb_peminjaman.nim 
				JOIN tb_buku ON tb_buku.id_buku = tb_peminjaman.id_buku 
				WHERE tb_peminjaman.status = 'KEM'
				ORDER BY nim
				");

				$no =null;
				$total_denda=null;
				$tarif_denda=1000;
                while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
					$no++;
					$total_denda=$total_denda+($data['telat_pengembalian']*$tarif_denda);
					echo '<tr>
						<td>'.$no.'</td>
						<td>'.$data['id_pinjam'].'</td>
						<td>'.$data['judul_buku'].'</td>
				
						<td>'.$data['nama'].'</td>
						<td>'.date_format(new DateTime($data['tgl_pinjam']),'d/M/Y').'</td>
						<td>'.date_format(new DateTime($data['tgl_kembali']),'d/M/Y').'</td>
						<td>'.date_format(new DateTime($data['tgl_dikembalikan']),'d/M/Y').'</td>
						<td>Rp. '.number_format($data['telat_pengembalian']*$tarif_denda,0,',','.').'</td>
						</tr>';
				}

				if (!$sql) {
					die("Error in query: " . mysqli_error($koneksi));
				}
				
				?>
				<tr>
					<th colspan="8" style="text-align:right; padding-right:0.90cm;">
					Total Denda Rp. <?php echo number_format($total_denda,0,',','.');?>
					</th>
				
				</tr>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>

