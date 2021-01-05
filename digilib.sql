-- digilib.karyawan definition

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- digilib.kategori definition

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- digilib.kunjungan definition

CREATE TABLE `kunjungan` (
  `id_kunjungan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `instansi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kunjungan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- digilib.pertanyaan definition

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_koleksi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pertanyaan` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `jawaban` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pertanyaan`),
  KEY `id_koleksi` (`id_koleksi`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- digilib.point_pengguna definition

CREATE TABLE `point_pengguna` (
  `id_ppengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_point` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_point` int(100) NOT NULL,
  PRIMARY KEY (`id_ppengguna`),
  KEY `id_pengguna` (`id_pengguna`) USING BTREE,
  KEY `id_point` (`id_point`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- digilib.points definition

CREATE TABLE `points` (
  `id_point` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kegiatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `point` int(100) NOT NULL,
  PRIMARY KEY (`id_point`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- digilib.siswa definition

CREATE TABLE `siswa` (
  `id_siswa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_siswa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kelas` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- digilib.koleksi definition

CREATE TABLE `koleksi` (
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

alter table points add column status varchar(20) null;
alter table pertanyaan add column status varchar(20) null;

INSERT
	INTO
	digilib.karyawan (id_karyawan,
	nama,
	jabatan,
	alamat,
	jenis_kelamin,
	status,
	username,
	password)
VALUES ('12313',
'da',
'ada',
'asda',
'Laki-laki',
'Aktif',
NULL,
NULL),
('1234',
'danielllll',
'mbuh',
'gatau deh',
'Laki-laki',
'Aktif',
NULL,
NULL);

INSERT
	INTO
	digilib.kategori (id_kategori,
	nama_kategori)
VALUES ('T001',
'Karya Umum'),
('T002',
'Filsafat dan Psikologi'),
('T003',
'Agama'),
('T004',
'Ilmu Sosial'),
('T005',
'Bahasa'),
('T006',
'Ilmu Pasti/Alam'),
('T007',
'Ilmu Terapan/Teknologi'),
('T008',
'Kesenian
'),
('T009',
'Kesusasteraan'),
('T010',
'Geografi dan Sejarah Umum');

INSERT
	INTO
	digilib.kategori (id_kategori,
	nama_kategori)
VALUES ('T011',
'Jurnal'),
('T012',
'Buku Pelajaran'),
('T013',
'kurang banyak');

INSERT
	INTO
	digilib.koleksi (id_koleksi,
	id_kategori,
	judul,
	nama_pengarang,
	penerbit,
	tahun_terbit,
	cover,
	file)
VALUES ('B0001',
'T006',
'Buku 3',
'danissss',
'pt asmmm',
'2021-12-30',
'uploads/koleksi/laporan pengadaan aset.png',
'uploads/file/KPR.pdf'),
('B0002',
'T003',
'Buku 4',
'adadadad',
'pt asmmm',
'2019-11-30',
NULL,
NULL),
('K0001',
'T001',
'Buku 1',
'dani',
'pt ptan',
'2021-12-31',
'uploads/koleksi/Nobar Dua Garis Biru_210101.jpg',
'uploads/file/iw97NkyfBBpdf'),
('K0002',
'T002',
'Buku 2',
'dani',
'pt ptan111',
'2021-12-31',
NULL,
NULL);

INSERT
	INTO
	digilib.pertanyaan (id_pertanyaan,
	id_koleksi,
	pertanyaan,
	jawaban,
	status)
VALUES ('T0001',
'K0002',
'apa gunaku?',
'gatau bund',
'Aktif');

INSERT
	INTO
	digilib.points (id_point,
	jenis_kegiatan,
	`point`,
	status)
VALUES ('PO001',
'Membaca ada',
10,
'Aktif'),
('PO002',
'Menjawab',
10,
'Aktif'),
('PO003',
'Login',
5,
'Aktif'),
('PO004',
'Berkunjung',
5,
'Aktif'),
('PO005',
'menjawab',
5,
'Aktif');

INSERT
	INTO
	digilib.siswa (id_siswa,
	nama_siswa,
	kelas,
	jenis_kelamin,
	alamat,
	username,
	password,
	status)
VALUES ('10A10',
'Gusti Adistriani putri',
'10 IPA 1',
'Perempuan',
'Mcd Juanda',
NULL,
NULL,
'Tidak Aktif'),
('11A09',
'Dika',
'11 IPA 1',
'Perempuan',
'Jampirogo',
NULL,
NULL,
'Aktif'),
('12313',
'da',
'10aa',
'Perempuan',
'asda',
NULL,
NULL,
'Tidak Aktif');