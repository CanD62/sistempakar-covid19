<?php 
require_once('inc/header.php');
require_once('inc/config.php');


isset($_REQUEST['form'])
        ? $form = $_REQUEST['form']
        : $form = '';

isset($_REQUEST['tabel'])
        ? $tabel = $_REQUEST['tabel']
        : $tabel = '';

 // nama file
 $filename= "data-$form-".date('Ymd').".xls";

 //header info for browser
 header("Content-Type: application/vnd-ms-excel"); 
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //menampilkan data sebagai array dari tabel produk
    $out=array();
 $sql=mysqli_query($conn, "SELECT * FROM $tabel");


 while($data=mysqli_fetch_assoc($sql)) $out[]=$data;

 $show_coloumn = false;
 foreach($out as $record) {
 if(!$show_coloumn) {
 //menampilkan nama kolom di baris pertama
 echo implode("\t", array_keys($record)) . "\n";
 $show_coloumn = true;
 }
 // looping data dari database
 echo implode("\t", array_values($record)) . "\n";
 } 
 exit;
?>