<?php
session_start();

if(isset($_POST['simpan'])){
 
    // memasukan file koneksi ke database
    require_once 'koneksi.php';
    // menyimpan variable yang dikirim Form
       $nama_karya = $_POST['nama_karya'];
    $username = $_POST['username'];
    $prodi = $_POST['prodi'];
    $harga = $_POST['harga'];
    $tgl_upload = $_POST['tgl_upload'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $deskripsi = $_POST['deskripsi'];
    //$fupload = $_FILES["fuploads"];
   
    // SQL Insert
     //$sql = "INSERT INTO `karya` (`nama_karya`, `username`, `prodi`, `harga`, `tgl_upload`, `telefon`, `email`, `deskripsi`) VALUES ('$nama_karya', '$username', '$prodi', '$harga', '$tgl_upload', '$telefon', '$email', '$deskripsi')";
  //$insert = $dbconnect->query($sql);
    // jika gagal
   // if (! $insert) {
        //echo "<script>alert('".$dbconnect->error."'); window.location.href = 'jual.php';</script>";
    //} else {
        //echo "<script>alert('Insert Data Berhasil'); window.location.href = 'mshop.html';</script>";
    //}

//if(isset($fupload)){
$lokasi_file = $_FILES["fuploads"]["tmp_name"];
$file   = $_FILES["fuploads"]["name"];

// Tentukan folder untuk menyimpan file
$folder = "file/";

// tanggal sekarang
$tgl_upload = date("Ymd");

// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file, $folder.$file)){
 echo "<script>alert('Upload Karya Berhasil'); window.location.href = 'mshop.html';</script>";
  
  // Masukkan informasi file ke database
  

$sql = "INSERT INTO `karya` (`nama_karya`, `username`, `prodi`, `harga`, `tgl_upload`, `telefon`, `email`, `deskripsi`, `file`) VALUES ('$nama_karya', '$username', '$prodi', '$harga', '$tgl_upload', '$telefon', '$email', '$deskripsi', '$file')";
  

  $insert = $dbconnect->query($sql);
}
else{
  echo "File gagal di upload";
}
//}

}


else{ //jika tidak terdeteksi tombol simpan di klik

 //redirect atau dikembalikan ke halaman edit
 echo '<script>window.history.back()</script>';

}
?>