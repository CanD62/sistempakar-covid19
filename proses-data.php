<?php
require_once('inc/header.php');
require_once('inc/config.php');
$tgl = date('Y-m-d');

isset($_REQUEST['code_sc'])
        ? $code_sc = $_REQUEST['code_sc']
        : $code_sc = '';

//tipe 1
//$tanya1 = $_REQUEST['tanya1'];
isset($_REQUEST['tanya1'])
        ? $tanya1 = $_REQUEST['tanya1']
        : $tanya1 = '';
//$tanya2 = $_REQUEST['tanya2'];
isset($_REQUEST['tanya2'])
        ? $tanya2 = $_REQUEST['tanya2']
        : $tanya2 = '';
//$tanya3 = $_REQUEST['tanya3'];
isset($_REQUEST['tanya3'])
        ? $tanya3 = $_REQUEST['tanya3']
        : $tanya3 = '';
//$tanya4 = $_REQUEST['tanya4'];
isset($_REQUEST['tanya4'])
        ? $tanya4 = $_REQUEST['tanya4']
        : $tanya4 = '';
//$tanya5 = $_REQUEST['tanya5'];
isset($_REQUEST['tanya5'])
        ? $tanya5 = $_REQUEST['tanya5']
        : $tanya5 = '';
//tipe 2		
//$tanya6 = $_REQUEST['tanya6'];
isset($_REQUEST['tanya6'])
        ? $tanya6 = $_REQUEST['tanya6']
        : $tanya6 = '';
//tipe 3
//$tanya7 = $_REQUEST['tanya7'];
isset($_REQUEST['tanya7'])
        ? $tanya7 = $_REQUEST['tanya7']
        : $tanya7 = '';
//$tanya8 = $_REQUEST['tanya8'];
isset($_REQUEST['tanya8'])
        ? $tanya8 = $_REQUEST['tanya8']
        : $tanya8 = '';
//var_dump($tanya7);

$array = array($tanya1,$tanya2,$tanya3,$tanya4,$tanya5,$tanya6,$tanya7,$tanya8);
$array = array_combine(range(1, count($array)), array_values($array));

foreach($array as $key => $val) {
//var_dump($key); // "kanye"
$sql = mysqli_query($conn, "INSERT INTO tb_jawaban (user_id, gejala_id, jawaban, code) VALUES ('$user_id', '$key', '$val', '$code_sc')");

}


//exit;
$riwayat_kotak = ($tanya6==1)?true:false;



/* Mengecek riwayat mobilitas apabila tidak ada riwayat,maka mengembalikan nilai false */
function check_mobilitas($t7,$t8){
$tanya7 = $t7;
$tanya8 = $t8;
if($tanya7=='0' && $tanya8=='0') return false;
else return true;
}

/* Mengecek  apakah tidak ada gejala */
function checkGejala($t1,$t2,$t3,$t4,$t5){
$tanya1 = $t1;
$tanya2 = $t2;
$tanya3 = $t3;
$tanya4 = $t4;
$tanya5 = $t5;
	
            if($tanya1=='0' && $tanya2=='0' && $tanya3=='0' && $tanya4=='0' && $tanya5=='0') return false;
            else return true;
}
//var_dump( check_mobilitas($tanya7,$tanya8));
//var_dump( checkGejala($tanya1,$tanya2,$tanya3,$tanya4,$tanya5));






if($tanya1 !=''&&$tanya2 !=''&&$tanya3 !=''&&$tanya4 !=''&&$tanya5 !=''&&$tanya6 !=''&&$tanya7 !=''&&$tanya8 !=''){
	
	
	if(!check_mobilitas($tanya7,$tanya8) && !$riwayat_kotak){ 
                        if(!checkGejala($tanya1,$tanya2,$tanya3,$tanya4,$tanya5)) {
							echo 'sehat';
header("Location: ./hasil.php?code_sc=$code_sc");
						$sql = mysqli_query($conn, "INSERT INTO tb_riwayat (user_id, gejala_code, saran_id, date) VALUES ('$user_id', '$code_sc', '2', '$tgl')");
							//var_dump($sql);
						
						} elseif($tanya1=='1' && $tanya2=='1' && $tanya4=='1' && $tanya3=='0' && $tanya5=='0'){ 
							header("Location: ./hasil.php?code_sc=$code_sc");
							//echo 'Infeksi Saluran Pernafasan Akut (ISPA BUKAN PNEUMONIA) atau BUKAN KARENA COVID-19';
						$sql = mysqli_query($conn, "INSERT INTO tb_riwayat (user_id, gejala_code, saran_id, date) VALUES ('$user_id', '$code_sc', '3', '$tgl')");
						}else {
						//echo 'RS';
						header("Location: ./hasil.php?code_sc=$code_sc");
						$sql = mysqli_query($conn, "INSERT INTO tb_riwayat (user_id, gejala_code, saran_id, date) VALUES ('$user_id', '$code_sc', '1', '$tgl')");
						}
						
	}elseif(check_mobilitas($tanya7,$tanya8)==true || $riwayat_kotak==true ){
						//echo 'RSSS';
						$sql = mysqli_query($conn, "INSERT INTO tb_riwayat (user_id, gejala_code, saran_id, date) VALUES ('$user_id', '$code_sc', '1', '$tgl')");
						header("Location: ./hasil.php?code_sc=$code_sc");
	}
	
		
}else{
	echo 'belum diisi ';
	header("Location: ./screening.php?status=gagal");
}




?>