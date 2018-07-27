<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DigiCraft Umsida">
    <meta name="author" content="KKN-P 2018 Universitas Muhammadiyah Sidoarjo">
    <title>DigiCraft Umsida</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<style> body {background: url('img/background.jpg') no-repeat top center fixed;background-size: cover;color: #b5b5b5;font-family: sans-serif;}.login {width: 300px;position: absolute;top: 50%;left: 50%;margin: 80px 0px 0px -150px;background: #FFFFFF;animation-fill-mode: both;animation-duration: 1s;animation-name: bounceInDown;border-radius: 3px;}@keyframes bounceInDown{0% {opacity: 0;	transform: translateY(-2000px);}60% {opacity: 1;transform: translateY(30px);}80% {transform: translateY(-10px);}100% {transform: translateY(0);} </style>
<body>
<div class="container"><div class="row"><div class="col-md-4 col-md-offset-4"><div class='login'>
<div class="panel-heading" style="background:#d255fc; color:white"><h3 class="panel-title" style="text-align:center;">DigiCraft Umsida</h3></div>
<div class="panel-body">
     <?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>

        <form id="loginForm" method="POST" action="check-login.php" novalidate="novalidate">
        <fieldset>
        <div class="form-group"><div align="center"><img src="img/logo.jpeg" height="150" width="150" ></div></div><p>
        <div class="form-group"><input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="Username"></div><p>
        <div class="form-group"><input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password" placeholder="Password"></div>
        <div class="checkbox"><label><input name="remember" type="checkbox" value="Remember Me">Remember Me</label></div>
		<button type="submit" class="btn btn-success btn-block">Login</button>
        <p>
        <p>Apakah Anda Belum Punya Akun? <strong><a href="register.php" class="blue-text">Daftar Segera!</a></strong></p>
        </form>
</div></div></div></div></div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>
</body>
</html>
<?php
include ("koneksi.php");
include ("daftar_user.php");
?>
