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
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO guest VALUES("himasrandhi","hrp","100090088000","New Doc 2018-03-06_1.jpg","Himas Randhi Prabowo","himasrandhi@gmail.com");
INSERT INTO guest VALUES("vickyfirmansyah","19970403","10009001000","DSC_00781.jpg","Vicky Andrian Firmansyah","vickyfirmansyah743@gmail.com");



DROP TABLE karya;

CREATE TABLE `karya` (
  `nama_karya` varchar(200) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `prodi` varchar(200) DEFAULT NULL,
  `harga` int(200) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefon` varchar(200) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO karya VALUES("APTIFI","","Aqil Prakoso","","0","2018-06-01","","","");
INSERT INTO karya VALUES("Vector","","Himas Randhi","","0","2018-07-01","","","");
INSERT INTO karya VALUES("Lukisan","Lukisan Klasik","151080200050","Seni","20000","2018-07-21","user@gmail.com","+6208008080","DSC_00781.jpg");



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

INSERT INTO mahasiswa VALUES("151080200050","umsida2020","Himas Randhi","","","","");
INSERT INTO mahasiswa VALUES("151080200056","umsida2020","Vicky Andrian Firmansyah","","","20000100","151080200056.jpg");



