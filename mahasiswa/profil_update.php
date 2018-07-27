<?php
session_start();

if(isset($_POST['update']))
{
 require_once 'koneksi.php';
    // menyimpan variable yang dikirim Form
 $username  = $_SESSION['username'];
 $password   = $_POST['password']; //membuat variabel $id dan datanya dari inputan hidden id
 $nama_lengkap  = $_POST['nama_lengkap']; //membuat variabel $nim dan datanya dari inputan NIM
 $email = $_POST['email']; //membuat variabel $nama dan datanya dari inputan Nama Lengkap
 $no_rekening = $_POST['no_rekening'];

 $sql1 = "UPDATE mahasiswa SET username='$username',password='$password', nama_lengkap='$nama_lengkap', email='$email', no_rekening='$no_rekening'WHERE username='$username'";

 $update1 = $dbconnect->query($sql1);
 if (! $update1) {
        echo "<script>alert('".$dbconnect->error."'); window.location.href = 'profil.php';</script>";
    } else {
        echo "<script>alert('Edit Profil Berhasil'); window.location.href = 'profil.php';</script>";
    }
}

 if(isset($_POST['chek1'])){
    // memasukan file koneksi ke database
    require_once 'koneksi.php';
    // menyimpan variable yang dikirim Form
 $username  = $_SESSION['username'];
 $password   = $_POST['password']; //membuat variabel $id dan datanya dari inputan hidden id
 $nama_lengkap  = $_POST['nama_lengkap']; //membuat variabel $nim dan datanya dari inputan NIM
 $email = $_POST['email']; //membuat variabel $nama dan datanya dari inputan Nama Lengkap
 $no_rekening = $_POST['no_rekening'];
 
$lokasi_file = $_FILES["fuploads"]["tmp_name"];
$foto   = $_FILES["fuploads"]["name"];

// Tentukan folder untuk menyimpan file
$folder = "images/";

// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file, $folder.$foto)){
 echo "<script>alert('Update Berhasil'); window.location.href = 'profil.php';</script>";
  
  // Masukkan informasi file ke database
//  $konek = mysqli_connect("localhost","root","","adsi");

  $sql = "UPDATE mahasiswa SET username='$username',password='$password', nama_lengkap='$nama_lengkap', email='$email', no_rekening='$no_rekening', foto='$foto'  WHERE username='$username'";
            
  $update = $dbconnect->query($sql);
}
else{
  echo "File gagal di upload";
    }
}

else{ //jika tidak terdeteksi tombol simpan di klik

 //redirect atau dikembalikan ke halaman edit
 echo '<script>window.history.back()</script>';

}
?>