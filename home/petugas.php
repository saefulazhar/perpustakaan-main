<?php
	$sql = $koneksi->query("SELECT count(id_buku) as buku from tb_buku");
	while ($data= $sql->fetch_assoc()) {
	
		$buku=$data['buku'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_anggota) as agt from tb_anggota");
	while ($data= $sql->fetch_assoc()) {
	
		$agt=$data['agt'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_sk) as pin from tb_sirkulasi where status='PIN'");
	while ($data= $sql->fetch_assoc()) {
	
		$pin=$data['pin'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_sk) as kem from tb_sirkulasi where status='KEM'");
	while ($data= $sql->fetch_assoc()) {
	
		$kem=$data['kem'];
	}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Petugas</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row card-container">

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<div class="text">
					<h4>
						<?= $buku; ?>
					</h4>
					<p>Jumlah Buku</p>
					</div>
					<div class="icon">
					<ion-icon name="library"></ion-icon>
					</div>
				</div>
				<a href="?page=MyApp/data_buku" class="small-box-footer">More info
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<div class="text">
						<h4>
							<?= $agt; ?>
						</h4>
						<p>Jumlah Anggota</p>
					</div>
					<div class="icon">
					<ion-icon name="people"></ion-icon>
					</div>
				</div>
				<a href="?page=MyApp/data_agt" class="small-box-footer">More info
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<div class="text">
						<h4>
							<?= $pin; ?>
						</h4>
						<p>Jumlah Peminjaman</p>
					</div>
					<div class="icon">
					<ion-icon name="swap-vertical"></ion-icon>
					</div>
				</div>
				<a href="?page=data_sirkul" class="small-box-footer">More info
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<div class="text">
						<h4>
							<?= $kem; ?>
						</h4>
						<p>Laporan Sirkulasi</p>
					</div>
					<div class="icon">
					<ion-icon name="document"></ion-icon>
					</div>
				</div>
				<a href="?page=log_kembali" class="small-box-footer">More info
				</a>
			</div>
		</div>