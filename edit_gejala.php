<?php
require_once('inc/header.php');
require_once('inc/config.php');

isset($_REQUEST['id'])
        ? $id = $_REQUEST['id']
        : $id = '';

$sql = mysqli_query($conn, "SELECT * FROM  tb_gejala where id='$id'");
$data = mysqli_fetch_assoc($sql);
 if ($data['enabled'] == 1) {
$enabled = '<button type="button" class="btn btn-success">Aktif</button>';
}elseif ($data['enabled']==2) {
$enabled = '<button type="button" class="btn btn-danger">Non-Aktif</button>';
}
  if($data['tipe'] == 1){
 $tipe  = 'GEJALA YANG DIRASAKAN';
}elseif ($data['tipe'] ==2) {
 $tipe  = 'RIWAYAT KONTAK';
} elseif ($data['tipe'] ==3) {
  $tipe  = 'RIWAYAT MOBILITAS';
}

?>

<form role="form" method="post" action="proses_edit_gejala.php">
                                              <div class="form-group">
                                                    <label>Nama Gejala </label>
                                                    <input class="form-control" name="nama_gejala" value="<?= $data['nama_gejala'];?>" required>
                                                  
                                                </div>
                                                <div class="form-group">
                                                    <label>Gejala </label>
                                                    <input class="form-control"  name="gejala" value="<?= $data['gejala'];?>" required>
                                                </div>
                                            <input type="hidden" class="form-control" name="id" value="<?= $id; ?>">
                                                 
                                                <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Tipe Gejala</label>
                                                    <select class="form-control"  name="tipe">
                                                      <option selected="selected" value="<?=$data['tipe'];?>"> (<?= $tipe; ?>)</option>
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
                                                      <option selected="selected" value="<?=$data['enabled'];?>"> (<?= $enabled; ?>)</option>
                                                    <option value="1">Aktif</option>     
                                                    <option value="2">Non-Aktif</option>      
                                                    
                                                    
                                                    </select>
                                                </div>
                                                </div>  
                                                
                                                <button type="submit"  name="submit" class="btn btn-primary">Edit Data</button>
                                            
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                            </form>