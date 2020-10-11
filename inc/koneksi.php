<?php
//https://www.youtube.com/watch?v=KAUKSyj6qaY
$conn = mysqli_connect("localhost","root","","sistempakar_db");
 // var_dump($conn);

 // exit;
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
} 
// else{
// 	echo "Koneksi berhasil";
// }
 




?>