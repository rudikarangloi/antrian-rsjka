
<!-- ========= CLASS MODAL ======== -->
<?php 


echo '<div id="editModal'.$row->kode.'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Poli</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row->kode.'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Nomor </label>
                    <input name="txt_nomor" readonly id="txt_nomor" class="form-control input-sm" type="text" value="'.$row->kode.'" />
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="txt_nama"  id="txt_nama" class="form-control input-sm" type="text" value="'.$row->nama.'" />
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
</div>';?>