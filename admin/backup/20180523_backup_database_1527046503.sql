DROP TABLE admin;

CREATE TABLE `admin` (
  `username` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("adsi","Administrator","admin","2018-05-23 10:11:41");



DROP TABLE data_from;

CREATE TABLE `data_from` (
  `id_data` varchar(200) NOT NULL,
  `nama_pembeli` varchar(200) NOT NULL,
  `no_ktp` int(200) NOT NULL,
  `no_telp` int(200) NOT NULL,
  `foto_ktp` varchar(200) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE guest;

CREATE TABLE `guest` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `no_rekening` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO guest VALUES("123","sendy","","","sendy");



DROP TABLE karya;

CREATE TABLE `karya` (
  `id_karya` int(200) NOT NULL,
  `nama_karya` varchar(200) NOT NULL,
  `dokumen` varchar(200) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `prodi` varchar(200) NOT NULL,
  `harga` int(200) NOT NULL,
  `tgl_upload` date NOT NULL,
  `no_rekening` varchar(200) NOT NULL,
  PRIMARY KEY (`id_karya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE mahasiswa;

CREATE TABLE `mahasiswa` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `prodi` varchar(200) NOT NULL,
  `no_rekening` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mahasiswa VALUES("151080200050","umsida","Himas Randhi","","","","");



