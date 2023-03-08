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
                                        
										<!--
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addRmModal"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>  

                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> 
										
										onchange="location.reload()"
										onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text"
										-->
										
										
										</div>
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
								
								
                                <form id="rm-form" method="post">
																		
											
										  
											
											<?php   
											
												$dateSearch = date('d-m-Y'); 
												if(isset($_POST["dateSearch"])){
													$dateSearch = $_POST["dateSearch"];													
												}
											
											?>
											
											
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;">
													<input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" />
												</th>
                                                <th>No</th>
                                                <th>Kode Poli</th>
												<th>Nama Poli</th>
                                                <th>Kode Sub Spesialisasi</th>
												
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           
											
											// $sql = "select * from data_antrian_detail WHERE  DATE(antrianDate) = CURDATE() AND status_kedatangan=1 AND sesi = '$sesi_antrian'". $sqlAdd;
											// $sql = "select * from data_antrian_detail WHERE   status_kedatangan=1 AND sesi = '$sesi_antrian' ". $sqlAdd;
											// //echo $sql;
											// //echo $tanggaldb;
											// $squery = $mysqli->query($sql); 
											// while($row = mysqli_fetch_array($squery))
                                            // {

                                            $api_url = $url_bridging."qname=poli";
											$json_data = file_get_contents($api_url);
											$response_data = json_decode($json_data);
											$jaminan = $response_data->response;
												//var_dump($jaminan);
											$no = 0;
											foreach ($jaminan as $row) {

												$no++;
												$gKd = $row->kdpoli;
												$gNm = $row->nmpoli;	
												$kdsubspesialis = $row->kdsubspesialis;														
												$nmsubspesialis = $row->nmsubspesialis;
											
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$no.'" /></td>
                                                    <td>'.$gKd.'</td>
                                                    <td>'.$gNm.'</td>
													<td>'.$kdsubspesialis.'</td>
                                                    <td>'.$nmsubspesialis.'</td>	
														
                                                    
                                                </tr>
                                                ';
                                                
                                               // include "editModal.php";
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

    $('input[name="daterange"]').daterangepicker();


	function P_PrintRIWA(NoRM,IdL)
	{
		if (NoRM==''){
			NoRM = $("#fNoRM").val();
			NoRM = NoRM.replace('.','');
			NoRM = NoRM.replace('-','');
		}
		if (NoRM==''){
			alert('Error code..!!'); return false;
		}
		
		//var NoRG = objfrm.fNoRG.value;
		var NoRG = NoRM;
		
		var LeftPosition=(screen.width)?(screen.width-800)/2:100;
		var TopPosition=(screen.height)?(screen.height-400)/2:100;
		
		IdL = '12';
	   
		URL = 'http://localhost:8090/SimRSSI/report/dok-nota_riwayat_pdf.php?NoRG='+NoRG+'&NoRM='+NoRM+'&IdL='+IdL;
		
		window.open(URL,'WinRIWA','toolbar=no,menubar=yes, top='+TopPosition+',left='+LeftPosition+' location=no, scrollbars=yes, resizable, width=800, height='+400);
		
		
	}
    $(function() {
        $("#table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,4 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>