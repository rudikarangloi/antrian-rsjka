
<!-- ========= CLASS MODAL ======== -->
<?php 
echo '<div id="editModal'.$gKd.'" class="modal fade">
        <form method="post">
        <div class="modal-dialog modal-sm" style="width:300px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Jadwal Dokter</h4>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" value="'.$gKd.'" name="hidden_id" id="hidden_id"/>
                        <input type="hidden" value="'.$hari.'" name="hidden_hari" id="hidden_hari"/>
                        <input type="hidden" value="'.$kodepoli.'" name="hidden_kodepoli" id="hidden_kodepoli"/>
                        <input type="hidden" value="'.$kodesubspesialis.'" name="hidden_kodesubspesialis" id="hidden_kodesubspesialis"/>
                        <div class="form-group">
                            <label>Nomor </label>
                            <input name="txt_nomor" id="txt_nomor" class="form-control input-sm" type="text" value="'.$gKd.'" />
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="txt_nama" id="txt_nama" class="form-control input-sm" type="text" value="'.$gNm.'" />
                        </div>
                        <div class="form-group">
                            <label>Jadwal</label>
                            <input name="txt_jadwal" id="txt_jadwal" class="form-control input-sm" type="text" value="'.$jadwal.'" />
                        </div>			
                    
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
                </div>
            </div>
        </div>
        </form>
    </div>';
?>