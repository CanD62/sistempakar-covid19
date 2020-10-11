<?php

session_start();
require_once('inc/config.php');
if(empty($_SESSION['username']))
{
header("Location: login.php?error=3");	
exit();
} else{
$username= $_SESSION['username'];
$sql = mysqli_query($conn, "SELECT id,nama,nohp,alamat FROM tb_users where username='$username'");
$data= mysqli_fetch_assoc($sql);
$nama = $data['nama'];
$user_id = $data['id'];
$nohp = $data['nohp'];
$alamat = $data['alamat'];
}
?>