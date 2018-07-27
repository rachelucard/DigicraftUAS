DROP TABLE admin;

CREATE TABLE `admin` (
  `nama` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `username` varchar(10) NOT NULL,
  `hak_akses` enum('admin') NOT NULL DEFAULT 'admin',
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `hak_akses` (`hak_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("Administrator","admin","kebonwaris","admin","2018-02-07 02:48:16");



DROP TABLE berita_acara;

CREATE TABLE `berita_acara` (
  `no_register` varchar(50) NOT NULL,
  `berita_acara` text,
  `tgl_acara` date DEFAULT NULL,
  `isi_singkat` text,
  `ket` text,
  PRIMARY KEY (`no_register`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO berita_acara VALUES("03/111/424.211.2.09/2015","COba hari ini aku sama dia tapi ssekarang aku suka sama kamu","2018-02-20","Raskin","Non");



DROP TABLE file_upload;

CREATE TABLE `file_upload` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `nik_upload` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `Filename` varchar(50) NOT NULL,
  `Detail` varchar(255) NOT NULL,
  `Folder` varchar(50) NOT NULL,
  `DateUpload` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO file_upload VALUES("17","7","7","Lembar Konsultasi.docx","7","./upload/","2018-02-18 20:45:57");
INSERT INTO file_upload VALUES("15","1","1","Data Diri.doc","1","./upload/","2018-02-18 20:35:15");
INSERT INTO file_upload VALUES("6","Bangkai Kulit.docx","baaaa","babaab","babaabab","./upload/","2018-02-18 19:58:07");
INSERT INTO file_upload VALUES("9","141080200155","Tommy Ardianto","Artikel Blog.docx","Kartu Tanda penduduk","./upload/","2018-02-18 20:12:42");
INSERT INTO file_upload VALUES("14","ase","aseeee","BUKU PANDUAN.docx","kw","./upload/","2018-02-18 20:34:44");
INSERT INTO file_upload VALUES("18","1","1","Kartu Penilaian.doc","1","./upload/","2018-02-18 20:46:34");
INSERT INTO file_upload VALUES("19","1","2","Dokumentasi Tempat.doc","kw","./upload/","2018-02-18 20:47:04");



DROP TABLE kelahiran;

CREATE TABLE `kelahiran` (
  `tgl` date DEFAULT NULL,
  `nik_akta` varchar(20) DEFAULT NULL,
  `nama_kepala` varchar(20) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `alamat` varchar(20) DEFAULT NULL,
  `rt` varchar(20) DEFAULT NULL,
  `rw` varchar(20) DEFAULT NULL,
  `kel` varchar(20) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kelahiran VALUES("2018-02-18","1212","1212","12","2018-02-18","12","1212","12","12","kmkn","m m");
INSERT INTO kelahiran VALUES("0000-00-00","12","12","12","2018-02-05","12","12","12","12","12","121");
INSERT INTO kelahiran VALUES("0000-00-00","2018-02-15","1","1","2018-02-12","1","1","1","12","1","10");



DROP TABLE kematian;

CREATE TABLE `kematian` (
  `nik_kematian` varchar(20) NOT NULL,
  `kk_kematian` varchar(20) DEFAULT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(20) NOT NULL,
  `kel` varchar(20) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `waktu_kematian` date NOT NULL,
  `tempat_kematian` varchar(20) NOT NULL,
  `sebab_kematian` varchar(20) NOT NULL,
  `kode_arsip` varchar(20) NOT NULL,
  PRIMARY KEY (`nik_kematian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kematian VALUES("12","12","12","12","12","12","12","12","2018-02-17","12","121212","");
INSERT INTO kematian VALUES("Vicky","Vicky2","Vicky1313","Vicky2","Vicky","Vicky","Vicky","Vicky","2018-02-09","1212","Vicky","Vicky");



DROP TABLE kk;

CREATE TABLE `kk` (
  `nik_kk` varchar(20) NOT NULL,
  `kk` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` int(2) NOT NULL,
  `rw` int(2) NOT NULL,
  `kelurahan` varchar(10) NOT NULL,
  `kecamatan` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_keluarga` varchar(50) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(10) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nomer` varchar(50) NOT NULL,
  UNIQUE KEY `nik` (`nik_kk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kk VALUES("3514120304970007","90009","VICKY FIRMANSYAH","PASURUAN","1997-04-03","O","Laki-Laki","KEJAPANAN","6","12","KEJAPANAN","GEMPOL","Islam","belum menikah","Kepala Keluarga","Bekerja","WNI","121","2","1");
INSERT INTO kk VALUES("3514120304980008","80008","HIMAS RANDHI","PASURUAN","2018-02-10","A","LAKI-LAKI","PANDAAN","12","12","PANDAAN","PANDAAN","HINDU","MENIKAH","","BELUM/TIDA","WNI","12","","");
INSERT INTO kk VALUES("5","5","5","5","2018-02-05","A","Laki-Laki","5","5","5","5","5","Islam","Belum Menikah","Belum Menikah","Belum Beke","WNI","5","5","5");
INSERT INTO kk VALUES("6","6","6","6","2018-02-13","A","Laki-Laki","6","6","6","6","6","Islam","Menikah","Kepala Keluarga","Belum Bekerja","WNI","6","6","6");



DROP TABLE ktp;

CREATE TABLE `ktp` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` int(2) NOT NULL,
  `rw` int(2) NOT NULL,
  `kelurahan` varchar(10) NOT NULL,
  `kecamatan` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pekerjaan` varchar(10) NOT NULL,
  `kewarganegaraan` varchar(10) NOT NULL,
  `berlaku_hingga` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`nik`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO ktp VALUES("3514120304890009","AQIL PRAKOSO","PASURUAN","2018-01-30","A","Laki-Laki","GEMPOL","1","11","KAUMAN","GEMPOL","Islam","menikah","Bekerja","WNI","SEUMUR HIDUP","3514120304890009.jpg");
INSERT INTO ktp VALUES("3514120304970007","VICKY FIRMANSYAH","PASURUAN","1997-04-03","O","LAKI-LAKI","KEJAPANAN","6","12","KEJAPANAN","GEMPOL","ISLAM","BELUM MENIKAH","BEKERJA","WNI","SEUMUR HIDUP","");
INSERT INTO ktp VALUES("3514120304980008","HIMAS RANDHI","PASURUAN","2018-02-10","A","LAKI-LAKI","PANDAAN","12","12","PANDAAN","PANDAAN","HINDU","MENIKAH","BELUM/TIDA","WNI","SEUMUR HIDUP","");
INSERT INTO ktp VALUES("6","6","6","2018-02-08","A","Laki-Laki","6","6","6","6","6","Islam","Belum Menikah","Belum Beke","WNI","6","");



DROP TABLE mutasi_keluar;

CREATE TABLE `mutasi_keluar` (
  `nik_keluar` int(100) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `alamat_tujuan` varchar(20) DEFAULT NULL,
  `rt_tujuan` varchar(20) DEFAULT NULL,
  `rw_tujuan` varchar(20) DEFAULT NULL,
  `kel_tujuan` varchar(20) DEFAULT NULL,
  `kec_tujuan` varchar(20) DEFAULT NULL,
  `kab_tujuan` varchar(20) DEFAULT NULL,
  `prov_tujuan` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `tgl_keluar` date DEFAULT NULL,
  `kk_keluar` varchar(20) DEFAULT NULL,
  `nama_kepala` varchar(20) DEFAULT NULL,
  `nomer_urut` varchar(20) DEFAULT NULL,
  `alamat_asal` varchar(20) DEFAULT NULL,
  `kel_asal` varchar(20) DEFAULT NULL,
  `rt_asal` varchar(20) DEFAULT NULL,
  `rw_asal` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nik_keluar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mutasi_keluar VALUES("33311","1311","121222","121","12","121","1212","121212","12","12","2018-02-21","1","q","11","q1","q","q","q");



DROP TABLE mutasi_masuk;

CREATE TABLE `mutasi_masuk` (
  `nik_masuk` int(100) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `alamat_asal` varchar(20) DEFAULT NULL,
  `rt_asal` varchar(20) NOT NULL,
  `rw_asal` varchar(20) DEFAULT NULL,
  `kel_asal` varchar(20) DEFAULT NULL,
  `kec_asal` varchar(20) DEFAULT NULL,
  `kab_asal` varchar(20) DEFAULT NULL,
  `prov_asal` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `tgl_masuk` date DEFAULT NULL,
  `alamat_tujuan` varchar(20) DEFAULT NULL,
  `rt_tujuan` varchar(20) DEFAULT NULL,
  `rw_tujuan` varchar(20) DEFAULT NULL,
  `kel_tujuan` varchar(20) DEFAULT NULL,
  `nama_kepala` varchar(20) DEFAULT NULL,
  `kk_masuk` varchar(20) DEFAULT NULL,
  `nomer_urut` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mutasi_masuk VALUES("0","as","asa","as","as","as","as","as","as","as","2018-02-10","as","as","as","as1","as","wqw","a33");
INSERT INTO mutasi_masuk VALUES("1","1","1","1","1","1","1","1","1","1","2018-02-01","qw","qw","qw","qw","","","");
INSERT INTO mutasi_masuk VALUES("2147483647","AQILwewek","1121212hgbhgb","1","11","12323","1","1","1","1","2018-02-16","","","","","","","");



DROP TABLE pengajuan;

CREATE TABLE `pengajuan` (
  `tgl` date DEFAULT NULL,
  `nama_pemohon` varchar(20) DEFAULT NULL,
  `alamat` varchar(20) DEFAULT NULL,
  `rt` varchar(20) DEFAULT NULL,
  `rw` varchar(20) DEFAULT NULL,
  `no_ksk` varchar(20) DEFAULT NULL,
  `nik_ksk` varchar(20) DEFAULT NULL,
  `jml_anggota` varchar(20) DEFAULT NULL,
  `nama_dimohon` varchar(20) DEFAULT NULL,
  `hub_keluarga` varchar(20) DEFAULT NULL,
  `ttp` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pengajuan VALUES("2018-02-13","asa","as","2018-02-22","as","as","asa","as","as","as","as");
INSERT INTO pengajuan VALUES("2018-02-08","12121","212","2018-02-16","12","121","212","1212","12","1212","1212");
INSERT INTO pengajuan VALUES("0000-00-00","1","1","2018-02-23","1","1","1","1","1","1","1");
INSERT INTO pengajuan VALUES("0000-00-00","aaa","a","2018-02-16","a","aa","aa","a","a","a","a");
INSERT INTO pengajuan VALUES("2018-02-06","66","66","6","6","66","66","66","66","66","66");
INSERT INTO pengajuan VALUES("2018-02-15","c","c","c","c","c","c","c","c","c","c");
INSERT INTO pengajuan VALUES("2018-02-13","13","13","13","13","13","13","13","13","13","13");
INSERT INTO pengajuan VALUES("2018-02-24","9","9","9","9","9","9","9","9","9","9");



DROP TABLE sk;

CREATE TABLE `sk` (
  `nik_sk` varchar(20) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `rt` varchar(20) DEFAULT NULL,
  `rw` varchar(20) DEFAULT NULL,
  `kelurahan` varchar(20) DEFAULT NULL,
  `surat_permintaan` varchar(20) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO sk VALUES("1212121212","Vicky Firmansyah","Kejapanan","Katholik","Laki-Laki","Pasuruan","0000-00-00","2018-02-13","Belum Bekerja","12","12","Bagajang","KK","Pengambilan KK");
INSERT INTO sk VALUES("10","10","10","Islam","Perempuan","10","2018-02-10","2018-02-10","Belum Bekerja","10","10","10","10","10");
INSERT INTO sk VALUES("1","12","12","Kristen","Perempuan","12","2018-02-01","2018-02-01","Belum Bekerja","12","12","12","12","12");
INSERT INTO sk VALUES("qq","qq","qq","Katholik","Perempuan","qq","2018-02-06","2018-02-15","Bekerja","qq","qq","qq","qwq","qwq");



DROP TABLE sku;

CREATE TABLE `sku` (
  `tgl` date DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `nik_sku` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `alamat` varchar(20) DEFAULT NULL,
  `lokasi` varchar(20) DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `besar_dana` varchar(20) DEFAULT NULL,
  `sertifikat_tanah` varchar(20) DEFAULT NULL,
  `nomer_tanah` varchar(20) DEFAULT NULL,
  `luas_tanah` varchar(20) DEFAULT NULL,
  `lokasi_tanah` varchar(20) DEFAULT NULL,
  `rt` varchar(20) DEFAULT NULL,
  `rw` varchar(20) DEFAULT NULL,
  `kelurahan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO sku VALUES("2018-02-08","1","1","","11","","1","1","11","1","1","1","1","1","11");
INSERT INTO sku VALUES("2018-02-03","3","3","Belum Bekerja","3","","3","besar_dana","32","3","3","3","3","3","3");



