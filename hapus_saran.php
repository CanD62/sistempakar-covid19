<?php
require_once('inc/header.php');
require_once('inc/config.php');

isset($_REQUEST['id'])
        ? $id = $_REQUEST['id']
        : $id = '';

$sql = mysqli_query($conn, "SELECT * FROM  tb_saran where id='$id'");
$data = mysqli_fetch_assoc($sql);

?>


                                                <div class="form-group">
                                                    <label>Apakah anda yakin menghapus data saran  <?= $data['saran']; ?> ?</label>
                                                   
                                                  
                                                </div>
                                                
                                              
                                                
                                                <a href="proses_hapus_saran.php?id=<?= $data['id']; ?>" class="btn btn-primary">Ya</a>
                                            
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                            