<?php include("./../koneksi.php");?>
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
<li class="divider"></li>
<li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
</ul></li></ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
<li><a href="../index.php"><i class="fa fa-desktop fa-fw"></i> <span class="menu-text">Beranda</span><span class="selected"></span></a></li>
<li  class='active'><a href="mahasiswa.php"><i class="fa fa-user fa-fw"></i> <span class="menu-text">Mahasiswa</span><span class="selected"></span></a></li>
<li><a href="guest/guest.php"><i class="fa fa-users fa-fw"></i> <span class="menu-text">Guest</span><span class="selected"></span></a></li>
</span></a></li></ul>
</div></div></nav>

<div id="page-wrapper"><br><div class="row"><div class="col-lg-12"><div class="panel panel-default"><div class="panel-body">
<a href="mahasiswa.php" style="float:right"><button type="button" class="btn btn-default">Kembali</button></a>
<div class="templatemo-content-container"><div class="templatemo-content-widget white-bg"><h2 class="margin-bottom-10">Sistem Informasi &raquo; Upload Foto</h2><p>Upload Foto untuk Mahasiswa <b><?php echo $_GET['username']; ?></b></p>
 <form action="" class="templatemo-login-form" method="post" enctype="multipart/form-data">
<?php
			$username = $_GET['username'];
			$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username='$username'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: mahasiswa.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_FILES['filetoupload'])){
				$target_dir = "foto/";
				$target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

				if(isset($_POST["upload"])) {
					$check = getimagesize($_FILES["filetoupload"]["tmp_name"]);
					if($check !== false) {
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}

				if ($_FILES["filetoupload"]["size"] > 500000000) {
					echo '<div class="alert alert-danger">File size terlalu besar.</div>';
					$uploadOk = 0;
				}

				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo '<div class="alert alert-danger">Hanya JPG, JPEG, PNG & GIF yang di izinkan.</div>';
					$uploadOk = 0;
				}

				if ($uploadOk == 0) {
					echo '<div class="alert alert-danger">File gagal di upload.</div>';
				} else {
					$file = $target_dir.''.$username.'.'.$imageFileType;
					$new_username = $username.'.'.$imageFileType;
					if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $file)) {
						$up = mysqli_query($koneksi, "UPDATE mahasiswa SET foto='$new_username' WHERE username='$username'");
						if($up){
							@header("Location: foto.php?username=".$username."&sukses=ya");
						}
					} else {
						echo '<div class="alert alert-danger">File gagal di upload.</div>';
					}
				}
			}
			
			if(isset($_GET['sukses']) == 'ya'){
				echo '<div class="alert alert-success">File berhasil di upload.</div>';
			}
			?>
			<div class="col-md-6 col-md-offset-3 text-center">
				<img class="img-responsive center-block" src="foto/<?php echo $row['foto']; ?>" width="150"><br />
				<form class="form-inline" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-btn">
									<span class="btn btn-primary btn-file">
										Browse&hellip; <input type="file" name="filetoupload">
									</span>
								</span>
							</div>
						</div>
						<div class="col-sm-2">
							<input type="submit" name="upload" class="btn btn-primary" value="Upload">
						</div>
					</div>
				</form>
			</div>
</div>
          </div>
        </div></div></div></div></div></div></div>
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../../dist/js/sb-admin-2.js"></script>
	<script>
	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
		numFiles = input.get(0).files ? input.get(0).files.length : 1,
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
	});
	
	$(document).ready( function() {
		$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
			var input = $(this).parents('.input-group').find(':text'),
				log = numFiles > 1 ? numFiles + ' files selected' : label;
			if( input.length ) {
				input.val(log);
			} else {
				if( log ) alert(log);
			}
		});
	});
	</script>
</body>
</html>
