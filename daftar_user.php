
<?php
if (isset($_POST['username']) && $_POST['username']) {
    // memasukan file koneksi ke database
    require_once 'koneksi.php';
    // menyimpan variable yang dikirim Form
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $password = $_POST['password'];
    // cek nilai variable
    if (empty($username)) {
        header('location: ./index.php?error=' .base64_encode('Username tidak boleh kosong'));   
    }
    if (empty($password)) {
        header('location: ./index.php?error=' .base64_encode('Password tidak boleh kosong'));   
    }
    
    // SQL Insert
    $sql = "INSERT INTO guest (nama_lengkap,username, password ) VALUES ( '$nama_lengkap','$username', '$password')";
  $insert = $dbconnect->query($sql);
    // jika gagal
    if (! $insert) {
        echo "<script>alert('".$dbconnect->error."'); window.location.href = './register.php';</script>";
    } else {
        echo "<script>alert('Insert Data Berhasil'); window.location.href = './index.php';</script>";
    }

}
?>