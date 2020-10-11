<?php
require_once('inc/header.php');
require_once('inc/config.php');

isset($_REQUEST['id'])
        ? $id = $_REQUEST['id']
        : $id = '';

isset($_REQUEST['saran'])
        ? $saran = $_REQUEST['saran']
        : $saran = '';


isset($_REQUEST['enabled'])
        ? $enabled = $_REQUEST['enabled']
        : $enabled = '';

        $sql = mysqli_query($conn, "UPDATE tb_saran SET  saran='$saran', enabled='$enabled' where id='$id'");

if($sql){
header("Location: saran.php?sukses=3");
}else{
header("Location: saran.php?sukses=4"); 
}
?>