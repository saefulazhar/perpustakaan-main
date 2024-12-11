-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for university_library
CREATE DATABASE IF NOT EXISTS `university_library` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `university_library`;

-- Dumping structure for table university_library.log_pinjam
CREATE TABLE IF NOT EXISTS `log_pinjam` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` varchar(10) NOT NULL,
  `nim` varchar(16) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `id_buku` (`id_buku`),
  KEY `id_anggota` (`nim`) USING BTREE,
  CONSTRAINT `log_pinjam_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `log_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table university_library.log_pinjam: ~1 rows (approximately)
INSERT INTO `log_pinjam` (`id_log`, `id_buku`, `nim`, `tgl_pinjam`) VALUES
	(8, 'B032', '4337855201230013', '2024-12-11');

-- Dumping structure for table university_library.tb_buku
CREATE TABLE IF NOT EXISTS `tb_buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(30) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `th_terbit` year(4) NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table university_library.tb_buku: ~55 rows (approximately)
INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `th_terbit`) VALUES
	('B001', 'Pemrograman Dasar', 'Budi Raharjo', 'Erlangga', '2019'),
	('B002', 'Manajemen Keuangan', 'Siti Aminah', 'Gramedia', '2018'),
	('B003', 'Panduan Sistem Informasi', 'Rifqi Ahmad', 'Andi Offset', '2020'),
	('B004', 'Dasar-dasar Akuntansi', 'Dewi Kusuma', 'Salemba Empat', '2017'),
	('B005', 'Farmakologi Dasar', 'Tri Andayani', 'Airlangga', '2015'),
	('B006', 'Pengantar Data Science', 'Teguh Prasetyo', 'Andi Offset', '2021'),
	('B007', 'Jaringan Komputer', 'Ali Hidayat', 'Erlangga', '2020'),
	('B008', 'Metodologi Penelitian', 'Hendra Kusuma', 'Gramedia', '2016'),
	('B009', 'Analisis Sistem Informasi', 'Rina Dewi', 'Salemba Empat', '2018'),
	('B010', 'Algoritma Pemrograman', 'Budi Santoso', 'Erlangga', '2017'),
	('B011', 'Dasar Manajemen', 'Wahyu Firmansyah', 'Airlangga', '2019'),
	('B012', 'Ekonomi Mikro', 'Dewi Anisa', 'Gramedia', '2016'),
	('B013', 'Pemrograman Web', 'Siti Rahmawati', 'Andi Offset', '2022'),
	('B014', 'Kalkulus Dasar', 'Rizky Fauzi', 'Salemba Empat', '2018'),
	('B015', 'Pengantar Basis Data', 'Fikri Setiawan', 'Erlangga', '2020'),
	('B016', 'Psikologi Pendidikan', 'Dian Permana', 'Airlangga', '2015'),
	('B017', 'Organisasi dan Arsitektur Komp', 'Ali Fikri', 'Andi Offset', '2017'),
	('B018', 'Pengantar Statistika', 'Hendra Saputra', 'Gramedia', '2018'),
	('B019', 'Manajemen Proyek', 'Rina Puspita', 'Salemba Empat', '2020'),
	('B020', 'Pengenalan Machine Learning', 'Yusuf Hidayat', 'Erlangga', '2022'),
	('B021', 'Sistem Operasi', 'Dody Santoso', 'Gramedia', '2019'),
	('B022', 'Matematika Diskrit', 'Bagas Pratama', 'Salemba Empat', '2016'),
	('B023', 'Pengantar Keperawatan', 'Tina Safitri', 'Airlangga', '2020'),
	('B024', 'Buku Keuangan Dasar', 'Nina Rosita', 'Gramedia', '2017'),
	('B025', 'Statistik untuk Bisnis', 'Eko Purnomo', 'Salemba Empat', '2018'),
	('B026', 'Sistem Basis Data', 'Ahmad Fauzan', 'Andi Offset', '2021'),
	('B027', 'Robotika Dasar', 'Yusuf Nugraha', 'Erlangga', '2019'),
	('B028', 'Manajemen Perawatan', 'Dian Fitri', 'Airlangga', '2016'),
	('B029', 'Analisa Keuangan', 'Citra Kusuma', 'Gramedia', '2017'),
	('B030', 'Etika Profesi', 'Ratna Dewi', 'Salemba Empat', '2018'),
	('B031', 'Dasar Akuntansi Lanjutan', 'Hendra Kusuma', 'Andi Offset', '2021'),
	('B032', 'Pemrograman Berorientasi Objek', 'Fajar Setiawan', 'Erlangga', '2019'),
	('B033', 'Pemrograman Berorientasi Objek', 'Budi Setiawan', 'Andi Offset', '2022'),
	('B034', 'Pengantar Data Mining', 'Tri Andayani', 'Erlangga', '2021'),
	('B035', 'Teknik Kompilasi', 'Rifqi Prasetyo', 'Gramedia', '2018'),
	('B036', 'Desain UI/UX', 'Ali Hidayat', 'Salemba Empat', '2020'),
	('B037', 'Komunikasi Data', 'Siti Kusuma', 'Andi Offset', '2019'),
	('B038', 'Manajemen Risiko', 'Dewi Wulandari', 'Airlangga', '2017'),
	('B039', 'Sistem Pendukung Keputusan', 'Bagas Santoso', 'Erlangga', '2021'),
	('B040', 'Keamanan Jaringan', 'Rizky Maulana', 'Gramedia', '2022'),
	('B041', 'Manajemen Pemasaran', 'Dian Permana', 'Salemba Empat', '2019'),
	('B042', 'Machine Learning untuk Pemula', 'Teguh Prasetyo', 'Andi Offset', '2023'),
	('B043', 'Pemrograman Python', 'Ahmad Fauzan', 'Erlangga', '2020'),
	('B044', 'Kecerdasan Buatan', 'Fikri Hidayat', 'Gramedia', '2021'),
	('B045', 'Ekonomi Makro', 'Hendra Saputra', 'Salemba Empat', '2018'),
	('B046', 'Pengantar Manajemen', 'Rina Puspita', 'Airlangga', '2016'),
	('B047', 'E-Business', 'Citra Ayu', 'Erlangga', '2020'),
	('B048', 'Pengembangan Aplikasi Mobile', 'Farhan Pratama', 'Gramedia', '2022'),
	('B049', 'Dasar-dasar Pengolahan Citra', 'Ali Fikri', 'Salemba Empat', '2019'),
	('B050', 'Jaringan Komputer Lanjutan', 'Yusuf Hidayat', 'Andi Offset', '2021'),
	('B051', 'Analisis Algoritma', 'Rina Safitri', 'Airlangga', '2017'),
	('B052', 'Manajemen Logistik', 'Eko Prasetyo', 'Gramedia', '2020'),
	('B053', 'Pengantar Cloud Computing', 'Bayu Setiawan', 'Salemba Empat', '2022'),
	('B054', 'Desain Sistem Digital', 'Lia Utami', 'Erlangga', '2020'),
	('B055', 'Arsitektur Jaringan', 'Hafiz Alamsyah', 'Andi Offset', '2019');

-- Dumping structure for table university_library.tb_mahasiswa
CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `nim` varchar(16) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `prodi` enum('Informatika','Sistem Informasi','Akuntansi','Manajemen','Keperawatan','Kebidanan','Profesi Ners') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  PRIMARY KEY (`nim`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table university_library.tb_mahasiswa: ~40 rows (approximately)
INSERT INTO `tb_mahasiswa` (`nim`, `nama`, `jekel`, `prodi`, `no_hp`) VALUES
	('4337855201230001', 'Ahmad Fauzan', 'Laki-laki', 'Informatika', '081234567890'),
	('4337855201230002', 'Dewi Lestari', 'Perempuan', 'Sistem Informasi', '081345678901'),
	('4337855201230003', 'Rizky Maulana', 'Laki-laki', 'Akuntansi', '081456789012'),
	('4337855201230004', 'Siti Nurhaliza', 'Perempuan', 'Keperawatan', '081567890123'),
	('4337855201230005', 'Bayu Setiawan', 'Laki-laki', 'Informatika', '081678901234'),
	('4337855201230006', 'Ani Susanti', 'Perempuan', 'Kebidanan', '081789012345'),
	('4337855201230007', 'Farhan Pratama', 'Laki-laki', 'Informatika', '081890123456'),
	('4337855201230008', 'Mira Kusuma', 'Perempuan', 'Akuntansi', '081901234567'),
	('4337855201230009', 'Rendi Saputra', 'Laki-laki', 'Manajemen', '082012345678'),
	('4337855201230010', 'Sofia Ananda', 'Perempuan', 'Keperawatan', '082123456789'),
	('4337855201230011', 'Arif Budiman', 'Laki-laki', 'Sistem Informasi', '082234567890'),
	('4337855201230012', 'Citra Ayu', 'Perempuan', 'Kebidanan', '082345678901'),
	('4337855201230013', 'Fajar Nugraha', 'Laki-laki', 'Informatika', '082456789012'),
	('4337855201230014', 'Lia Utami', 'Perempuan', 'Akuntansi', '082567890123'),
	('4337855201230015', 'Hendra Setiawan', 'Laki-laki', 'Manajemen', '082678901234'),
	('4337855201230016', 'Tina Sari', 'Perempuan', 'Kebidanan', '082789012345'),
	('4337855201230017', 'Yusuf Maulana', 'Laki-laki', 'Profesi Ners', '082890123456'),
	('4337855201230018', 'Rika Damayanti', 'Perempuan', 'Keperawatan', '082901234567'),
	('4337855201230019', 'Eko Prasetyo', 'Laki-laki', 'Sistem Informasi', '083012345678'),
	('4337855201230020', 'Intan Amelia', 'Perempuan', 'Akuntansi', '083123456789'),
	('4337855201230021', 'Dian Firmansyah', 'Laki-laki', 'Informatika', '083234567890'),
	('4337855201230022', 'Ratna Dewi', 'Perempuan', 'Kebidanan', '083345678901'),
	('4337855201230023', 'Andre Wijaya', 'Laki-laki', 'Manajemen', '083456789012'),
	('4337855201230024', 'Nina Rahmawati', 'Perempuan', 'Keperawatan', '083567890123'),
	('4337855201230025', 'Bagas Pratama', 'Laki-laki', 'Sistem Informasi', '083678901234'),
	('4337855201230026', 'Putri Melati', 'Perempuan', 'Akuntansi', '083789012345'),
	('4337855201230027', 'Dody Santoso', 'Laki-laki', 'Informatika', '083890123456'),
	('4337855201230028', 'Ayu Larasati', 'Perempuan', 'Kebidanan', '083901234567'),
	('4337855201230029', 'Hafiz Alamsyah', 'Laki-laki', 'Manajemen', '084012345678'),
	('4337855201230030', 'Maya Puspita', 'Perempuan', 'Keperawatan', '084123456789'),
	('4337855201230031', 'Reza Wahyu', 'Laki-laki', 'Sistem Informasi', '084234567890'),
	('4337855201230032', 'Ika Rosita', 'Perempuan', 'Akuntansi', '084345678901'),
	('4337855201230033', 'Fikri Hidayat', 'Laki-laki', 'Informatika', '084456789012'),
	('4337855201230034', 'Mira Novita', 'Perempuan', 'Kebidanan', '084567890123'),
	('4337855201230035', 'Deni Purnama', 'Laki-laki', 'Manajemen', '084678901234'),
	('4337855201230036', 'Rina Safitri', 'Perempuan', 'Keperawatan', '084789012345'),
	('4337855201230037', 'Gilang Ramadhan', 'Laki-laki', 'Profesi Ners', '084890123456'),
	('4337855201230038', 'Aulia Rahmi', 'Perempuan', 'Sistem Informasi', '084901234567'),
	('4337855201230039', 'Syahrul Fadli', 'Laki-laki', 'Informatika', '085012345678'),
	('4337855201230040', 'Fahmi Hidayat', 'Laki-laki', 'Manajemen', '081998877665');

-- Dumping structure for table university_library.tb_peminjaman
CREATE TABLE IF NOT EXISTS `tb_peminjaman` (
  `id_pinjam` varchar(20) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `nim` varchar(16) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('PIN','KEM') NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  PRIMARY KEY (`id_pinjam`) USING BTREE,
  KEY `id_buku` (`id_buku`),
  KEY `id_anggota` (`nim`) USING BTREE,
  CONSTRAINT `tb_peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tb_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table university_library.tb_peminjaman: ~11 rows (approximately)
INSERT INTO `tb_peminjaman` (`id_pinjam`, `id_buku`, `nim`, `tgl_pinjam`, `tgl_kembali`, `status`, `tgl_dikembalikan`) VALUES
	('P001', 'B001', '4337855201230001', '2024-12-01', '2024-12-08', 'PIN', '0000-00-00'),
	('P002', 'B013', '4337855201230002', '2024-12-03', '2024-12-10', 'PIN', '0000-00-00'),
	('P003', 'B007', '4337855201230003', '2024-12-02', '2024-12-09', 'PIN', '0000-00-00'),
	('P004', 'B025', '4337855201230004', '2024-12-04', '2024-12-11', 'PIN', '0000-00-00'),
	('P005', 'B020', '4337855201230005', '2024-12-05', '2024-12-12', 'PIN', '0000-00-00'),
	('P006', 'B023', '4337855201230006', '2024-12-06', '2024-12-13', 'PIN', '0000-00-00'),
	('P007', 'B002', '4337855201230007', '2024-12-07', '2024-12-14', 'PIN', '0000-00-00'),
	('P008', 'B015', '4337855201230008', '2024-12-08', '2024-12-15', 'KEM', '2024-12-11'),
	('P009', 'B005', '4337855201230009', '2024-12-09', '2024-12-16', 'PIN', '0000-00-00'),
	('P010', 'B018', '4337855201230010', '2024-12-10', '2024-12-17', 'PIN', '0000-00-00'),
	('P011', 'B032', '4337855201230013', '2024-12-11', '2024-12-18', 'KEM', '2024-12-11');

-- Dumping structure for table university_library.tb_pengguna
CREATE TABLE IF NOT EXISTS `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` enum('Administrator','Petugas','','') NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table university_library.tb_pengguna: ~1 rows (approximately)
INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
	(1, 'Admin name', 'admin', '202cb962ac59075b964b07152d234b70', 'Administrator');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
