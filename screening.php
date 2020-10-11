<?php
require_once('inc/header.php');
require_once('inc/config.php');
$menu = 2;
function create_random($length)
{
    $data = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
    $string = '';
    for($i = 0; $i < $length; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return $string;
}

if(isset($_GET['status']))
{   
if($_GET['status'] == 'gagal')
{
$sucess = '<center><div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Data belum lengkap!
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
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $site; ?> - Screening</title>

        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="./css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.js"></script> -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
		<style>
    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 15px;
    }

    table,
    th {
        border: 0px solid black;
    }
    td {
        font-weight: bold;
    }
    input[type="radio"]{
        opacity: 10;
        height: 25px;
        width: 25px;
    }
    #status {
        font-size: 2rem;
    }

    /* The container */
.container_radio {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container_radio input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

    /** */
    .radio {
        position: relative;
    }

    input[type="radio"] {
        position: absolute;
        opacity: 0;
    }

    .checkmark_t {
        position: absolute;
        top: -2px;
        left: 0;
        height: 25px;
        width: 25px;
        border: 2px solid #f10f4d;
        border-radius: 50%;
		margin-left: -10px;
    }

    .radio:hover input~.checkmark_t {
        background-color: #ccc;
    }

    .radio input:checked~.checkmark_t {
        border: 2px solid #f10f4d;
    }

    .checkmark_t:after {
        content: "";
        position: absolute;
        display: none;
    }

    .radio input:checked~.checkmark_t:after {
        display: block;
    }

    .radio .checkmark_t:after {
        top: 1px;
        left: 2px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #f10f4d;
    }
    
    .checkmark {
        position: absolute;
        top: -2px;
        left: 0;
        height: 25px;
        width: 25px;
        border: 2px solid #2ecc71;
        border-radius: 50%;
		margin-left: -10px;
    }

    .radio:hover input~.checkmark {
        background-color: #ccc;
    }

    .radio input:checked~.checkmark {
        border: 2px solid #2ecc71;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .radio input:checked~.checkmark:after {
        display: block;
    }

    .radio .checkmark:after {
        top: 1px;
        left: 2px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #2ecc71;
    }
</style>
    </head>
    <body>

        <div id="wrapper">

          <?= include('inc/nav.inc'); ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Deteksi Mandiri Cepat <font color="red"> COVID-19</font>

</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <?= $sucess;?>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Jawab Pertanyaan Berikut Untuk Memulai Deteksi Mandiri
                                </div>
                           <form role="form" method="GET" action="proses-data.php">      
        <div class="table-responsive">
            <table class="table">
                <input type="hidden" name="code_sc" value="<?= create_random(5); ?>">
                <tbody>
                    <tr style="background-color:#c1c1c1ad;">
                        <td><b>GEJALA YANG DIRASAKAN</b></td>
                        <td></td>
                        <td></td>
                    </tr>
					<?php
					$no =0;
					$sql = mysqli_query($conn, "SELECT id,nama_gejala FROM tb_gejala where enabled=1 and tipe=1");
					while($data= mysqli_fetch_assoc($sql)){
					$id = $data['id'];
					$nama_gejala = $data['nama_gejala'];
					$no++;
					//var_dump($no);
					?>
					
                    <tr>
                        <td><?=$nama_gejala; ?></td>
                        <td>
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio">Tidak
                                        <input type="radio" name="tanya<?=$no;?>" value="0">
                                        <span class="checkmark_t"></span>
                                    </label>
                                </div>                        
                            </div>
                        </td>
                        <td >
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio"> Ya
                                        <input type="radio" name="tanya<?=$no;?>"  value="1">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>                        
                            </div>
                        </td>
                    </tr>
					
					<?php } ?>
					
                    
                    <tr style="background-color:#c1c1c1ad;">
                        <td><b>RIWAYAT KONTAK</b></td>
                        <td></td>
                        <td></td>
                    </tr>
					<?php
					
					$sql = mysqli_query($conn, "SELECT id,nama_gejala FROM tb_gejala where enabled=1 and tipe=2");
					while($data= mysqli_fetch_assoc($sql)){
					$id = $data['id'];
					$nama_gejala = $data['nama_gejala'];
					
					//var_dump($no);
					?>
                    <tr>
					
                        <td><?=$nama_gejala;?><br/>
						<small>"Melakukan kontak fisik, atau berada dalam satu ruangan, atau berkunjung (berada dalam radius 1 meter dengan kasus pasien dalam pengawasan, probable atau konformasi) dalam 2 hari sebelum kasus timbul gejala dan hingga 14 hari setelah kasus timbul gejala"</small></td>
                        <td>
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio">Tidak
                                        <input type="radio"  name="tanya6" value="0">
                                        <span class="checkmark_t"></span>
                                    </label>
                                </div>                        
                            </div>
                        </td>
                        <td >
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio">Ya
                                        <input type="radio" name="tanya6" value="1">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>                        
                            </div>
                        </td>
                    </tr>
					<?php } ?>
                    <tr style="background-color:#c1c1c1ad;">
                        <td><b>RIWAYAT MOBILITAS</b></td>
                        <td></td>
                        <td></td>
                    </tr>
					<?php
					$no = 6;
					$sql = mysqli_query($conn, "SELECT id,nama_gejala FROM tb_gejala where enabled=1 and tipe=3");
					while($data= mysqli_fetch_assoc($sql)){
					$id = $data['id'];
					$nama_gejala = $data['nama_gejala'];
					$no++;
					//var_dump($no);
					?>
                    <tr>
                         <td><?=$nama_gejala;?><br/>
                        <td>
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio">Tidak
                                        <input type="radio" name="tanya<?=$no;?>" value="0">
                                        <span class="checkmark_t"></span>
                                    </label>
                                </div>                        
                            </div>
                        </td>
                        <td >
                            <div class="form-group">
                                <div class="radio">
                                    <label class="container_radio">Ya
                                        <input type="radio" name="tanya<?=$no;?>" value="1">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>                        
                            </div>
                        </td>
                    </tr>
					<?php } ?>
					
                </tbody>
            </table>
            
            <!-- <div class="alert alert-primary" role="alert" id="status"></div> -->
            <!-- <div class="alert" role="alert" id="loading"></div> -->
            <hr class="mb-4">
            <p>
                <button class="btn  btn-lg btn-block" style="background-color:#2693ff;color:white;">Cek Status</button>    
            </p>        
        </div>
		</form>
   
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
<!-- <script> -->
<!-- $(document).ready(function() { -->
    <!-- $("#submit").click(function(event) { -->
        <!-- event.preventDefault(); -->
        <!-- var tipe = $("#tipe").val(); -->
		<!-- var hargaperkg = $("#hargaperkg").val(); -->
		<!-- var jumlah = $("#jumlah").val(); -->
		<!-- var uang = $("#uang").val(); -->
        <!-- var obj = {}; -->
        <!-- obj['tipe'] = tipe; -->
       <!-- obj['hargaperkg'] = hargaperkg; -->
	   <!-- obj['jumlah'] = jumlah; -->
	   <!-- obj['uang'] = uang; -->
        <!-- $.ajax({ -->
            <!-- url: 'proses_cemilan.php', -->
            <!-- type: 'POST', -->
            <!-- data: obj, -->
            
            <!-- success: function(response) { -->
                <!-- var json = response, -->
				<!-- obj = JSON.parse(json); -->
             <!-- console.log(obj); -->
			   <!-- // //console.log(obj.jumlah); -->
			   <!-- $("#sub_total").val(obj.sub_total); -->
			   <!-- $("#diskon").val(obj.diskon); -->
			    <!-- $("#total").val(obj.total); -->
				<!-- $("#kembalian").val(obj.kembalian); -->
				<!-- $("#pesan").html(obj.pesan); -->
            <!-- }, -->
            <!-- error: function() { -->
                <!-- $('#submit').prop('disabled', false).text('Submit Failed'); -->
            <!-- } -->
        <!-- }) -->
    <!-- }) -->
<!-- }); -->

<!-- </script> -->
<!-- <script> -->
<!-- $( "#resetin" ).click(function() { -->
  <!-- $( "#pesan" ).empty(); -->
 <!-- $("#kembalian").val(''); -->
  <!-- $("#total").val(''); -->
   <!-- $("#diskon").val(''); -->
    <!-- $("#sub_total").val(''); -->

<!-- }); -->
<!-- </script> -->
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
