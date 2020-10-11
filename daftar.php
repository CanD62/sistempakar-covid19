<?php
require_once('inc/config.php');
if(isset($_GET['error']))
{	
if($_GET['error'] == 1)
{
$error = '<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Username sudah digunakan !
</div>';	
} else if($_GET['error'] == 2)
{
$error = '<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Terjadi kesalahan, silahkan ulangi
</div>';	
} else if($_GET['error'] == 3)
{
$error = '<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Anda Harus Login dulu !
</div>';	
} else if($_GET['error'] == 'captha')
{
$error = '<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Silahkan verifikasi captha!
</div>';    
}
 else
{
$error = '';
}
} else
{
$error = '';
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

        <title><?= $site; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="./css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <script src='https://www.google.com/recaptcha/api.js'></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
			
                <div class="col-md-4 col-md-offset-4">
				
                    <div class="login-panel panel panel-default">
					
                        <div class="panel-heading">
						
                            <h3 class="panel-title">Silahkan Mendaftar</h3>
                        </div>
                        <div class="panel-body">
						<center><?= $error; ?></center>
                            <form role="form" action="cek_daftar.php" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nama Lengkap" name="nama" type="text"  required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Alamat" name="alamat" type="text"  required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nomor HP" name="nohp" type="text"  required>
                                    </div>
                                     <div class="form-group">
                                     <div class="input-group with-focus">
                                   <div class="g-recaptcha" data-sitekey="6LfUIdYZAAAAAK__oHkyMkXqwd7GiDE4DZo6E9i9"></div>
                                    </div>
                                    <div class="checkbox">
                                        
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button class="btn btn-lg btn-success btn-block">Daftar Sekarang</button><hr>
                                   Sudah punya akun? <a href="login.php" class="btn btn-lg btn-info btn-block">Login</a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
