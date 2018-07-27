<?php
include("../../koneksi.php");
include("../func.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Informasi Desa Kebon Waris">
    <meta name="author" content="KKN-P 2018 Universitas Muhammadiyah Sidoarjo">
    <title>Sistem Informasi Desa Kebon Waris</title>
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../dist/css/templatemo-style.css" rel="stylesheet">
    <link href="../../dist/css/cloud-admin.css" rel="stylesheet">
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a class="navbar-brand" href="index.php">Sistem Informasi Desa Kebon Waris</a>
    </div>
<ul class="nav navbar-top-links navbar-right">
<li class="dropdown">
<?php session_start();if( !isset($_SESSION['saya_admin']) ){header('location:./../'.$_SESSION['akses']);exit();} $nama = ( isset($_SESSION['nama_user']) ) ? $_SESSION['nama_user'] : '';?>
<li>Hai <span style="color:red"><?php echo $_SESSION['nama_user']; ?></span></li></li>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i></a>
<ul class="dropdown-menu dropdown-user">
<li><a href="../admin.php"><i class="fa fa-user fa-fw"></i> Profile</a></li>
<li><a href="../backup.php"><i class="fa fa-save fa-fw"></i> Backup Data</a></li>
<li><a href="../restore.php"><i class="fa fa-cloud-upload fa-fw"></i> Restore Data</a></li>
<li><a href="../BUKU PANDUAN.pdf"><i class="fa fa-file fa-fw"></i> Panduan</a></li>
<li class="divider"></li>
<li><a href="../../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
</ul></li></ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
<li><a href="../index.php"><i class="fa fa-desktop fa-fw"></i> <span class="menu-text">Beranda</span><span class="selected"></span></a></li>
<li class='active'><a href="../ktp/penduduk.php"><i class="fa fa-user fa-fw"></i> <span class="menu-text">Penduduk</span><span class="selected"></span></a></li>
<li><a href="../kk/keluarga.php"><i class="fa fa-users fa-fw"></i> <span class="menu-text">Keluarga</span><span class="selected"></span></a></li>
<li><a href="../mutasi_masuk/mutasi.php"><i class="fa fa-arrow-circle-right fa-fw"></i> <span class="menu-text">Mutasi Masuk</span><span class="selected"></span></a></li>
<li><a href="../mutasi_keluar/mutasi.php"><i class="fa fa-arrow-circle-left fa-fw"></i> <span class="menu-text">Mutasi Keluar</span><span class="selected"></span></a></li>
<li><a href="../kelahiran/kelahiran.php"><i class="fa fa-star fa-fw"></i> <span class="menu-text">Kelahiran</span><span class="selected"></span></a></li>
<li><a href="../kematian/kematian.php"><i class="fa fa-globe fa-fw"></i> <span class="menu-text">Kematian</span><span class="selected"></span></a></li>
<li><a href="#"><i class="fa fa-envelope fa-fw"></i> Surat - Surat<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li ><a href="../keterangan/sk.php"><span class="sub-menu-text">Surat Keterangan</span></a></li>
                                <li ><a href="../usaha/sku.php"><span class="sub-menu-text">Surat Keterangan Usaha</span></a></li>
                                <li ><a href="../berita_acara/berita_acara.php"><span class="sub-menu-text">Berita Acara</span></a></li>
                                <li ><a href="../pengajuan/pengajuan.php"><span class="sub-menu-text">Pengajuan & Pengambilan KSK/KK</span></a></li>
                            </ul></li>
<li><a href="../upload/download.php"><i class="fa fa-tasks fa-fw"></i> <span class="menu-text">Penyimpanan File</span><span class="selected"></span></a></li>
<li><a href="../kknumsida2018.php"><i class="fa fa-thumbs-up fa-fw"></i> <span class="menu-text">KKN-P UMSIDA 2018</span><span class="selected"></span></a></li>
                    </ul>
</div></div></nav>
        <div id="page-wrapper">
            <br>
<div class="row"><div class="col-lg-12"><div class="panel panel-default"><div class="panel-heading">Upload File</div><div class="panel-body">
<a href="download.php" style="float:right"><button type="button" class="btn btn-default">Kembali</button></a>
<br><br>
							<?php
include('config.php');
include('action_upload.php');
?>
<style type="text/css">
	.table{
		font:normal 12px Tahoma,verdana;
		border:silver 1px solid;
		width:350px;
	}
	.table tr td{
		border-bottom:silver 1px solid;
		border-right:silver 1px solid;
		padding:0 5px 0 5px;
	}
	.table tr td.title{
		font:bold 12px Tahoma,verdana;
		background-color:#999999;
		color:#000000;
	}
	input{
		font:normal 12px Tahoma,verdana;
	}
	#eror{
		width:345px;;
		border:red 1px solid;
		margin-left:auto;
		margin-right:auto;
		margin-bottom:5px;
		padding:0 0 0 5px;
	}
	#msg{
		width:345px;;
		border:green 1px solid;
		margin-left:auto;
		margin-right:auto;
		margin-bottom:5px;
		padding:0 0 0 5px;
	}
</style>

<form method="post" enctype="multipart/form-data" action="">
<table class="table" cellpadding="0" cellspacing="0" align="center">
<tr>
	<td width="100">File</td>
	<td><input type="file" name="data_upload" /></td>
</tr>
<tr>
	<td width="100" valign="top">NIK</td>
	<td><input type="varchar" name="nik_upload" placeholder="Masukan NIK"></td>
</tr>
<tr>
	<td width="100" valign="top">Nama</td>
	<td><input type="varchar" name="nama" placeholder="Masukan Nama Lengkap"></td>
</tr>

<tr>
	<td width="100" valign="top">Keterangan</td>
	<td><textarea name="keterangan" cols="30" rows="3"></textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="btnUpload" value="Upload" /></td>
</tr>
</table>
</form>
</div></div></div></div></div></div></div></div>
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../../dist/js/sb-admin-2.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/bootstrap-datepicker.js"></script>
	<script>$('.date').datepicker({format: 'yyyy-mm-dd',})</script>
</body>
</html>

