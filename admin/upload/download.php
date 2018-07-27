<?php include("../../koneksi.php");?>
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
    <link href="../../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a class="navbar-brand" href="index.php">Sistem Informasi Desa Kebon Waris</a>
    </div>
<ul class="nav navbar-top-links navbar-right">
<li class="dropdown">
<?php session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<li>Hai <span style="color:red"><?php echo $_SESSION['username']; ?></span></li></li><li class="dropdown">
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
<li><a href="../ktp/penduduk.php"><i class="fa fa-user fa-fw"></i> <span class="menu-text">Penduduk</span><span class="selected"></span></a></li>
<li><a href="../kk/keluarga.php"><i class="fa fa-users fa-fw"></i> <span class="menu-text">Keluarga</span><span class="selected"></span></a></li>
<li class='active'><a href="../mutasi_masuk/mutasi.php"><i class="fa fa-arrow-circle-right fa-fw"></i> <span class="menu-text">Mutasi Masuk</span><span class="selected"></span></a></li>
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
<div id="page-wrapper"><br>
<div class="row"><div class="col-lg-12"><div class="panel panel-default"><div class="panel-heading">Data File</div><div class="panel-body">
<?php if(isset($_GET['aksi']) == 'delete'){$Filename = $_GET['Filename'];$cek = mysqli_query($koneksi, "SELECT * FROM file_upload WHERE Filename='$Filename'");
	  if(mysqli_num_rows($cek) == 0){echo '<div class="alert alert-info">Data tidak ditemukan.</div>';}else{$delete = mysqli_query($koneksi, "DELETE FROM file_upload WHERE Filename='$Filename'");
	  if($delete){echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';}else{echo '<div class="alert alert-info">Data gagal dihapus.</div>';}}}
?>
<a href="tambah_file.php"><button type="button" class="btn btn-default">Upload File</button></a>
<br><br>
<?php $urut = (isset($_GET['urut']) ? strtolower($_GET['urut']) : NULL);  ?>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead><tr>
           <th>No.</th>
		   <th>FILE</th>
		   <th>NIK</th>
		   <th>NAMA</th>
           <th>KETERANGAN</th>
		   <th>Action</th>
</tr></thead><tbody>
	<?php $sql = mysqli_query($koneksi, "SELECT * FROM file_upload ORDER BY nik_upload ASC");
	  if(mysqli_num_rows($sql) == 0){echo '<tr><td colspan="8">Tidak ada data.</td></tr>';}else{$no = 1;while($row = mysqli_fetch_assoc($sql)){echo '
			<tr>
				<td style="text-align: center;">'.$no.'</td>
				<td><span style="color:red">'.$row['Filename'].'</span></td>
				<td>'.$row['nik_upload'].'</td>
				<td>'.$row['nama'].'</td>
				<td>'.$row['Detail'].'</td>
				<td><div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Actions<span class="caret"></span></button>
                        <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="upload/'.$row['Filename'].'">Download</a></li>
                        <li class="divider"></li>
                        <li><a href="download.php?aksi=delete&Filename='.$row['Filename'].'" >Hapus data</a></li>
                        </ul></div></td></tr>';$no++;}}?>     
</tbody></table> </div></div></div></div></div></div>
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../../dist/js/sb-admin-2.js"></script>
<script>$(document).ready(function() {$('#dataTables-example').DataTable({responsive: true});});</script>
</body>
</html>

</html>
