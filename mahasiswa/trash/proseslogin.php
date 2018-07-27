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
$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
 
$result = mysqli_query($dbconnect, $query) or die(mysqli_error($dbconnect));
$count = mysqli_num_rows($result);


if ($count == 1){
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
header("Location: mshop.html");

}else if (isset($_POST['nama_admin']) and isset($_POST['password'])){
$nama_admin = $_POST['nama_admin'];
$password = $_POST['password'];


$queryadmin = "SELECT * FROM `admin` WHERE nama_admin='$nama_admin' and password='$password'";
$resultadmin = mysqli_query($dbconnect, $queryadmin) or die(mysqli_error($dbconnect));
$countadmin = mysqli_num_rows($resultadmin);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
 if($countadmin == 1){
							$_SESSION['nama_admin']=$nama_admin;
							$_SESSION['password']=$password;
							header("Location: dahsboard.html");
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
 echo "<script>alert('Username & Password Salah !!!'); window.location.href='login.php'</script>";
}
}
}
//3.1.4 if the user is logged in Greets the user with message

//3.2 When the user visits the page first time, simple login form will be displayed.

?>
