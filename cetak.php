<?php
 ob_start();

require_once('inc/config.php');

isset($_REQUEST['code_sc'])
        ? $code_sc = mysqli_escape_string($conn, $_REQUEST['code_sc'])
        : $code_sc = '';

$sql = mysqli_query($conn, "SELECT user_id,gejala_code,saran_id,date FROM tb_riwayat where gejala_code='$code_sc'");
$cek = mysqli_num_rows($sql);

if($cek > 0){
$data = mysqli_fetch_assoc($sql);
$gejala = $data['gejala_code'];
$saran_id = $data['saran_id'];
$tgl = $data['date'];

$sql = mysqli_query($conn, "SELECT saran FROM tb_saran where id='$saran_id' and enabled=1");
$cek = mysqli_num_rows($sql);
if($cek > 0){
$data = mysqli_fetch_assoc($sql);
$saran = $data['saran'];
} else{
 $saran = 'Data di hapus';   
}

}else{
	echo 'ke sc';
 header("Location: screening.php");
exit();
}	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $site; ?> - Dashboard</title>

        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="./css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="./css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="./css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<style type="text/css">
.zoom {
transition: transform .2s; /* Animation */
margin: 0 auto;
}
.zoom:hover {
transform: scale(2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
		</style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

      
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
						
                            <h1 class="page-header"><font color="blue">Hasil</font> Deteksi Mandiri Cepat <font color="red"> COVID-19</font>

</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
					
                        <!-- <div class="col-lg-3 col-md-6"> -->
                            <!-- <div class="panel panel-red"> -->
                                <!-- <div class="panel-heading"> -->
                                    <!-- <div class="row"> -->
                                        <!-- <div class="col-xs-3"> -->
                                            <!-- <i class="fa fa-support fa-5x"></i> -->
                                        <!-- </div> -->
                                        <!-- <div class="col-xs-9 text-right"> -->
                                            <!-- <div class="huge">13</div> -->
                                            <!-- <div>Support Tickets!</div> -->
                                        <!-- </div> -->
                                    <!-- </div> -->
                                <!-- </div> -->
                                <!-- <a href="#"> -->
                                    <!-- <div class="panel-footer"> -->
                                        <!-- <span class="pull-left">View Details</span> -->
                                        <!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->

                                        <!-- <div class="clearfix"></div> -->
                                    <!-- </div> -->
                                <!-- </a> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            
                           
                            <!-- /.panel -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-exchange"></i> Hasil Screening
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                   <table class="table table-striped table-hover w-100">
									<tr align="center">
									<th>ID Screening</th>
								<td><button type="button" class="btn btn-success"><?= $gejala; ?></button></td>
								</tr>
								

                                <tr align="center">
                                    <td colspan="2"><b>HASIL TEST GEJALA YANG DIRASAKAN</b></td>
                                 </tr>
                                 <?php

                                 $sql1 =mysqli_query($conn, "SELECT * FROM tb_jawaban where code='$code_sc'");
                                 while($data1 = mysqli_fetch_assoc($sql1)){
                                 $gejala_id = $data1['gejala_id'];
                                 $jawaban = $data1['jawaban'];
                                  if ($jawaban ==1) {
                                    $jawaban = '<button type="button" class="btn btn-info">Ya</button>';
                                 } else{
                                    $jawaban = '<button type="button" class="btn btn-danger">Tidak</button>';
                                 }
                                 $sql = mysqli_query($conn, "SELECT id,gejala FROM tb_gejala where id='$gejala_id' and tipe=1");
                    while($data= mysqli_fetch_assoc($sql)){
                    $id = $data['id'];
                    $gejala = $data['gejala'];
                    ?>
                                <tr align="center">
                                <th><?= $gejala; ?></th>
                                <td><?= $jawaban; ?></td>
                                </tr>

                            <?php } } ?>

                            <tr align="center">
                                    <td colspan="2"><b>HASIL TEST RIWAYAT KONTAK</b></td>
                                 </tr>
                                 <?php

                                 $sql1 =mysqli_query($conn, "SELECT * FROM tb_jawaban where code='$code_sc'");
                                 while($data1 = mysqli_fetch_assoc($sql1)){
                                 $gejala_id = $data1['gejala_id'];
                                 $jawaban = $data1['jawaban'];
                                  if ($jawaban ==1) {
                                    $jawaban = '<button type="button" class="btn btn-info">Ya</button>';
                                 } else{
                                    $jawaban = '<button type="button" class="btn btn-danger">Tidak</button>';
                                 }
                                 $sql = mysqli_query($conn, "SELECT id,gejala FROM tb_gejala where id='$gejala_id' and tipe=2");
                    while($data= mysqli_fetch_assoc($sql)){
                    $id = $data['id'];
                    $gejala = $data['gejala'];
                    ?>
                                <tr align="center">
                                <th><?= $gejala; ?></th>
                                <td><?= $jawaban; ?></td>
                                </tr>

                            <?php } } ?>

                            <tr align="center">
                                    <td colspan="2"><b>HASIL TEST RIWAYAT MOBILITAS</b></td>
                                 </tr>
                                 <?php

                                 $sql1 =mysqli_query($conn, "SELECT * FROM tb_jawaban where code='$code_sc'");
                                 while($data1 = mysqli_fetch_assoc($sql1)){
                                 $gejala_id = $data1['gejala_id'];
                                 $jawaban = $data1['jawaban'];
                                 if ($jawaban ==1) {
                                    $jawaban = '<button type="button" class="btn btn-info">Ya</button>';
                                 } else{
                                    $jawaban = '<button type="button" class="btn btn-danger">Tidak</button>';
                                 }
                                 $sql = mysqli_query($conn, "SELECT id,gejala FROM tb_gejala where id='$gejala_id' and tipe=3");
                    while($data= mysqli_fetch_assoc($sql)){
                    $id = $data['id'];
                    $gejala = $data['gejala'];
                    ?>
                                <tr align="center">
                                <th><?= $gejala; ?></th>
                                <td><?= $jawaban; ?></td>
                                </tr>

                            <?php } } ?>

                            <tr align="center">
                                <th>Saran</th>
                                <td><h4><?= $saran; ?></h4></td>
                                </tr>
                                <tr align="center">
                                <th>Tanggal Screening</th>
                                <td><?= $tgl; ?></td>
                                </tr>
									</tbody>
									</table>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
           

       
        <!-- /#wrapper -->
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
   <!-- jQuery -->
        <script src="./js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="./js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="./js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="./js/startmin.js"></script>

    </body>
</html>
