<?php
require_once('inc/header.php');
require_once('inc/config.php');

isset($_REQUEST['id'])
        ? $id = $_REQUEST['id']
        : $id = '';

isset($_REQUEST['nama_gejala'])
        ? $nama_gejala = $_REQUEST['nama_gejala']
        : $nama_gejala = '';

isset($_REQUEST['gejala'])
        ? $gejala = $_REQUEST['gejala']
        : $gejala = '';

isset($_REQUEST['tipe'])
        ? $tipe = $_REQUEST['tipe']
        : $tipe = '';

isset($_REQUEST['enabled'])
        ? $enabled = $_REQUEST['enabled']
        : $enabled = '';

        $sql = mysqli_query($conn, "UPDATE tb_gejala SET  nama_gejala='$nama_gejala', gejala='$gejala', tipe='$tipe', enabled='$enabled' where id='$id'");

if($sql){
header("Location: gejala.php?sukses=3");
}else{
header("Location: gejala.php?sukses=4"); 
}
?>