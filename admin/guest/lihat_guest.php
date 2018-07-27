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
<li><a href="../mahasiswa/mahasiswa.php"><i class="fa fa-user fa-fw"></i> <span class="menu-text">Mahasiswa</span><span class="selected"></span></a></li>
<li class='active'><a href="guest.php"><i class="fa fa-users fa-fw"></i> <span class="menu-text">Guest</span><span class="selected"></span></a></li>
</span></a></li></ul>
</div></div></nav>

        <div id="page-wrapper">
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
						<?php
			$username = $_GET['username'];
			$sql = mysqli_query($koneksi, "SELECT * FROM guest WHERE username='$username'");
			if(mysqli_num_rows($sql) == 0){
				header('location:./../'.$_SESSION['username']);}else{$row = mysqli_fetch_assoc($sql);}
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM username WHERE username='$username'");
				if($delete){echo '<div class="alert alert-danger">Akun berhasil dihapus.</div>';
				}else{echo '<div class="alert alert-info">Akun gagal dihapus.</div>';}}
			?>
							<div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Lihat Guest</h2>
						 <form action="" class="templatemo-login-form" method="post" enctype="multipart/form-data">
					<a href="../../guest/images/<?php echo $row['foto']; ?>"><img style="margin-top: 40px; margin-left: 560px; position: absolute;"class="img-responsive center-block" src="../../guest/images/<?php echo $row['foto']; ?>" width="200" height="190"></a><br />

					     <div class="row form-group">
                    <div class="col-lg-6 col-md-6 form-group">                  
                      <label for="inputleadername">Username/NIM</label>
                      <input class="form-control" type="text" value="<?php echo $row['username']; ?>" disabled>                
                    </div>
                    </div>
                      <div class="row form-group">
                    <div class="col-lg-6 col-md-6 form-group">                  
                      <label for="inputSquadName">Nama Lengkap</label>
                      <input class="form-control" type="text" value="<?php echo $row['nama_lengkap']; ?>" disabled>                  
                    </div>
              </div>

              <div class="row form-group">
                    <div class="col-lg-6 col-md-6 form-group">                  
                      <label for="inputleadername">Password</label>
                      <input class="form-control" type="text" value="<?php echo $row['password']; ?>" disabled>                    
                    </div>
              </div>

              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                      <label for="inputSquadName">Email</label>
                      <input class="form-control" type="text" value="<?php echo $row['email']; ?>" disabled>                  
                    </div></div>

              <div class="row form-group">
              <div class="col-lg-6 col-md-6 form-group">                  
                      <label for="inputSquadName">Nomer Rekening</label>
                      <input class="form-control" type="text" value="<?php echo $row['no_rekening']; ?>" disabled>                  
                    </div>
              </div>
              <br>

			<a href="guest.php" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
			<a href="edit_guest.php?username=<?php echo $row['username']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Akun</a>
			<a href="lihat_guest.php?aksi=delete&username=<?php echo $row['username']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
			</div>
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

