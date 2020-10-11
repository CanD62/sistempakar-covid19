<?php
require_once('inc/header.php');
require_once('inc/config.php');

isset($_REQUEST['id'])
        ? $id = $_REQUEST['id']
        : $id = '';

$sql = mysqli_query($conn, "SELECT * FROM  tb_saran where id='$id'");
$data = mysqli_fetch_assoc($sql);
 if ($data['enabled'] == 1) {
$enabled = '<button type="button" class="btn btn-success">Aktif</button>';
}elseif ($data['enabled']==2) {
$enabled = '<button type="button" class="btn btn-danger">Non-Aktif</button>';
}
?>

<form role="form" method="post" action="proses_edit_saran.php">
                                                <div class="form-group">
                                                    <label>Nama Saran </label>
                                                    <input class="form-control" name="saran" value="<?= $data['saran']; ?>" required>
                                                  
                                                </div>
                                                
                                               
                                              <input type="hidden" class="form-control" name="id" value="<?= $id; ?>">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" id="tipe" name="enabled">
                                                        <option selected="selected" value="<?=$data['enabled'];?>"> (<?= $enabled; ?>)</option>
                                                   
                                                    <option value="1">Aktif</option>     
                                                    <option value="2">Non-Aktif</option>      
                                                    
                                                    
                                                    </select>
                                                </div>
                                                
                                                <button type="submit"  name="submit" class="btn btn-primary">Edit Data</button>
                                            
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                            </form>