<?php
session_start();

if(isset($_POST['update'])){
 
    // memasukan file koneksi ke database
    require_once 'koneksi.php';
    // menyimpan variable yang dikirim Form
 $username  = $_SESSION['username'];
 $password   = $_POST['password']; //membuat variabel $id dan datanya dari inputan hidden id
 $nama_lengkap  = $_POST['nama_lengkap']; //membuat variabel $nim dan datanya dari inputan NIM
 $email = $_POST['email']; //membuat variabel $nama dan datanya dari inputan Nama Lengkap
 $no_rekening = $_POST['no_rekening'];
    //$fupload = $_FILES["fuploads"];
   
    // SQL Insert
     //$sql = "UPDATE user SET password='$password', nama_lengkap='$nama_lengkap', email='$email', prodi='$prodi', no_rekening='$no_rekening'  WHERE username='$username'";
  //$insert = $dbconnect->query($sql);
    // jika gagal
   // if (! $insert) {
        //echo "<script>alert('".$dbconnect->error."'); window.location.href = 'jual.php';</script>";
    //} else {
        //echo "<script>alert('Insert Data Berhasil'); window.location.href = 'mshop.html';</script>";
    //}

//if(isset($fupload)){
$lokasi_file = $_FILES["fuploads"]["tmp_name"];
$foto   = $_FILES["fuploads"]["name"];

// Tentukan folder untuk menyimpan file
$folder = "images/";

// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file, $folder.$foto)){
 echo "<script>alert('Update Berhasil'); window.location.href = 'mshop.html';</script>";
  
  // Masukkan informasi file ke database
//  $konek = mysqli_connect("localhost","root","","adsi");

  $sql = "UPDATE guest SET username='$username',password='$password', nama_lengkap='$nama_lengkap', email='$email', no_rekening='$no_rekening', foto='$foto'  WHERE username='$username'";
            
  $update = $dbconnect->query($sql);
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