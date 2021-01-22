-- --------------------------------------------------------
-- Host:                         my-stage.cciibmbisxy8.ap-southeast-1.rds.amazonaws.com
-- Server version:               10.4.8-MariaDB - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for digilib
DROP DATABASE IF EXISTS `digilib`;
CREATE DATABASE IF NOT EXISTS `digilib` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `digilib`;

-- Dumping structure for table digilib.donasi
DROP TABLE IF EXISTS `donasi`;
CREATE TABLE IF NOT EXISTS `donasi` (
  `id_donasi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul_buku` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `pengarang` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `penerbit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tahun` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_donasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.donasi: ~0 rows (approximately)
DELETE FROM `donasi`;
/*!40000 ALTER TABLE `donasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `donasi` ENABLE KEYS */;

-- Dumping structure for table digilib.event
DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id_event` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul_event` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `keterngan` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.event: ~1 rows (approximately)
DELETE FROM `event`;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`id_event`, `judul_event`, `gambar`, `keterngan`, `tanggal`) VALUES
	('EV001', 'Kepala Perpustakaan MAN 2 Mojokerto Jadi Partisipan Pelatihan Digital Library', '../uploads/event/NPUAoI9rTyUAwikCKXlC.png', 'Kab. Mojokerto (MAN 2 Mojokerto) Kepala perpustakaan MAN 2 Mojokerto menjadi partisipan pelatihan perpustakaan berbasis digital dan online. Kegiatan ini diikuti dengan baik karena untuk meningkatkan pengelolaan dan pelayanan perpustakaan yang ada di MAN 2 Mojokerto yang sudah menerapkan perpustakaan secara digital. Kegiatan diklat ini sudah berjalan empat hari. Diklat ini dilakukan mulai hari kamis-senin (8-12/10) di Semarang.\r\n\r\nKeikutsertaan kepala perpustakaan MAN 2 Mojokerto ini diharapakan dapat meningkatkan pelayanan dan pengelolaan perpustakaan di MAN 2 Mojokerto berbasis digital dan online sehingga budaya literasi di MAN 2 Mojokerto dapat berkembang. â€œPerpustakaan MAN 2 Mojokerto sudah menerapkan secara pelayanan dan pengelolaannya secara digital, didukung dengan sarana dan prasarana di MAN 2 Mojokerto sehingga perpustakaan digital berjalan dengan baikâ€ Tutur Durotun Nisaâ€™ Kepala Perpustakaan MAN 2 Mojokerto yang mengikuti diklat pustakawan angkatan 1. Diklat ini diselenggarakan oleh Direktorat Guru dan Tenaga Kependidikan Kementerian Agama.', '2020-10-13');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;

-- Dumping structure for table digilib.jawaban
DROP TABLE IF EXISTS `jawaban`;
CREATE TABLE IF NOT EXISTS `jawaban` (
  `id_jawaban` varchar(10) DEFAULT NULL,
  `id_pertanyaan` varchar(10) DEFAULT NULL,
  `pilihan` varchar(1) DEFAULT NULL,
  `jawaban` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table digilib.jawaban: ~8 rows (approximately)
DELETE FROM `jawaban`;
/*!40000 ALTER TABLE `jawaban` DISABLE KEYS */;
INSERT INTO `jawaban` (`id_jawaban`, `id_pertanyaan`, `pilihan`, `jawaban`) VALUES
	('JW001', 'PT001', 'A', 'aulia'),
	('JW002', 'PT001', 'B', 'anda'),
	('JW003', 'PT001', 'C', 'dia'),
	('JW004', 'PT001', 'D', 'kami'),
	('JW005', 'PT002', 'A', 'Sholat'),
	('JW006', 'PT002', 'B', 'Tadarus'),
	('JW007', 'PT002', 'C', 'Puasa'),
	('JW008', 'PT002', 'D', 'Semua');
/*!40000 ALTER TABLE `jawaban` ENABLE KEYS */;

-- Dumping structure for table digilib.karyawan
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_karyawan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_karyawan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_karyawan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.karyawan: ~2 rows (approximately)
DELETE FROM `karyawan`;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` (`id_karyawan`, `id_pengguna`, `nama_karyawan`, `jabatan`, `alamat_karyawan`, `jenis_kelamin`, `status_karyawan`) VALUES
	('KA339', 'PA047', 'Rahmad Basuki', 'Guru', '', 'Laki-laki', 'Aktif'),
	('SI338', 'PA043', 'danil', 'admin', 'gph', 'Laki-laki', 'Aktif');
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;

-- Dumping structure for table digilib.kategori
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.kategori: ~17 rows (approximately)
DELETE FROM `kategori`;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
	('T001', 'Karya Umum'),
	('T002', 'Filsafat dan Psikologi'),
	('T003', 'Agama'),
	('T004', 'Ilmu Sosial'),
	('T005', 'Bahasa'),
	('T006', 'Ilmu Pasti/Alam'),
	('T007', 'Ilmu Terapan/Teknologi'),
	('T008', 'Kesenian\r\n'),
	('T009', 'Kesusasteraan'),
	('T011', 'Jurnal'),
	('T012', 'Buku Pelajaran'),
	('T013', 'kurang banyak'),
	('T014', 'komik'),
	('T015', 'novel'),
	('T016', 'Dongeng'),
	('T017', 'fabel'),
	('T018', 'Legenda');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table digilib.koleksi
DROP TABLE IF EXISTS `koleksi`;
CREATE TABLE IF NOT EXISTS `koleksi` (
  `id_koleksi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_kategori` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nama_pengarang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `penerbit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tahun_terbit` date NOT NULL,
  `cover` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_koleksi`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `koleksi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.koleksi: ~7 rows (approximately)
DELETE FROM `koleksi`;
/*!40000 ALTER TABLE `koleksi` DISABLE KEYS */;
INSERT INTO `koleksi` (`id_koleksi`, `id_kategori`, `judul`, `nama_pengarang`, `penerbit`, `tahun_terbit`, `cover`, `file`) VALUES
	('KL007', 'T003', 'Ensiklopedia Pahala Ibadah Penuh Dalam Al Quran dan As sunnah', 'Farid Abdul Aziz Al Jindi', 'Pustaka As Sunnah', '2003-07-21', '../uploads/koleksi/hyIvidzYFmaOsyiunAVS.png', '../uploads/file/OCFNpteNp3fxxcJN2uhvpdf'),
	('KL008', 'T001', 'Aku Anak Dunia', 'Anggota Remaja Aulia', 'Yayasan Aulia', '2014-02-17', '../uploads/koleksi/f6dMqzU14IaDc02BUKvJ.png', '../uploads/file/EGVJYOkcxJK41iTcM052pdf'),
	('KL009', 'T001', 'COVID-19 Tips Hadapi Tanpa Kekhawatiran', '', 'IDSMED', '2020-01-11', '../uploads/koleksi/n8TlAU1RGQxQt7tpowUR.png', '../uploads/file/V6gMwGIXB1rhPUWhIPXVpdf'),
	('KL010', 'T001', 'LITERASI GAME UNTUK REMAJA DAN DEWASA', 'YUDHA WIRAWANDA DAN SIDIQ SETYAWAN', 'lembayung embun candikala', '2018-09-20', '../uploads/koleksi/literasi game untuk remaja dan dewasa.PNG', '../uploads/file/GAME UNTUK REMAJA DAN DEWASA.pdf'),
	('KL011', 'T001', 'Enterpreneurship', 'Robert', '', '2017-07-21', '../uploads/koleksi/enterprenuership.PNG', '../uploads/file/ENTERPRENEURSHIP.pdf'),
	('KL012', 'T001', 'Literasi Digital bagi Millenial Moms', 'Indah Wenerda dan Intan Rawit Sapanti', 'Samudra Biru', '2019-02-01', '../uploads/koleksi/literasi.PNG', '../uploads/file/LITERASI DIGITAL BAGI MILLENIAL MOMS full cover.pdf'),
	('KL013', 'T001', 'Bijak Bersosmed', '', 'Indosat', '2017-01-01', '../uploads/koleksi/bijak bersosmed.PNG', '../uploads/file/BIJAK BERSOSMED.pdf');
/*!40000 ALTER TABLE `koleksi` ENABLE KEYS */;

-- Dumping structure for table digilib.kunjungan
DROP TABLE IF EXISTS `kunjungan`;
CREATE TABLE IF NOT EXISTS `kunjungan` (
  `id_kunjungan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `instansi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id_kunjungan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.kunjungan: ~3 rows (approximately)
DELETE FROM `kunjungan`;
/*!40000 ALTER TABLE `kunjungan` DISABLE KEYS */;
INSERT INTO `kunjungan` (`id_kunjungan`, `nama`, `instansi`, `status`, `keterangan`, `tgl`) VALUES
	('KUN001', 'daniel', 'stikom', 'Siswa', 'Peminjaman Buku', '2021-01-21'),
	('KUN002', 'danielaaa', 'stikom', 'Siswa', 'Belajar Bersama', '2021-01-21'),
	('KUN003', 'Trianita Agustin Rahmawati', 'MAN 2 Mojokerto', 'Siswa', 'Membaca Buku', '2021-01-21');
/*!40000 ALTER TABLE `kunjungan` ENABLE KEYS */;

-- Dumping structure for table digilib.log_baca
DROP TABLE IF EXISTS `log_baca`;
CREATE TABLE IF NOT EXISTS `log_baca` (
  `id_logbaca` int(11) NOT NULL,
  `id_koleksi` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `halaman_bacatg` int(11) NOT NULL,
  `tanggal_baca` date NOT NULL,
  PRIMARY KEY (`id_logbaca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.log_baca: ~3 rows (approximately)
DELETE FROM `log_baca`;
/*!40000 ALTER TABLE `log_baca` DISABLE KEYS */;
INSERT INTO `log_baca` (`id_logbaca`, `id_koleksi`, `id_pengguna`, `halaman_bacatg`, `tanggal_baca`) VALUES
	(1, 'KL009', 'PA043', 30, '2021-01-21'),
	(2, 'KL008', 'PA024', 6, '2021-01-21'),
	(3, 'KL013', 'PA043', 32, '2021-01-21');
/*!40000 ALTER TABLE `log_baca` ENABLE KEYS */;

-- Dumping structure for table digilib.log_quiz
DROP TABLE IF EXISTS `log_quiz`;
CREATE TABLE IF NOT EXISTS `log_quiz` (
  `id_logquiz` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pertanyaan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jawaban` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_jawab` date NOT NULL,
  `benar_salah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_logquiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.log_quiz: ~0 rows (approximately)
DELETE FROM `log_quiz`;
/*!40000 ALTER TABLE `log_quiz` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_quiz` ENABLE KEYS */;

-- Dumping structure for table digilib.lomba
DROP TABLE IF EXISTS `lomba`;
CREATE TABLE IF NOT EXISTS `lomba` (
  `id_lomba` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul_lomba` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `poster` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id_lomba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.lomba: ~1 rows (approximately)
DELETE FROM `lomba`;
/*!40000 ALTER TABLE `lomba` DISABLE KEYS */;
INSERT INTO `lomba` (`id_lomba`, `judul_lomba`, `poster`, `keterangan`, `tgl`) VALUES
	('LO001', 'lomba mewarna', '../uploads/lomba/Nobar Dua Garis Biru_210101.jpg', 'yuk ikutan lomba\r\nasik nih\r\nditunggu ya', '2021-01-20');
/*!40000 ALTER TABLE `lomba` ENABLE KEYS */;

-- Dumping structure for table digilib.pengguna
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `profil` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pengguna`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.pengguna: ~25 rows (approximately)
DELETE FROM `pengguna`;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `profil`) VALUES
	('PA001', 'Trinita Agustin', 'Trinita319', '-'),
	('PA002', 'Devina Yola', 'Devina320', '-'),
	('PA003', 'Aulia Arsal', 'Aulia321', '-'),
	('PA006', 'Wanda Indria', 'Wanda322', '-'),
	('PA009', 'Ismi Hafidlhotul', 'Ismi323', '-'),
	('PA012', 'Adinda Sarifah', 'Adinda324', '-'),
	('PA014', 'Yeni Arifianti', 'Yeni325', '-'),
	('PA016', 'Nike Makrifatush', 'Nike326', '-'),
	('PA018', 'Sabrina Versa', 'Sabrina327', '-'),
	('PA020', 'Maulidia Analphalia', 'Maulidia328', '-'),
	('PA022', 'Ade flora', 'Ade329', '-'),
	('PA024', 'Adinda dwi', 'Adinda330', '-'),
	('PA027', 'Aisyah dyah', 'Aisyah331', '-'),
	('PA033', 'Alifah nurina', 'Alifah333', '-'),
	('PA035', 'Almas indhar', 'Almas334', '-'),
	('PA038', 'Alvien aldya', 'Alvien335', '-'),
	('PA040', 'Anjung sulamsari', 'Anjung', '-'),
	('PA042', 'Ardhi lukman', 'Ardhi337', '-'),
	('PA043', 'danil', 'danil', '-'),
	('PA044', 'Trinita Agustin', 'Trinita319', '-'),
	('PA045', 'Trinita Agustin', 'Trinita319', '-'),
	('PA046', 'Trinita Agustin', 'Trinita319', '-'),
	('PA047', 'Rahmad Basuki', 'Rahmad339', '-'),
	('PA048', 'Rahmad Basuki', 'Rahmad339', '-'),
	('PA049', 'Rahmad Basuki', 'Rahmad339', '-');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

-- Dumping structure for table digilib.pertanyaan
DROP TABLE IF EXISTS `pertanyaan`;
CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id_pertanyaan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_koleksi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pertanyaan` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `jawaban` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_pertanyaan`),
  KEY `id_koleksi` (`id_koleksi`) USING BTREE,
  CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`id_koleksi`) REFERENCES `koleksi` (`id_koleksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.pertanyaan: ~2 rows (approximately)
DELETE FROM `pertanyaan`;
/*!40000 ALTER TABLE `pertanyaan` DISABLE KEYS */;
INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_koleksi`, `pertanyaan`, `jawaban`, `status`) VALUES
	('PT001', 'KL008', 'siapa pengarang dari buku ini', 'JW001', 'Aktif'),
	('PT002', 'KL007', 'Ibadah Apa yang memiliki ganjaran baik', 'JW008', 'Aktif');
/*!40000 ALTER TABLE `pertanyaan` ENABLE KEYS */;

-- Dumping structure for table digilib.points
DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `id_point` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kegiatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `point` int(100) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_point`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.points: ~4 rows (approximately)
DELETE FROM `points`;
/*!40000 ALTER TABLE `points` DISABLE KEYS */;
INSERT INTO `points` (`id_point`, `jenis_kegiatan`, `point`, `status`) VALUES
	('PO001', 'Membaca', 10, 'Aktif'),
	('PO002', 'Menjawab', 10, 'Aktif'),
	('PO003', 'Login', 5, 'Aktif'),
	('PO004', 'Berkunjung', 5, 'Aktif');
/*!40000 ALTER TABLE `points` ENABLE KEYS */;

-- Dumping structure for table digilib.point_pengguna
DROP TABLE IF EXISTS `point_pengguna`;
CREATE TABLE IF NOT EXISTS `point_pengguna` (
  `id_ppengguna` int(11) NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_point` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_perolehan` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ppengguna`),
  KEY `id_pengguna` (`id_pengguna`) USING BTREE,
  KEY `id_point` (`id_point`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.point_pengguna: ~13 rows (approximately)
DELETE FROM `point_pengguna`;
/*!40000 ALTER TABLE `point_pengguna` DISABLE KEYS */;
INSERT INTO `point_pengguna` (`id_ppengguna`, `id_pengguna`, `id_point`, `tgl_perolehan`) VALUES
	(1, 'PA043', 'PO003', '2021-01-21 00:00:00'),
	(2, 'PA022', 'PO003', '2021-01-21 00:00:00'),
	(3, 'PA043', 'PO003', '2021-01-21 00:00:00'),
	(4, 'PA024', 'PO003', '2021-01-21 00:00:00'),
	(5, 'PA024', 'PO003', '2021-01-21 00:00:00'),
	(6, 'PA024', 'PO003', '2021-01-21 00:00:00'),
	(7, 'PA024', 'PO003', '2021-01-21 00:00:00'),
	(8, 'PA043', 'PO003', '2021-01-21 11:20:31'),
	(9, 'PA043', 'PO001', '2021-01-21 11:37:36'),
	(10, 'PA024', 'PO003', '2021-01-21 14:29:08'),
	(11, 'PA024', 'PO001', '2021-01-21 14:29:19'),
	(12, 'PA043', 'PO003', '2021-01-21 14:42:46'),
	(13, 'PA043', 'PO001', '2021-01-21 15:21:14');
/*!40000 ALTER TABLE `point_pengguna` ENABLE KEYS */;

-- Dumping structure for table digilib.session_kunjungan
DROP TABLE IF EXISTS `session_kunjungan`;
CREATE TABLE IF NOT EXISTS `session_kunjungan` (
  `id_ses_kunjungan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  UNIQUE KEY `id_ses_kunjungan` (`id_ses_kunjungan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.session_kunjungan: ~0 rows (approximately)
DELETE FROM `session_kunjungan`;
/*!40000 ALTER TABLE `session_kunjungan` DISABLE KEYS */;
/*!40000 ALTER TABLE `session_kunjungan` ENABLE KEYS */;

-- Dumping structure for table digilib.siswa
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_siswa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kelas` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat_siswa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_siswa` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.siswa: ~19 rows (approximately)
DELETE FROM `siswa`;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`id_siswa`, `id_pengguna`, `nama_siswa`, `kelas`, `jenis_kelamin`, `alamat_siswa`, `status_siswa`) VALUES
	('SI319', 'PA001', 'Trianita Agustin Rahmawati', '10 Bahasa', 'Perempuan', '', 'Aktif'),
	('SI320', 'PA002', 'Devina Yola E', '10 Bahasa', 'Perempuan', '', 'Aktif'),
	('SI321', 'PA003', 'Aulia Arsal', '10 Bahasa', 'Perempuan', '', 'Aktif'),
	('SI322', 'PA006', 'Wanda Indria N.H', '10 Bahasa', 'Perempuan', '', 'Aktif'),
	('SI323', 'PA009', 'Ismi Hafidlhotul I', '10 Bahasa', 'Perempuan', '', 'Aktif'),
	('SI324', 'PA012', 'Adinda Sarifah Hidayati', '10 Bahasa', 'Perempuan', '', 'Aktif'),
	('SI325', 'PA014', 'Yeni Arifianti', '10 Bahasa', 'Perempuan', '', 'Aktif'),
	('SI326', 'PA016', 'Nike Makrifatush Salsabila', '10 Bahasa', 'Perempuan', '', 'Aktif'),
	('SI327', 'PA018', 'Sabrina Versa Mylani', '10 Bahasa', 'Perempuan', '', 'Aktif'),
	('SI328', 'PA020', 'Maulidia Analphalia Firdaus', '10 Bahasa', 'Perempuan', '', 'Aktif'),
	('SI329', 'PA022', 'Ade flora twiggi preliya faradiya', '10 IPA 1', 'Perempuan', '', 'Aktif'),
	('SI330', 'PA024', 'Adinda dwi kustianto', '10 IPA 1', 'Perempuan', '', 'Aktif'),
	('SI331', 'PA027', 'Aisyah dyah novayanti suep', '10 IPA 1', 'Perempuan', '', 'Aktif'),
	('SI332', 'PA031', 'Alfina sadiyah', '10 IPA 1', 'Perempuan', '', 'Aktif'),
	('SI333', 'PA033', 'Alifah nurina rahma', '10 IPA 1', 'Perempuan', '', 'Aktif'),
	('SI334', 'PA035', 'Almas indhar amanullah', '10 IPA 1', 'Laki-laki', '', 'Aktif'),
	('SI335', 'PA038', 'Alvien aldya', '10 IPA 1', 'Laki-laki', '', 'Aktif'),
	('SI336', 'PA040', 'Anjung sulamsari purwono', '10 IPA 1', 'Perempuan', '', 'Aktif'),
	('SI337', 'PA042', 'Ardhi lukman abadha', '10 IPA 1', 'Laki-laki', '', 'Aktif');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping structure for table digilib.usulan
DROP TABLE IF EXISTS `usulan`;
CREATE TABLE IF NOT EXISTS `usulan` (
  `id_usulan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul_buku` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pengarang` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `penerbit` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tahun` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_usulan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table digilib.usulan: ~4 rows (approximately)
DELETE FROM `usulan`;
/*!40000 ALTER TABLE `usulan` DISABLE KEYS */;
INSERT INTO `usulan` (`id_usulan`, `id_pengguna`, `judul_buku`, `pengarang`, `penerbit`, `tahun`) VALUES
	('US001', 'PA024', 'aha', 'Robert', 'IDSMED', '2018'),
	('US002', 'PA043', 'aha', 'dani', 'pt ptan', '2018'),
	('US003', 'PA043', 'Buku 1', 'dani', 'pt ptan', '2016'),
	('US004', 'PA024', 'winter in tokyo', 'Anggota Remaja Aulia', 'bintang kejora', '2013');
/*!40000 ALTER TABLE `usulan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
