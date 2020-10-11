<?php
require_once('inc/config.php');
$secret_key = "6LfUIdYZAAAAAIsAH_K3aUmiU3UyvlBkKqmrJROr";
 $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
$response = json_decode($verify);
  if($response->success){ 
isset($_REQUEST['username'])
        ? $username = mysqli_real_escape_string($conn, $_REQUEST['username'])
        : $username = '';

isset($_REQUEST['password'])
        ? $password = mysqli_real_escape_string($conn, $_REQUEST['password'])
        : $password = '';

isset($_REQUEST['password'])
        ? $password = mysqli_real_escape_string($conn, $_REQUEST['password'])
        : $password = '';

isset($_REQUEST['nama'])
        ? $nama = mysqli_real_escape_string($conn, $_REQUEST['nama'])
        : $nama = '';

isset($_REQUEST['alamat'])
        ? $alamat = mysqli_real_escape_string($conn, $_REQUEST['alamat'])
        : $alamat = '';

isset($_REQUEST['nohp'])
        ? $nohp = mysqli_real_escape_string($conn, $_REQUEST['nohp'])
        : $nohp = '';

$daftar = mysqli_query($conn, "select * from tb_users where username='$username' LIMIT 1");
$cek = mysqli_num_rows($daftar);

if($cek > 0){

header("Location: daftar.php?error=1");
exit();


}else{

$sql = mysqli_query($conn, "INSERT INTO tb_users (username,password,nama,alamat,nohp) VALUES ('$username', '$password', '$nama', '$alamat', '$nohp')");
if($sql){
header("Location: login.php?error=no");
}else{
header("Location: daftar.php?error=2");	
}


exit();
}	
	
} else{

header("Location: daftar.php?error=captha");
exit();
}




?>