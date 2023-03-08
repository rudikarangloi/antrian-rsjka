<!DOCTYPE html>
<html>
    <?php 
	include('../head_css.php'); 
	include('../constant.php');
	
		
	
	$chek_poli_0 = '';
	$chek_poli_1 = '';
	$chek_poli_2 = '';
	$chek_poli_3 = '';
	$chek_poli_4 = '';
	$chek_poli_5 = '';
	$chek_poli_6 = '';
	$chek_poli_7 = '';
	$chek_poli_8 = '';
	$chek_poli_9 = '';
	$chek_poli_10 = '';


	if(isset($_POST["nm_poli"])){
       $nm_poli=$_POST["nm_poli"];
	   
	   switch ($nm_poli) {
			case 0:
				$chek_poli_0 = 'selected';
				break;
			case 1:
				$chek_poli_1 = 'selected';
				break;
			case 2:
				$chek_poli_2 = 'selected';
				break;
			case 3:
				$chek_poli_3 = 'selected';
				break;
				
			case 4:
				$chek_poli_4 = 'selected';
				break;
			case 5:
				$chek_poli_5 = 'selected';
				break;
			case 6:
				$chek_poli_6 = 'selected';
				break;
				
			case 7:
				$chek_poli_7 = 'selected';
				break;
			case 8:
				$chek_poli_8 = 'selected';
				break;
			case 9:
				$chek_poli_9 = 'selected';
				break;
			case 10:
				$chek_poli_10 = 'selected';
				break;
				
		}
	}else{
		$nm_poli= '0';
	}

	
	
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
																		
											
										   <div class="row">
											  <div class="col-sm-1">&nbsp;&nbsp;Poliklinik : </div>
											  <div class="col-sm-5">
													<select class="form-control" name="nm_poli" id="nm_poli" 
														onchange="this.form.submit()"											
													>						
														<option <?php echo $chek_poli_0?> value="0">Semua</option>
														<option <?php echo $chek_poli_1?> value="1">Poli Umum</option>
														<option <?php echo $chek_poli_2?> value="2">Poli Penyakit Dalam</option>	
														<option <?php echo $chek_poli_3?> value="3">Poli Bedah</option>
														<option <?php echo $chek_poli_4?> value="4">Poli Anak</option>
														<option <?php echo $chek_poli_5?> value="5">Poli Gigi</option>	
														<option <?php echo $chek_poli_6?> value="6">Poli Obgyn</option>	
														<option <?php echo $chek_poli_7?> value="7">Fisioterapi</option>
														<option <?php echo $chek_poli_8?> value="8">Terapi Wicara</option>
														<option <?php echo $chek_poli_9?> value="9">Poli Kulit dan kelamin</option>																
														<option <?php echo $chek_poli_10?> value="10">Poli Paru</option>												
													</select>
											  </div>
											  <div class="col-sm-4"></div>
											  <div class="col-sm-2"></div>
											</div>		
											<p>
											
											<?php   
											
												$dateSearch = date('d-m-Y'); 
												if(isset($_POST["dateSearch"])){
													$dateSearch = $_POST["dateSearch"];													
												}
											
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
                                                <th style="width: 20px !important;">
													<input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" />
												</th>
                                                <th>No.RM</th>
                                                <th>Nama</th>
												<th>Nomor</th>
                                                <th>Alamat</th>
												<th>Poliklinik</th>												
												<th>RM</th>
												<th>Poli</th>																						
                                                <th style="width: 75px !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $chek_rm_aktif = '';
											$chek_rm_non_aktif = '';
											$chek_poli_aktif = '';
											$chek_poli_non_aktif = '';
											
											
											$explodedateSearch = explode("-", $dateSearch);
											$tanggaldb = $explodedateSearch[2].'-'.$explodedateSearch[1].'-'.$explodedateSearch[0];
											
											$sqlAdd = " AND antrianDate = '$tanggaldb' ";
											
											if($nm_poli != '0'){
												$sqlAdd = " AND poliklinikNo = '$nm_poli' AND antrianDate = '$tanggaldb' ";
											}
											
											
											$sql = "select * from data_antrian_detail WHERE  DATE(antrianDate) = CURDATE() AND status_kedatangan=1 AND sesi = '$sesi_antrian'". $sqlAdd;
											$sql = "select * from data_antrian_detail WHERE   status_kedatangan=1 AND sesi = '$sesi_antrian' ". $sqlAdd;
											//echo $sql;
											//echo $tanggaldb;
											$squery = $mysqli->query($sql); 
											while($row = mysqli_fetch_array($squery))
                                            {
												if($row['aproove_rm'] == 1){
													$icon_rm = '<img src="sudah.png"  width="35" height="25">';
												}else{
													$icon_rm = '<img src="belum.png"  width="15" height="15">';
												}
												if($row['approve_poli'] == 1){
													$icon_poli = '<img src="sudah.png"  width="35" height="25">';
												}else{
													$icon_poli = '<img src="belum.png"  width="15" height="15">';
												}
												
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td>
                                                    <td>'.$row['no_rm'].'</td>
                                                    <td>'.$row['nama'].'</td>
													<td>'.$row['antrianNo'].'</td>
                                                    <td>'.$row['alamat'].'</td>	
													<td>'.$row['PoliklinikName'].'</td>	
													<td align=center>'.$icon_rm.'</td>	
													<td align=center>'.$icon_poli.'</td>	
                                                    <td>
														<button class="btn btn-primary btn-sm" data-target="#editModal'.$row['id'].'" data-toggle="modal">
														<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
														<button class="btn btn-primary btn-sm"  onClick="P_PrintRIWA('.$row['no_rm'].','.$row['no_rm'].')" data-toggle="modal">
														<i class="fa fa-pencil-square" aria-hidden="true"></i> </button>															
													</td>
                                                </tr>
                                                ';
                                                
                                                include "editModal.php";
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