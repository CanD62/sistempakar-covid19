<?php
require_once('inc/header.php');
require_once('inc/config.php');


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



$sql = mysqli_query($conn, "INSERT INTO tb_gejala (nama_gejala,gejala,tipe,enabled) VALUES ('$nama_gejala', '$gejala', '$tipe', '$enabled')");
if($sql){
header("Location: gejala.php?sukses=1");
}else{
header("Location: gejala.php?sukses=2");	
}