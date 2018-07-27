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

<div id="page-wrapper"><br><div class="row"><div class="col-lg-12">
            <h2 class="margin-bottom-10">Backup Database</h2>
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
	<div class="col-lg-6"><div class="panel panel-default">
        <div class="panel-heading">
		<?php
							error_reporting(0);
							$file=date("Ymd").'_backup_database_'.time().'.sql';
							backup_tables("localhost","root","","adsi",$file);
						?>
						<p align="center">Backup database telah berhasil !</p><br />
						<p align="center"><a style="cursor:pointer" onclick="location.href='download_backup_data.php?nama_file=<?php echo $file;?>'" title="Download">Download file database</a></p>
						<?php
						/*
						untuk memanggil nama fungsi :: jika anda ingin membackup semua tabel yang ada didalam database, biarkan tanda BINTANG (*) pada variabel $tables = '*'
						jika hanya tabel-table tertentu, masukan nama table dipisahkan dengan tanda KOMA (,) 
						*/
						function backup_tables($host,$user,$pass,$name,$nama_file,$tables ='*')	{
							$link = mysql_connect($host,$user,$pass);
							mysql_select_db($name,$link);
							
							if($tables == '*'){
								$tables = array();
								$result = mysql_query('SHOW TABLES');
								while($row = mysql_fetch_row($result)){
									$tables[] = $row[0];
								}
							}
							else{//jika hanya table-table tertentu
								$tables = is_array($tables) ? $tables : explode(',',$tables);
							}
							
							foreach($tables as $table){
								$result = mysql_query('SELECT * FROM '.$table);
								$num_fields = mysql_num_fields($result);
																
								$return.= 'DROP TABLE '.$table.';';//menyisipkan query drop table untuk nanti hapus table yang lama
								$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
								$return.= "\n\n".$row2[1].";\n\n";
								
								for ($i = 0; $i < $num_fields; $i++) {
									while($row = mysql_fetch_row($result)){
										//menyisipkan query Insert. untuk nanti memasukan data yang lama ketable yang baru dibuat
										$return.= 'INSERT INTO '.$table.' VALUES(';
										for($j=0; $j<$num_fields; $j++) {
											//akan menelusuri setiap baris query didalam
											$row[$j] = addslashes($row[$j]);
											$row[$j] = ereg_replace("\n","\\n",$row[$j]);
											if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
											if ($j<($num_fields-1)) { $return.= ','; }
										}
										$return.= ");\n";
									}
								}
								$return.="\n\n\n";
							}							
							//simpan file di folder
							$nama_file;
							
							$handle = fopen('backup/'.$nama_file,'w+');
							fwrite($handle,$return);
							fclose($handle);
						}
						?>
						</div>
 </div></div></div></div></div>
<div class="footer" style="text-align:center;">Copyright © 2018 <strong>Desa Kebon Waris</strong> - by <strong>KKN-P Universitas Muhammadiyah Sidoarjo</strong> All Right Reserved
<p style="text-align: right; margin-top: -20px;"><strong>Version</strong> 0.1.0.0</p></div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>
