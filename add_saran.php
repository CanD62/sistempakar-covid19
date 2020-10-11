<?php
require_once('inc/header.php');
require_once('inc/config.php');


isset($_REQUEST['saran'])
        ? $saran = $_REQUEST['saran']
        : $saran = '';

//tipe 1
//$tanya1 = $_REQUEST['tanya1'];
isset($_REQUEST['enabled'])
        ? $enabled = $_REQUEST['enabled']
        : $enabled = '';


$sql = mysqli_query($conn, "INSERT INTO tb_saran (saran,enabled) VALUES ('$saran', '$enabled')");
if($sql){
header("Location: saran.php?sukses=1");
}else{
header("Location: saran.php?sukses=2");	
}