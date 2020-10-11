<?php
require_once('inc/header.php');
require_once('inc/config.php');

isset($_REQUEST['id'])
        ? $id = $_REQUEST['id']
        : $id = '';


        $sql = mysqli_query($conn, "DELETE FROM tb_saran WHERE id='$id'");

if($sql){
header("Location: saran.php?sukses=5");
}else{
header("Location: saran.php?sukses=6"); 
}
?>