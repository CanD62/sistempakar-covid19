<?php



require_once('inc/header.php');
require_once('inc/config.php');
$menu = 2;
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
Berhasil Tambah Data Gejala
</div></center>';   
    
}
 elseif ($_GET['sukses'] == '2') {
    $sucess = '<center><div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Gagal Tambah Data Gejala
</div></center>'; 
 } elseif ($_GET['sukses'] == '3') {
    $sucess = '<center><div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Sukses Edit Data Gejala
</div></center>'; 
 } elseif ($_GET['sukses'] == '4') {
    $sucess = '<center><div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Gagal Edit Data Gejala
</div></center>'; 
 } elseif ($_GET['sukses'] == '5') {
    $sucess = '<center><div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Sukses Hapus Data Gejala
</div></center>'; 
 } elseif ($_GET['sukses'] == '6') {
    $sucess = '<center><div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
Gagal Hapus Data Gejala
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
                            <h1 class="page-header">Data Gejala</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                     <?= $sucess; ?>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i>
                                        Tambah Data
                                    </button>
                    <a href="xls.php?form=gejala&tabel=tb_gejala" class="btn btn-info" ><i class="fa fa-file-excel-o"></i>
                                       Cetak Excel
                                    </a>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Gejala
                                </div>
                                <!-- /.panel-heading -->


                                <div class="panel-body">
                                     <div class="tooltip-demo table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>ID Gejala</th>
                                                    <th>Nama Gejala</th>
                                                    <th>Gejala</th>
                                                    <th>Tipe</th>
                                                    <th>Status</th>
                                                    
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                     
                                            <tbody>
                                                <tr>
                                               <?php
                    
                    $sql = mysqli_query($conn, "SELECT * FROM tb_gejala ");
                    while($data= mysqli_fetch_assoc($sql)){
                    $id = $data['id'];
                    $nama_gejala = $data['nama_gejala'];
                    $gejala = $data['gejala'];
                    $tipe = $data['tipe'];
                    $enabled = $data['enabled'];
                     if($tipe == 1){
                        $tipe  = 'GEJALA YANG DIRASAKAN';
                     }elseif ($tipe ==2) {
                       $tipe  = 'RIWAYAT KONTAK';
                     } elseif ($tipe ==3) {
                       $tipe  = 'RIWAYAT MOBILITAS';
                     }
                     if ($enabled == 1) {
                      $enabled = '<button type="button" class="btn btn-success">Aktif</button>';
                     }elseif ($enabled==2) {
                        $enabled = '<button type="button" class="btn btn-danger">Non-Aktif</button>';
                     }


                    //var_dump($no);
                    ?>
                                                    <td><?= $id; ?></td>
                                                    <td><?= $nama_gejala;?> </td>
                                                    <td><?= $gejala;?></td>
                                                    <td><?= $tipe;?></td>
                                                    <td><?= $enabled;?></td>
                                                 
                                                    <td>
                                                     <a href="javascript:;" onclick="show_edit('edit_gejala.php?id=<?= $id;?>')" class="btn btn-info btn-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data"><i class="fa fa-pencil"></i></a>

                                        <a href="javascript:;" onclick="show_hapus('hapus_gejala.php?id=<?= $id;?>')" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="fa fa-times"></i></a>
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
        <!-- /#wrapper -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Tambah Gejala</h4>
                                                </div>
                                                <div class="modal-body">
                                                      <form role="form" action="add_gejala.php" method="post">
                                                <div class="form-group">
                                                    <label>Nama Gejala </label>
                                                    <input class="form-control" name="nama_gejala" placeholder="Masukan Nama Gejala" required>
                                                  
                                                </div>
                                                <div class="form-group">
                                                    <label>Gejala </label>
                                                    <input class="form-control" id="id" name="gejala" placeholder="Masukan Gejala" required>
                                                </div>

                                                 
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Tipe Gejala</label>
                                                    <select class="form-control" id="tipe" name="tipe">
                                                    <option value="">-Pilih Tipe Gejala-</option>
                                                    <option value="1">GEJALA YANG DIRASAKAN</option>     
                                                    <option value="2">RIWAYAT KONTAK</option>      
                                                    <option value="3">RIWAYAT MOBILITAS</option>  
                                                    
                                                    </select>
                                                </div>  
                                            </div>  
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control"  name="enabled">
                                                    <option value="">-Pilih Status-</option>
                                                    <option value="1">Aktif</option>     
                                                    <option value="2">Non-Aktif</option>      
                                                    
                                                    
                                                    </select>
                                                </div>
                                                </div>  
                                               


                                                
                                                <button type="submit"  name="submit" class="btn btn-primary">Tambah Data</button>
                                                <button type="reset"  class="btn btn-default">Kosongkan</button>
                                            </form>
                                                </div>
                                              
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
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

<script type="text/javascript">
function show_edit(link) {
    $('#EditModal').modal('show');
    $.ajax({
        type: "GET",
        url: link,
        dataType: "html",
        success: function(data) {
            $('#show-detail-edit').html(data);
        }, error: function() {
            $('#show-detail-edit').html('Terjadi kesalahan...');
        }, beforeSend: function() {
            $('#show-detail-edit').html('Sedang memuat...');
        }
    });
}
</script>




<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="EditModalLabel">Edit Gejala</h4>
                                                </div>
                                                <div class="modal-body" id="show-detail-edit">
                                                    
                                                </div>
                                              
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>


<script type="text/javascript">
function show_hapus(link) {
    $('#HapusModal').modal('show');
    $.ajax({
        type: "GET",
        url: link,
        dataType: "html",
        success: function(data) {
            $('#show-detail-hapus').html(data);
        }, error: function() {
            $('#show-detail-hapus').html('Terjadi kesalahan...');
        }, beforeSend: function() {
            $('#show-detail-hapus').html('Sedang memuat...');
        }
    });
}
</script>

<div class="modal fade" id="HapusModal" tabindex="-1" role="dialog" aria-labelledby="HapusModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="HapusModalLabel">Hapus Gejala</h4>
                                                </div>
                                                <div class="modal-body" id="show-detail-hapus">
                                                    
                                                </div>
                                              
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
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
