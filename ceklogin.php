<?php
require_once('inc/config.php');
$secret_key = "6LfUIdYZAAAAAIsAH_K3aUmiU3UyvlBkKqmrJROr";
 $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
$response = json_decode($verify);
  if($response->success){ 
$username =mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$login = mysqli_query($conn, "select * from tb_users where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
$data = mysqli_fetch_assoc($login);
session_start();
$_SESSION['username'] = $username;	
$_SESSION['role'] = $data['role'];	
header("Location: index.php?success=login");
exit();


}else{
header("Location: login.php?error=2");
exit();
}	
	
} else{

header("Location: login.php?error=captha");
exit();
}




?>