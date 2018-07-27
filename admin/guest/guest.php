<?php include("./../koneksi.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Adminstrator DigiCraft">
    <meta name="author" content="Universitas Muhammadiyah Sidoarjo">
    <title>Adminstrator DigiCraft</title>
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
        <a class="navbar-brand" href="index.php">Adminstrator DigiCraft</a>
    </div>
<ul class="nav navbar-top-links navbar-right">
<li class="dropdown">
<?php session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<li>Hai <span style="color:red"><?php echo $_SESSION['username']; ?></span></li></li>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i></a>
<ul class="dropdown-menu dropdown-user">
<li><a href="../admin.php"><i class="fa fa-user fa-fw"></i> Profile</a></li>
<li><a href="../backup.php"><i class="fa fa-save fa-fw"></i> Backup Data</a></li>
<li><a href="../restore.php"><i class="fa fa-cloud-upload fa-fw"></i> Restore Data</a></li>
<li class="divider"></li>
<li><a href="../../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
</ul></li></ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
<li><a href="../index.php"><i class="fa fa-desktop fa-fw"></i> <span class="menu-text">Beranda</span><span class="selected"></span></a></li>
<li><a href="../mahasiswa/mahasiswa.php"><i class="fa fa-user fa-fw"></i> <span class="menu-text">Mahasiswa</span><span class="selected"></span></a></li>
<li class='active'><a href="guest.php"><i class="fa fa-users fa-fw"></i> <span class="menu-text">Guest</span><span class="selected"></span></a></li>
</span></a></li></ul>
</div></div></nav>

<div id="page-wrapper"><br>
<div class="row">
	<div class="col-lg-12"><div class="panel panel-default"><div class="panel-heading">Data Guest</div>
    <div class="panel-body">

<?php if(isset($_GET['aksi']) == 'delete'){$username = $_GET['username'];$cek = mysqli_query($koneksi, "SELECT * FROM guest WHERE username='$username'");
	  if(mysqli_num_rows($cek) == 0){echo '<div class="alert alert-info">Akun tidak ditemukan.</div>';}else{$delete = mysqli_query($koneksi, "DELETE FROM guest WHERE username='$username'");
	  if($delete){echo '<div class="alert alert-danger">Akun berhasil dihapus.</div>';}else{echo '<div class="alert alert-info">Akun gagal dihapus.</div>';}}} ?>

<a href="print.php" style="float:right"><button type="button" class="btn btn-default">Cetak</button></a>
<br><br>
<?php $urut = (isset($_GET['urut']) ? strtolower($_GET['urut']) : NULL);  ?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead><tr>
           <th>No.</th>
		   <th>Username</th>
		   <th>Nama</th>
		   <th>Email</th>
		   <th>No.Rekening</th>
		   <th>Action</th>
</tr></thead><tbody>

<?php
 if($urut){$sql = mysqli_query($koneksi, "SELECT * FROM  WHERE status='$urut' ORDER BY username ASC");}else{$sql = mysqli_query($koneksi, "SELECT * FROM guest ORDER BY username ASC");}
	  if(mysqli_num_rows($sql) == 0){echo '<tr><td colspan="8">Tidak ada data.</td></tr>';}else{$no = 1;while($row = mysqli_fetch_assoc($sql)){echo '
			<tr>
				<td style="text-align: center;">'.$no.'</td>
				<td>'.$row['username'].'</td>
				<td>'.$row['nama_lengkap'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['no_rekening'].'</td>
				<td><div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Actions<span class="caret"></span></button>
                        <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="lihat_guest.php?username='.$row['username'].'">Lihat Profil</a></li>
                        <li><a href="edit_guest.php?username='.$row['username'].'">Edit Akun</a></li>
						
                        <li class="divider"></li>
                        <li><a href="guest.php?aksi=delete&username='.$row['username'].'" >Hapus Akun</a></li>
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
