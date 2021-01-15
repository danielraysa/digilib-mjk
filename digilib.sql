-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2021 pada 07.19
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digilib`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_alumni` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul_buku` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `pengarang` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `penerbit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tahun` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `judul_buku`, `pengarang`, `penerbit`, `tahun`, `jumlah`) VALUES
('DN001', 'Love in Paris', 'sutrisno', 'Suhu Nasional', '2015', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul_event` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `judul_event`, `gambar`, `keterangan`, `tanggal`) VALUES
('T001', 'Kompetisi Novel Nasional', '', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhh', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_karyawan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_karyawan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_karyawan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_pengguna`, `nama_karyawan`, `jabatan`, `alamat_karyawan`, `jenis_kelamin`, `status_karyawan`) VALUES
('12313', '0', 'da', 'ada', 'asda', 'Laki-laki', 'Aktif'),
('1234', '0', 'danielllll', 'mbuh', 'gatau deh', 'Laki-laki', 'Aktif'),
('SI002', 'PA002', 'Rahmad Basuki', 'Guru', '', 'Laki-laki', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi`
--

CREATE TABLE `koleksi` (
  `id_koleksi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_kategori` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nama_pengarang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `penerbit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tahun_terbit` date NOT NULL,
  `cover` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `koleksi`
--

INSERT INTO `koleksi` (`id_koleksi`, `id_kategori`, `judul`, `nama_pengarang`, `penerbit`, `tahun_terbit`, `cover`, `file`) VALUES
('K0002', 'T002', 'Buku 2', 'dani', 'pt ptan111', '2021-12-31', NULL, NULL),
('KL003', 'T001', 'Aku Anak Dunia', 'Anggota Remaja Aulia', 'Yayasan Aulia', '2015-01-16', '../uploads/koleksi/cover.PNG', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `instansi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_baca`
--

CREATE TABLE `log_baca` (
  `id_logbaca` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_koleksi` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `halaman_bacatg` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_baca` date NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_quiz`
--

CREATE TABLE `log_quiz` (
  `id_logquiz` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pertanyaan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jawaban` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_jawab` date NOT NULL,
  `benar_salah` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lomba`
--

CREATE TABLE `lomba` (
  `id_lomba` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul_lomba` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `poster` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `lomba`
--

INSERT INTO `lomba` (`id_lomba`, `judul_lomba`, `poster`, `keterangan`, `tgl`) VALUES
('LO002', 'HIMPUNAN MAHASISWA TEKNIKK3 PROUDLY PRESENT âœ¨ â›‘ï¸ [ SAFETY COMPETITION 2021] â›‘ï¸', '', '  Dengan Tema : â€œOptimalisasi Kemandirian Masyarakat Berbudaya K3 pada Era New Normal untuk Menyongsong Revolusi Industri 4.0\"  Halo safety fellas ðŸ‘‹ðŸ» Yang dinanti-nanti sudah datang nihâ€¼ï¸ Di tengah kondisi yang tidak biasa, Safety Fellas masih bisa mengasah kreativitas di bidang menulis lho. Yak caranya dengan ikutan Safety Competition 2021 â›‘ï¸  Tunggu apalagi? Kuy kepoin poster dan segera daftarkan diri kalian yaaðŸ˜‰ Selalu pantau akun kami biar tidak ketinggalan info!.  Our social media : Instagram : @safecomppns Facebook : Safecom Ppns Twitter : safecomppns Line : @825yqzaw Email : safety.competition@ppns.ac.id', '2020-12-21'),
('LO003', 'HIMPUNAN MAHASISWA TEKNIKK3 PROUDLY PRESENT âœ¨ â›‘ï¸ [ SAFETY COMPETITION 2021] â›‘ï¸', '', '  Dengan Tema : â€œOptimalisasi Kemandirian Masyarakat Berbudaya K3 pada Era New Normal untuk Menyongsong Revolusi Industri 4.0\"  Halo safety fellas ðŸ‘‹ðŸ» Yang dinanti-nanti sudah datang nihâ€¼ï¸ Di tengah kondisi yang tidak biasa, Safety Fellas masih bisa mengasah kreativitas di bidang menulis lho. Yak caranya dengan ikutan Safety Competition 2021 â›‘ï¸  Tunggu apalagi? Kuy kepoin poster dan segera daftarkan diri kalian yaaðŸ˜‰ Selalu pantau akun kami biar tidak ketinggalan info!.  Our social media : Instagram : @safecomppns Facebook : Safecom Ppns Twitter : safecomppns Line : @825yqzaw Email : safety.competition@ppns.ac.id', '2020-12-21'),
('LO004', 'Kompetisi Novel Nasional', '', 'Kab. Mojokerto (MAN 2 Mojokerto) Kepala perpustakaan MAN 2 Mojokerto menjadi partisipan pelatihan perpustakaan berbasis digital dan online. Kegiatan ini diikuti dengan baik karena untuk meningkatkan pengelolaan dan pelayanan perpustakaan yang ada di MAN 2 Mojokerto yang sudah menerapkan perpustakaan secara digital. Kegiatan diklat ini sudah berjalan empat hari. Diklat ini dilakukan mulai hari kamis-senin (8-12/10) di Semarang.  Keikutsertaan kepala perpustakaan MAN 2 Mojokerto ini diharapakan dapat meningkatkan pelayanan dan pengelolaan perpustakaan di MAN 2 Mojokerto berbasis digital dan online sehingga budaya literasi di MAN 2 Mojokerto dapat berkembang. â€œPerpustakaan MAN 2 Mojokerto sudah menerapkan secara pelayanan dan pengelolaannya secara digital, didukung dengan sarana dan prasarana di MAN 2 Mojokerto sehingga perpustakaan digital berjalan dengan baikâ€ Tutur Durotun Nisaâ€™ Kepala Perpustakaan MAN 2 Mojokerto yang mengikuti diklat pustakawan angkatan 1. Diklat ini diselenggarakan oleh Direktorat Guru dan', '2021-01-08'),
('LO005', 'HIMPUNAN MAHASISWA TEKNIKK3 PROUDLY PRESENT âœ¨ â›‘ï¸ [ SAFETY COMPETITION 2021] â›‘ï¸', '', ' HIMPUNAN MAHASISWA TEKNIK K3 PROUDLY PRESENT âœ¨\r\nâ›‘ï¸ [ SAFETY COMPETITION 2021] â›‘ï¸\r\n\r\nDengan Tema :\r\nâ€œOptimalisasi Kemandirian Masyarakat Berbudaya K3 pada Era New Normal untuk Menyongsong Revolusi Industri 4.0\"\r\n\r\nHalo safety fellas ðŸ‘‹ðŸ»\r\nYang dinanti-nanti sudah datang nihâ€¼ï¸\r\nDi tengah kondisi yang tidak biasa, Safety Fellas masih bisa mengasah kreativitas di bidang menulis lho. Yak caranya dengan ikutan Safety Competition 2021 â›‘ï¸\r\n\r\nTunggu apalagi? Kuy kepoin poster dan segera daftarkan diri kalian yaaðŸ˜‰ Selalu pantau akun kami biar tidak ketinggalan info!.\r\n\r\nOur social media :\r\nInstagram : @safecomppns\r\nFacebook : Safecom Ppns\r\nTwitter : safecomppns\r\nLine : @825yqzaw\r\nEmail : safety.competition@ppns.ac.id', '2020-12-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `profil` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `profil`) VALUES
('PA001', 'Trinita Agustin', 'Trinita0001', '-'),
('PA002', 'Rahmad Basuki', 'Rahmad002', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_koleksi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pertanyaan` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `jawaban` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_koleksi`, `pertanyaan`, `jawaban`, `status`) VALUES
('T0001', 'K0002', 'apa gunaku?', 'gatau bund', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `points`
--

CREATE TABLE `points` (
  `id_point` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kegiatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `point` int(100) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `points`
--

INSERT INTO `points` (`id_point`, `jenis_kegiatan`, `point`, `status`) VALUES
('PO001', 'Membaca ada', 10, 'Aktif'),
('PO002', 'Menjawab', 10, 'Aktif'),
('PO003', 'Login', 5, 'Aktif'),
('PO004', 'Berkunjung', 5, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `point_pengguna`
--

CREATE TABLE `point_pengguna` (
  `id_ppengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_point` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_point` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `session_kunjungan`
--

CREATE TABLE `session_kunjungan` (
  `id_ses_kunjungan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_kunjungan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_siswa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kelas` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat_siswa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_siswa` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_pengguna`, `nama_siswa`, `kelas`, `jenis_kelamin`, `alamat_siswa`, `status_siswa`) VALUES
('SI001', 'PA001', 'Trianita Agustin Rahmawati', '11 Bahasa', 'Perempuan', '', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulan`
--

CREATE TABLE `usulan` (
  `id_usulan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul_buku` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pengarang` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `penerbit` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tahun` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indeks untuk tabel `log_baca`
--
ALTER TABLE `log_baca`
  ADD PRIMARY KEY (`id_logbaca`);

--
-- Indeks untuk tabel `log_quiz`
--
ALTER TABLE `log_quiz`
  ADD PRIMARY KEY (`id_logquiz`);

--
-- Indeks untuk tabel `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`id_lomba`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`) USING BTREE;

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `id_koleksi` (`id_koleksi`) USING BTREE;

--
-- Indeks untuk tabel `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id_point`);

--
-- Indeks untuk tabel `point_pengguna`
--
ALTER TABLE `point_pengguna`
  ADD PRIMARY KEY (`id_ppengguna`),
  ADD KEY `id_pengguna` (`id_pengguna`) USING BTREE,
  ADD KEY `id_point` (`id_point`);

--
-- Indeks untuk tabel `session_kunjungan`
--
ALTER TABLE `session_kunjungan`
  ADD UNIQUE KEY `id_ses_kunjungan` (`id_ses_kunjungan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `koleksi`
--
ALTER TABLE `koleksi`
  ADD CONSTRAINT `koleksi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`id_koleksi`) REFERENCES `koleksi` (`id_koleksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
