<?php

require_once('inc/header.php');
require_once('inc/config.php');
$menu = 1;





if(isset($_GET['success']))
{	
if($_GET['success'] == 'login')
{
$sucess = '<center><div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Halo, '.$nama.'<br> Anda Berhasil Login !
</div></center>';	
	
}
 else
{
$sucess = '';
}
} else
{
$sucess = '';
}	

$sql = mysqli_query($conn, "SELECT id FROM tb_users");
$total_users = mysqli_num_rows($sql);

$sql = mysqli_query($conn, "SELECT id FROM tb_riwayat");
$total_riwayat = mysqli_num_rows($sql);

$sql = mysqli_query($conn, "SELECT id FROM tb_gejala where enabled=1");
$total_pertanyaan= mysqli_num_rows($sql);
//var_dump($total_riwayat);
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

        <div id="wrapper">

            <?= include('inc/nav.inc'); ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
						<?= $sucess;?>
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
					
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?=$total_users?></div>
                                            <div>Pengguna</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?=$total_riwayat?></div>
                                            <div>Screening</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-question fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?=$total_pertanyaan?></div>
                                            <div>Pertanyaan Gejala</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
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
                        <div class="col-lg-8">
                            
                           
                            <!-- /.panel -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-clock-o fa-fw"></i> Berita Terkini
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge"><i class="fa fa-check"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Pasien Sembuh Bertambah Menjadi 122.802 Kasus</h4>

                                                    <p>
                                                        <small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via
                                                            Twitter
                                                        </small>
                                                    </p>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Penambahan pasien sembuh dari COVID-19 per 29 Agustus 2020, sebanyak 1.902 kasus. Total kasus sembuh sejauh ini sudah mencapai 122.802 kasus. Untuk jumlah suspek hari ini ada 76.252 kasus dan 28.905 spesimen.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-inverted">
                                            <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Sejarah Penggunaan Masker di Dunia</h4> <p>
                                                        <small class="text-muted"><i class="fa fa-clock-o"></i> 1 days ago via
                                                            Twitter
                                                        </small>
                                                    </p>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Saat ini masker telah menjadi salah satu kebutuhan setiap orang yang sangat penting keberadaannya. Demi aman dari COVID-19 setiap orang harus menggunakan masker jika hendak berpergian keluar rumah. Sejarah mengatakan masker sudah sedari dulu digunakan masyarakat dunia terlebih ketika menghadapi suatu wabah.</p>

                                                    <p>Salah seorang sejarahwan, Bonnie Triyana mengatakan masker tertua yang dapat terlacak dimulai di Eropa pada abad ke-17 yang berbentuk seperti burung dan digunakan untuk menghadapi penyakit yang sedang melanda pada saat itu.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Infografis COVID-19 (28 Agustus 2020)</h4>
													 <p>
                                                        <small class="text-muted"><i class="fa fa-clock-o"></i> 3 days ago via
                                                            Twitter
                                                        </small>
                                                    </p>
                                                </div>
                                                <div class="timeline-body">
                                                    <p><img class="zoom" src="img/img_corona_data.png" height="200px" width="400px"></p>
                                                </div>
                                            </div>
                                        </li>
                                       
                                      
                                    </ul>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bell fa-fw"></i> Data Sebaran Corona Indonesia
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-plus-circle fa-fw"></i> Positif
                                                <span class="pull-right text-muted small"><em>169.195</em>
                                                </span>
                                        </a>
                                        <a href="#" class="list-group-item">
										
                                            <i class="fa fa-check-circle fa-fw"></i> Sembuh
                                                <span class="pull-right text-muted small"><em>122.802</em>
                                                </span>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="fa fa-minus-circle fa-fw"></i> Meninggal
                                                <span class="pull-right text-muted small"><em>7.261</em>
                                                </span>
                                        </a>
                                        
                                    </div>
                                    <!-- /.list-group -->
                                    <a href="#" class="btn btn-default btn-block">Update Terakhir: 29-08-2020</a>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                           
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

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
