<?php
session_start();

if(isset($_POST['upload'])){
 
    // memasukan file koneksi ke database
    require_once 'koneksi.php';
    // menyimpan variable yang dikirim Form
       $nama_karya = $_POST['nama_karya'];
    $username = $_POST['username'];
    $prodi = $_POST['prodi'];
    $harga = $_POST['harga'];
    $tgl_upload = $_POST['tgl_upload'];
    $telefon = $_POST['telefon'];
    $dokumen = $_POST['dokumen'];
    $email = $_POST['email'];
    
    
  
    // SQL Insert
     $sql = "INSERT INTO karya (nama_karya,username,prodi,harga,tgl_upload,telefon,dokumen,email) VALUES ('$nama_karya','$username','$prodi','$harga','$tgl_upload','$telefon','$dokumen','$email')";
  $insert = $dbconnect->query($sql);
    // jika gagal
    if (! $insert) {
        echo "<script>alert('".$dbconnect->error."'); window.location.href = 'jual.php';</script>";
    } else {
        echo "<script>alert('Insert Data Berhasil'); window.location.href = 'mshop.html';</script>";
    }


}
else{ //jika tidak terdeteksi tombol simpan di klik

 //redirect atau dikembalikan ke halaman edit
 echo '<script>window.history.back()</script>';

}
?>