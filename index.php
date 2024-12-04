<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>UNILIB</title>
	<link rel="icon" href="asset/image/logo-unilib.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="style.css">


	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

	<!--  Font Awesome  -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
	<!-- Ionicons -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/select2.min.css">


	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
	<!-- Site container -->
	<div class="container">

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<section class="sidebar">

				<!-- sidebar header -->
				<div class="header-sidebar">
					<!-- Logo -->
					<div class="logo">
						<a href="index.php">
							<span class="logo-lg">
								<img src="asset/image/logo-unilib.png">
								<p class="judul-logo">UNIVERSITY LIBRARY</p>
							</span>
						</a>
					</div>
	
	
					<!-- Sidebar user panel -->
					<div class="user-panel">
						<div class="admin-image">
							<img src="asset/image/admin.png" class="img-circle" alt="User Image">
						</div>
						<div class="user-name">
							<p>
								<?php echo $data_nama; ?>
							</p>
							<span class="user-status">
								<?php echo $data_level; ?>
							</span>
						</div>
					</div>
				</div>

				<!-- Sidebar menu -->
				<div class="menu-sidebar">

					<ul class="sidebar">
						<li class="title">MAIN NAVIGATION</li>
	
						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
						?>
	
							<li class="menu">
								<a href="?page=admin">
								<ion-icon name="grid"></ion-icon>
									<span class="description">Dashboard</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
	
							<li class="menu">
								<a href="?page=data_sirkul">
								<ion-icon name="swap-vertical"></ion-icon>
									<span class="description">Peminjaman</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>

							<li class="menu">
									<a href="?page=MyApp/data_buku">
									<ion-icon name="library"></ion-icon>
									<span class="description">Kelola Buku</span>
									<span class="pull-right-container">
									</span>
								</a>
	
							<li class="menu">
									<a href="?page=MyApp/data_agt">
									<ion-icon name="people"></ion-icon>
									<span class="description">Kelola Mahasiswa</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
	
							<li class="menu">
								<a href="?page=log_pinjam">
								<ion-icon name="file-tray-full"></ion-icon>
									<span class="description">Log Peminjaman</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
	
	
							<li class="menu">
								<a href="?page=laporan_sirkulasi">
								<ion-icon name="document"></ion-icon>
									<span class="description">Laporan Peminjaman</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
	
	
							<li class="title">SETTING</li>
	
							<li class="menu">
								<a href="?page=MyApp/data_pengguna">
								<ion-icon name="person-circle"></ion-icon>
									<span class="description">Pengguna Sistem</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
	
						<?php
						} elseif ($data_level == "Petugas") {
						?>
	
	<li class="menu">
								<a href="?page=admin">
								<ion-icon name="grid"></ion-icon>
									<span class="description">Dashboard</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
	
							<li class="menu">
								<a href="?page=data_sirkul">
								<ion-icon name="swap-vertical"></ion-icon>
									<span class="description">Peminjaman</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>

							<li class="menu">
									<a href="?page=MyApp/data_buku">
									<ion-icon name="library"></ion-icon>
									<span class="description">Kelola Buku</span>
									<span class="pull-right-container">
									</span>
								</a>
	
							<li class="menu">
									<a href="?page=MyApp/data_agt">
									<ion-icon name="people"></ion-icon>
									<span class="description">Kelola Anggota</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
	
							<li class="menu">
								<a href="?page=log_pinjam">
								<ion-icon name="file-tray-full"></ion-icon>
									<span class="description">Log Peminjaman</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
	
	
							<li class="menu">
								<a href="?page=laporan_sirkulasi">
								<ion-icon name="document"></ion-icon>
									<span class="description">Laporan Peminjaman</span>
									<span class="pull-right-container">
									</span>
								</a>
							</li>
	
							<li class="title">SETTING</li>
	
						<?php
						}
						?>
	
						<li class="menu">
							<a href="logout.php" onclick="return confirm('Anda yakin keluar dari aplikasi ?')">
							<ion-icon name="log-out"></ion-icon>
								<span class="description">Logout</span>
								<span class="pull-right-container"></span>
							</a>
						</li>
				</div>

			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<?php
				if (isset($_GET['page'])) {
					$hal = $_GET['page'];

					switch ($hal) {
							//Klik Halaman Home Pengguna
						case 'admin':
							include "home/admin.php";
							break;
						case 'petugas':
							include "home/petugas.php";
							break;

							//Pengguna
						case 'MyApp/data_pengguna':
							include "admin/pengguna/data_pengguna.php";
							break;
						case 'MyApp/add_pengguna':
							include "admin/pengguna/add_pengguna.php";
							break;
						case 'MyApp/edit_pengguna':
							include "admin/pengguna/edit_pengguna.php";
							break;
						case 'MyApp/del_pengguna':
							include "admin/pengguna/del_pengguna.php";
							break;


							//agt
						case 'MyApp/data_agt':
							include "admin/agt/data_agt.php";
							break;
						case 'MyApp/add_agt':
							include "admin/agt/add_agt.php";
							break;
						case 'MyApp/edit_agt':
							include "admin/agt/edit_agt.php";
							break;
						case 'MyApp/del_agt':
							include "admin/agt/del_agt.php";
							break;
						case 'MyApp/print_agt':
							include "admin/agt/print_agt.php";
							break;
						case 'MyApp/print_allagt':
							include "admin/agt/print_allagt.php";
							break;


							//buku
						case 'MyApp/data_buku':
							include "admin/buku/data_buku.php";
							break;
						case 'MyApp/add_buku':
							include "admin/buku/add_buku.php";
							break;
						case 'MyApp/edit_buku':
							include "admin/buku/edit_buku.php";
							break;
						case 'MyApp/del_buku':
							include "admin/buku/del_buku.php";
							break;

							//sirkul
						case 'data_sirkul':
							include "admin/sirkul/data_sirkul.php";
							break;
						case 'add_sirkul':
							include "admin/sirkul/add_sirkul.php";
							break;
						case 'panjang':
							include "admin/sirkul/panjang.php";
							break;
						case 'kembali':
							include "admin/sirkul/kembali.php";
							break;

							//log
						case 'log_pinjam':
							include "admin/log/log_pinjam.php";
							break;
						case 'log_kembali':
							include "admin/log/log_kembali.php";
							break;

							//laporan
						case 'laporan_sirkulasi':
							include "admin/laporan/laporan_sirkulasi.php";
							break;
						case 'MyApp/print_laporan':
							include "admin/laporan/print_laporan.php";
							break;



							//default
						default:
							echo "<center><br><br><br><br><br><br><br><br><br>
				  <h1> Halaman tidak ditemukan !</h1></center>";
							break;
					}
				} else {
					// Auto Halaman Home Pengguna
					if ($data_level == "Administrator") {
						include "home/admin.php";
					} elseif ($data_level == "Petugas") {
						include "home/petugas.php";
					}
				}
				?>

			</section>
			<!-- /.content -->
		</div>
	</div>

		<!-- jQuery 2.2.3 -->
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

		<script src="plugins/select2/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>


		<script>
			$(function() {
				$("#example1").DataTable({
					columnDefs: [{
						"defaultContent": "-",
						"targets": "_all"
					}]
				});
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
			});
		</script>

		<script>
			$(function() {
				//Initialize Select2 Elements
				$(".select2").select2();
			});
		</script>


	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
