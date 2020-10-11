<?php


if(isset($_POST['submit'])){
	
		
	$kodebarang=$_POST['kodebarang'];
	$namabarang=$_POST['namabarang'];
	$harga=$_POST['harga'];
	$jumlah=$_POST['jumlah'];
	$bayar=$harga*$jumlah;
	//===== menghitung diskon =====================
	if ($bayar > 100000 )
	{
		$diskon=$bayar*0.02;
	}
	elseif ($bayar > 200000 )
	{
		$diskon=$bayar*0.05;
	}
	else
	{
		$diskon=0;
	}
	//========== mencari bonus =================================================
	if ($bayar > 300000 )
	{
		$bonus="Boneka";
	}
	elseif ($bayar > 200000 )
	{
		$bonus="Gantungan Kunci";
	}
	else
	{
		$bonus="Tidak ada";
	}
	
	$totalbayar=$bayar-$diskon;
	
	echo" Kode barang : $kodebarang<br>";
	echo" Nama barang : $namabarang<br>";
	echo" Jumlah barang : $jumlah<br>";
	echo" Harga barang : $harga<br>";
	echo" Bayar : $bayar<br>";
	echo" Diskon : $diskon<br>";
	echo" Total Bayar : $totalbayar<br>";
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

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Startmin</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                           
                            
                            <li>
                                <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Forms Penjualan</a>
                            </li>
							 <li>
                                <a href="forms1.php"><i class="fa fa-edit fa-fw"></i> Forms Kredit Motor</a>
                            </li>
							 <li>
                                <a href="forms2.php"><i class="fa fa-edit fa-fw"></i> Forms Rekening Air</a>
                            </li>
							 <li>
                                <a href="forms3.php"><i class="fa fa-edit fa-fw"></i> Forms Penggajian</a>
                            </li>
							 <li>
                                <a href="forms4.php"><i class="fa fa-edit fa-fw"></i> Forms Bebas</a>
                            </li>
                            
                           
                         
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Forms Penjualan</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Basic Form Elements
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" method="post">
                                                <div class="form-group">
                                                    <label>Kode Barang </label>
                                                    <input class="form-control" type="text" required  size="15" name="kodebarang"/>
                                                    
                                                </div>
												<div class="form-group">
                                                    <label>Nama Barang</label>
                                                    <input class="form-control" type="text" required size="30" name="namabarang">
                                                    
                                                </div>
												<div class="form-group">
                                                    <label>Jumlah Barang </label>
                                                    <input class="form-control" type="text" required name="jumlah">
                                                   
                                                </div>
												<div class="form-group">
                                                    <label>Harga Barang</label>
                                                    <input class="form-control" type="text" required name="harga" size="30">
                                                   
                                                </div>
												<div class="form-group">
                                                    <label>Kode Barang</label>
                                                    <input class="form-control" type="text" required value="<?php echo $kodebarang; ?>" size="30">
                                                   
                                                </div>
                                                <button type="submit" class="btn btn-default" name="submit">Submit Button</button>
                                                <button type="reset" class="btn btn-default">Reset Button</button>
                                            </form>
                                        </div>
                                      
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>

