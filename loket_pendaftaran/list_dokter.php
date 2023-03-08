<!DOCTYPE html>
<html>
    <?php 
        include('../head_css.php'); 
        include('../constant.php');

    ?>
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<?php 
    ob_start();
   include "../apps/mysql_connect.php";
   include('../header.php');
		
?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <?php include('../sidebar-left.php'); ?>

    <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
                <!-- Content Header (Page header) -->
                

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        <b>DAFTAR DOKTER</b>
                                        
                                        <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addLoketModal"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>  

                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>  -->

                                
                                    </div>                                
                                </div><!-- /.box-header -->
<div class="box-body table-responsive">
    <form method="post">
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                    <th>Nomor</th>
                    <th>Kode</th>
                    <th>Nama Dokter</th>												
                    <th style="width: 40px !important;">Option</th>
                </tr>
            </thead>
            <tbody>
<?php
    
    $api_url = $url_bridging."qname=dokter";
    $json_data = file_get_contents($api_url);
    $response_data = json_decode($json_data);
    $jaminan = $response_data->response;
    //var_dump($jaminan);
    $no = 0;
    foreach ($jaminan as $row) {
                                            
        $no++;
        $gKd = $row->kodedokter;
        $gNm = $row->namadokter;	
        
                                            
       
        echo '
            <tr>
                <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$gKd.'" /></td>
                <td>'.$no.'</td>
                <td>'.$gKd.'</td>
                <td>'.$gNm.'</td>				
                								
                <td>
                    <button class="btn btn-primary btn-sm" data-target="#editModal'.$gKd.'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                </td>
            </tr>
            ';
                                                
            include "editModalListDokter.php";
    }
?>
            </tbody>
        </table>

        <?php include "../deleteModal.php"; ?>

    </form>
</div><!-- /.box-body -->


</div><!-- /.box -->

<?php include "../notification.php"; ?>

<?php include "../addModal.php"; ?>

<?php include "../addfunction.php"; ?>
<?php include "editfunction.php"; ?>
<?php include "deletefunction.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php include "../footer.php"; ?>
<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,4 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>