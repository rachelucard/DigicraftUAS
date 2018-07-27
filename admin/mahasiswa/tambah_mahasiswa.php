<?php
include("./../koneksi.php");
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
    <title>Adminstrator DigiCraft</title>
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
<li  class='active'><a href="mahasiswa.php"><i class="fa fa-user fa-fw"></i> <span class="menu-text">Mahasiswa</span><span class="selected"></span></a></li>
<li><a href="../guest/guest.php"><i class="fa fa-users fa-fw"></i> <span class="menu-text">Guest</span><span class="selected"></span></a></li>
</span></a></li></ul>
</div></div></nav>

        <div id="page-wrapper">
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
							<?php
			if(isset($_POST['add'])){
	            $username         = aman($_POST['username']);
	            $nama_lengkap     = aman($_POST['nama_lengkap']);
	            //$alamat           = aman($_POST['alamat']);
	            $password         = aman($_POST['password']);
	            //$email		      = aman($_POST['email']);
	            //$prodi            = aman($_POST['prodi']);
	            //$no_rekening      = aman($_POST['no_rekening']);
	            $cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username='$username'");
				if(mysqli_num_rows($cek) == 0){
					if($username){
						$insert = mysqli_query($koneksi, "INSERT INTO mahasiswa(username, nama_lengkap,password) VALUES ('$username','$nama_lengkap', '$password') ");
						if($insert){
						echo '<div class="alert alert-success">Pendaftaran berhasil dilakukan.</div>';
						}else{echo '<div class="alert alert-danger">Pendaftaran gagal dilakukan, silahkan coba lagi.</div>';
						}}else{
						echo '<div class="alert alert-danger">Konfirmasi Data tidak sesuai.</div>';
                }}else{echo '<div class="alert alert-danger">username Atau NIM sudah terdaftar.</div>';}}
			?>
		<div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Tambah Mahasiswa</h2>
            <p>Menambah Akun Mahasiswa</p>
            <form action="" class="templatemo-login-form" method="post" enctype="multipart/form-data">

              <div class="row form-group">
                    <div class="col-lg-6 col-md-6 form-group">                  
                      <label for="inputleadername">Username/NIM</label>
                      <input type="varchar" name="username" class="form-control" id="inputleadername" placeholder="Masukan NIM ">                  
                    </div>
              </div>

              <div class="row form-group">
                    <div class="col-lg-6 col-md-6 form-group">                  
                      <label for="inputSquadName">Nama Lengkap</label>
                      <input type="varchar" name="nama_lengkap" class="form-control" id="inputSquadname" placeholder="Masukan Nama Lengkap">
                    </div>
              </div>

              <div class="row form-group">
                    <div class="col-lg-6 col-md-6 form-group">                  
                      <label for="inputleadername">Password</label>
                      <input type="varchar" name="password" class="form-control" id="inputleadername" placeholder="password">                  
                    </div>              
              </div>
             <br>
              <div class="form-group text-right">
				<input type="submit" name="add" class="btn btn-primary" value="TAMBAH">
				<a href="mahasiswa.php" class="btn btn-warning">KEMBALI</a>
              </div>  
		  
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

