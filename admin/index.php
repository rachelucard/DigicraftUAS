<?php include("koneksi.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Adminstrator DigiCraft">
    <meta name="author" content="Universitas Muhammadiyah Sidoarjo">
    <title>Adminstrator DigiCraft</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../dist/css/cloud-admin.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 

            <script src="Chart.js/Chart.bundle.js"></script>
        <style type="text/css">
            .container {
                width: 5%;
                margin: 5px auto;
            }
        </style>

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a class="navbar-brand" href="index.php">Adminstrator DigiCraft</a>
    </div>
<ul class="nav navbar-top-links navbar-right">
<li class="dropdown">
<?php session_start();
include ("koneksi.php");
$username = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<li>Hai <span style="color:red"><?php echo $_SESSION['username']; ?></span></li></li>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i></a>
<ul class="dropdown-menu dropdown-user">
<li><a href="admin.php"><i class="fa fa-user fa-fw"></i> Profile</a></li>
<li><a href="backup.php"><i class="fa fa-save fa-fw"></i> Backup Data</a></li>
<li><a href="restore.php"><i class="fa fa-cloud-upload fa-fw"></i> Restore Data</a></li>
<li class="divider"></li>
<li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
</ul></li></ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
<li class='active'><a href="index.php"><i class="fa fa-desktop fa-fw"></i> <span class="menu-text">Beranda</span><span class="selected"></span></a></li>
<li><a href="mahasiswa/mahasiswa.php"><i class="fa fa-user fa-fw"></i> <span class="menu-text">Mahasiswa</span><span class="selected"></span></a></li>
<li><a href="guest/guest.php"><i class="fa fa-users fa-fw"></i> <span class="menu-text">Guest</span><span class="selected"></span></a></li>
</span></a></li></ul>
</div></div></nav>

<div id="page-wrapper"><div class="row"><div class="col-lg-12">
            <h2 class="margin-bottom-10">Beranda</h2><p>Halaman Utama Sistem</p>
</div></div>
<div class="tanggal" style="margin-top: -58px; margin-left: 684px; position: absolute;">
<?php
$tanggal= mktime(date("m"),date("d"),date("Y"));echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");echo "| Pukul : <b>". $jam." "."</b>";
$a = date ("H");if (($a>=6) && ($a<=10)){echo "<b>, Selamat Pagi !!</b>";}
else if(($a>10) && ($a<=15)){echo ", Selamat Pagi !!";}
else if (($a>15) && ($a<=18)){echo ", Selamat Siang !!";}else { echo ", <b> Selamat Malam </b>";}
?> 
</div>
<div class="row">
<?php 	
$user = "localhost";$name = "root";$pass = "";$dbname = "adsi";
$con = mysqli_connect($user,$name,$pass,$dbname);if (!$con){die ("Database Tidak Ada : " . mysqli_connect_error());}
$kueri = mysqli_query($con, "SELECT * FROM mahasiswa");$data = array ();while (($row = mysqli_fetch_array($kueri)) != null){$data[] = $row;}$cont = count ($data);
$kueri1 = mysqli_query($con, "SELECT * FROM guest");$data1 = array ();while (($row = mysqli_fetch_array($kueri1)) != null){$data1[] = $row;}$cont1 = count ($data1);
$kueri2 = mysqli_query($con, "SELECT * FROM data_from");$data2 = array ();while (($row = mysqli_fetch_array($kueri2)) != null){$data2[] = $row;}$cont2 = count ($data2);
$kueri3 = mysqli_query($con, "SELECT * FROM karya");$data3 = array ();while (($row = mysqli_fetch_array($kueri3)) != null){$data3[] = $row;}$cont3 = count ($data3);
?>
<div class="col-md-3 col-sm-3"><div class="dashbox panel panel-default"><div class="panel-body">
			<div class="panel-left blue"><i class="fa fa-user fa-3x"></i></div>
			<div class="panel-right"><div class="number"><?php echo "$cont" ?></div><div class="title">Jumlah Mahasiswa</div></div>
</div></div></div>
<div class="col-md-3 col-sm-3"><div class="dashbox panel panel-default"><div class="panel-body">
			<div class="panel-left red"><i class="fa fa-users fa-3x"></i></div>
			<div class="panel-right"><div class="number"><?php echo "$cont1" ?></div><div class="title">Jumlah Guest</div></div>
</div></div></div>
<div class="col-md-3 col-sm-3"><div class="dashbox panel panel-default"><div class="panel-body">
			<div class="panel-left red"><i class="fa fa-shopping-cart   fa-3x"></i></div>
			<div class="panel-right"><div class="number"><?php echo "$cont2" ?></div><div class="title">Jumlah Pembelian</div></div>
</div></div></div>
<div class="col-md-3 col-sm-3"><div class="dashbox panel panel-default"><div class="panel-body">
			<div class="panel-left blue"><i class="fa fa-file fa-3x"></i></div>
			<div class="panel-right"><div class="number"><?php echo "$cont3" ?></div><div class="title">Jumlah Karya</div></div>
</div></div></div>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>
