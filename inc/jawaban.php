<?php
require_once('koneksi.php');


$sql = mysqli_query($conn, "SELECT * FROM tb_jawaban");
while($data = mysqli_fetch_assoc($sql)){

echo $data['user_id'].'|'.$data['gejala_id'].'|'.$data['jawaban'].'<br>';


}




// $sql = mysqli_query($conn, "SELECT * FROM tb_jawaban");
// while($data = mysqli_fetch_assoc($sql)){

// echo $data['user_id'].'|'.$data['gejala_id'].'|'.$data['jawaban'].'<br>';


// }





?>