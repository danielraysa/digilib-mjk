-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2021 pada 02.41
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
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul_buku` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `pengarang` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `penerbit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tahun` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `judul_event` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `keterngan` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
('1234', '0', 'danielllll', 'mbuh', 'gatau deh', 'Laki-laki', 'Aktif');

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
('B0001', 'T006', 'Buku 3', 'danissss', 'pt asmmm', '2021-12-30', 'uploads/koleksi/laporan pengadaan aset.png', 'uploads/file/KPR.pdf'),
('B0002', 'T003', 'Buku 4', 'adadadad', 'pt asmmm', '2019-11-30', NULL, NULL),
('K0001', 'T001', 'Buku 1', 'dani', 'pt ptan', '2021-12-31', 'uploads/koleksi/Nobar Dua Garis Biru_210101.jpg', 'uploads/file/iw97NkyfBBpdf'),
('K0002', 'T002', 'Buku 2', 'dani', 'pt ptan111', '2021-12-31', NULL, NULL),
('KL003', 'T015', 'winter in tokyo', 'BUDIONO', 'bintang kejora', '2016-02-12', '', ''),
('KL004', 'T001', 'Aku Anak Dunia', 'Anggota Remaja Aulia', 'Yayasan Aulia', '0000-00-00', '../uploads/koleksi/cover.PNG', '');

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
  `tanggal_baca` date NOT NULL
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
('PA036', '16410100098', '12345', '-');

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
('PO004', 'Berkunjung', 5, 'Aktif'),
('PO006', 'Membaca', 6, 'Aktif'),
('PO007', 'Okeh', 6, 'Aktif');

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
('10A10', '', 'Gusti Adistriani putri', '10 IPA 1', 'Perempuan', 'Mcd Juanda', 'Tidak Aktif'),
('11A09', '', 'Dika', '11 IPA 1', 'Perempuan', 'Jampirogo', 'Tidak Aktif'),
('12313', '', 'da', '10aa', 'Perempuan', 'asda', 'Tidak Aktif');

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
