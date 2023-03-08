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
		
        ?>
        <?php include('../header.php'); ?>

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
                                        <b>JADWAL DOKTER</b>
<!--                                         
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addLoketModal"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>  

                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>  -->

                                
                                    </div>                                
                                </div><!-- /.box-header -->
<div class="box-body table-responsive">
    <form id="rm-form" method="post">
    <?php   
											
        $dateSearch = date('d-m-Y'); 
        $message    = "";

               
        if(isset($_GET["qryDateSearch"])){
            $dateSearch = $_GET["qryDateSearch"];	
            $message    = $_GET["message"];
        }

        if(isset($_POST["dateSearch"])){
            $dateSearch = $_POST["dateSearch"];	
            $message    = "";	
        }

        echo '&nbsp;&nbsp;'.$message;
       

       
                                               
    ?>
        <div class="row">
            <div class="col-sm-1">&nbsp;&nbsp;Tanggal : </div>
            <div class="col-sm-5">
                <input type="text" name="dateSearch" value="<?php echo $dateSearch?>" />
                <a class="btn btn-primary" onclick="document.getElementById('rm-form').submit();">Cari</a>
            </div>
            <div class="col-sm-4">
                                                
            </div>
            <div class="col-sm-2"></div>
        </div>	

        <script type="text/javascript">
            $(function() {
                $('input[name="dateSearch"]').daterangepicker({
                    locale: {
                        format: 'DD-MM-YYYY'
                    },
                    singleDatePicker: true,
                    showDropdowns: true
                }, 
            function(start, end, label) {
                var years = moment().diff(start, 'years');
                //alert("You are " + years + " years old.");
                });
            });
        </script>
                                        
        <p>
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                        <th>Nomor</th>
                            <th>Kode Dokter</th>
                            <th>Nama Dokter</th>	
                            <th>Hari</th>
                            <th>Jadwal</th>											
                            <th style="width: 40px !important;">Option</th>
                </tr>
            </thead>
        <tbody>
<?php
    $split = explode("-",$dateSearch);
    $date = $split[0];
    $month = $split[1];
    $year = $split[2];
    $tanggal = $year.'-'.$month.'-'.$date;
    
    $api_url = $url_bridging."qname=jadwal-dokter&tanggal=$tanggal";
    $json_data = file_get_contents($api_url);
    $response_data = json_decode($json_data);
    $code = $response_data->metadata->code;
    if($code=="200"){    
        $jaminan = $response_data->response;
        //var_dump($jaminan);
        $no = 0;
        foreach ($jaminan as $row) {
                                                
            $no++;
            $gKd = $row->kodedokter;
            $gNm = $row->namadokter;	
                                                
            $namahari = $row->namahari;
            $jadwal = $row->jadwal;

            $hari = $row->hari;
            $kodepoli = $row->kodepoli;
            $kodesubspesialis = $row->kodesubspesialis;
            echo '
                <tr>
                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$gKd.'" /></td>
                    <td>'.$no.'</td>
                    <td>'.$gKd.'</td>
                    <td>'.$gNm.'</td>
                    <td>'.$namahari.'</td>
                    <td>'.$jadwal.'</td>													
                    <td>
                        <button class="btn btn-primary btn-sm" data-target="#editModal'.$gKd.'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                </tr>
                ';
                                                    
                include "editModalJadwalDokter.php";
        }
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
<?php include "editfunctionJadwalDokter.php"; ?>
<?php include "deletefunction.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php include "../footer.php"; ?>
<script type="text/javascript">
    $('input[name="daterange"]').daterangepicker();
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,4 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>