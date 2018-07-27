<?php  //Start the Session
session_start();
 require('koneksi.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `admin` WHERE username='$username' and password='$password'"; 
$result = mysqli_query($dbconnect, $query) or die(mysqli_error($dbconnect));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header('location:admin/index.php');
}
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
$querymahasiswa = "SELECT * FROM `mahasiswa` WHERE username='$username' and password='$password'"; 
$resultmhs = mysqli_query($dbconnect, $querymahasiswa) or die(mysqli_error($dbconnect));
$countmahasiswa = mysqli_num_rows($resultmhs);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($countmahasiswa == 1){
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header('location:mahasiswa/mshop.html');
}
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
$queryguest = "SELECT * FROM `guest` WHERE username='$username' and password='$password'"; 
$resultguest = mysqli_query($dbconnect, $queryguest) or die(mysqli_error($dbconnect));
$countguest = mysqli_num_rows($resultguest);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($countguest == 1){
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header('location:guest/mshop.html');
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
 echo "<script>alert('Username & Password Salah !!!'); window.location.href='index.php'</script>";
}
//3.2 When the user visits the page first time, simple login form will be displayed.
}
?>