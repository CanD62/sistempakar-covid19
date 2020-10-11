<?php

require_once('inc/header.php');
require_once('inc/config.php');
$menu = 4;
$role = $_SESSION['role'];
if ($role ==2) {
header("Location: index.php");

exit();
}
if(isset($_GET['sukses']))
{   
if($_GET['sukses'] == '1')
{
$sucess = '<center><div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Berhasil Tambah Data Screening
</div></center>';   
    
}
 elseif ($_GET['sukses'] == '2') {
    $sucess = '<center><div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Gagal Tambah Data Screening
</div></center>'; 
 } elseif ($_GET['sukses'] == '3') {
    $sucess = '<center><div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Sukses Edit Data Screening
</div></center>'; 
 } elseif ($_GET['sukses'] == '4') {
    $sucess = '<center><div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Gagal Edit Data Screening
</div></center>'; 
 } elseif ($_GET['sukses'] == '5') {
    $sucess = '<center><div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Sukses Hapus Data Screening
</div></center>'; 
 } elseif ($_GET['sukses'] == '6') {
    $sucess = '<center><div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Gagal Hapus Data Screening
</div></center>'; 
 }else{
$sucess = '';
}
} else
{
$sucess = '';
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

        <title><?= $site; ?> - Admin</title>
        <!-- DataTables CSS -->
        <link href="./css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="./css/dataTables/dataTables.responsive.css" rel="stylesheet">
        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="./css/metisMenu.min.css" rel="stylesheet">

      
        <!-- Custom CSS -->
        <link href="./css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

           <?= include('inc/nav.inc'); ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Screening</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                     <?= $sucess; ?>
                    
                    <a href="xls.php?form=Screening&tabel=tb_riwayat" class="btn btn-info" ><i class="fa fa-file-excel-o"></i>
                                       Cetak Excel
                                    </a>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Screening
                                </div>
                                <!-- /.panel-heading -->


                                <div class="panel-body">
                                     <div class="tooltip-demo table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID Screening</th>
                                                    <th>Nama Screening</th>
                                                    <th>Saran</th>
                                                    <th>Tanggal</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                     
                                            <tbody>
                                                <tr>
                                               <?php
                    
                    $sql = mysqli_query($conn, "SELECT * FROM tb_riwayat");
                    while($data= mysqli_fetch_assoc($sql)){
                    $gejala_code = $data['gejala_code'];
                    $user_id = $data['user_id'];
                    $saran_id = $data['saran_id'];
                    $date = $data['date'];
                   
                    $sql1 = mysqli_query($conn, "SELECT * FROM tb_users where id='$user_id'");
                  	$data1 = mysqli_fetch_assoc($sql1);
                  	$nama = $data1['nama'];

                  	$sql2 = mysqli_query($conn, "SELECT * FROM tb_saran where id='$saran_id'");
                  	$data2 = mysqli_fetch_assoc($sql2);
                  	$saran = $data2['saran'];
                    //var_dump($no);
                    ?>
                                                    <td><?= $gejala_code; ?></td>
                                                    <td><?= $nama;?> </td>
                                                    <td><?= $saran;?></td>
                                                    <td><?= $date;?></td>
                                                   
                                                 
                                                    <td>
                                                    

                                        <a href="hasil.php?code_sc=<?=$gejala_code;?>" class="btn btn-info btn-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Data"><i class="fa fa-eye"></i></a>
                                    </td>


                                                </tr>
                                               <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                   
                    </div>
                  
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>

        <!-- jQuery -->
        <script src="./js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="./js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="./js/metisMenu.min.js"></script>


        <!-- Custom Theme JavaScript -->
        <script src="./js/startmin.js"></script>
       <!-- DataTables JavaScript -->
        <script src="./js/dataTables/jquery.dataTables.min.js"></script>
        <script src="./js/dataTables/dataTables.bootstrap.min.js"></script>

 <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
         <script>
            // tooltip demo
            $('.tooltip-demo').tooltip({
                selector: "[data-toggle=tooltip]",
                container: "body"
            })

            // popover demo
            $("[data-toggle=popover]").popover()
        </script>
    </body>
</html>
