<?php
//mulai proses edit data
session_start();
//cek dahulu, jika tombol simpan di klik
if(isset($_POST['update'])){
 
 //inlcude atau memasukkan file koneksi ke database
 include('koneksi.php');
 
 //jika tombol tambah benar di klik maka lanjut prosesnya
 $username  = $_SESSION['username'];
 $password   = $_POST['password']; //membuat variabel $id dan datanya dari inputan hidden id
 $nama_lengkap  = $_POST['nama_lengkap']; //membuat variabel $nim dan datanya dari inputan NIM
 $email = $_POST['email']; //membuat variabel $nama dan datanya dari inputan Nama Lengkap
 $prodi  = $_POST['prodi']; //membuat variabel $kelas dan datanya dari inputan dropdown Kelas
 $no_rekening = $_POST['no_rekening'];
 $foto = $_POST['foto'];
  //membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
 
 //melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
 $update = "UPDATE guest SET password='$password', nama_lengkap='$nama_lengkap', email='$email', prodi='$prodi', no_rekening='$no_rekening', foto='$foto'  WHERE username='$username'";
 $result = mysqli_query($dbconnect, $update) or die(mysqli_error($dbconnect));
 //jika query update sukses
    if (! $result) {
        echo "<script>alert('".$dbconnect->error."'); window.location.href = './profil.php';</script>";
    } else {
        echo "<script>alert('Update Berhasil'); window.location.href = './mshop.html';</script>";
    }

}else{ //jika tidak terdeteksi tombol simpan di klik

 //redirect atau dikembalikan ke halaman edit
 echo '<script>window.history.back()</script>';

}
?>