<?php
//require "connfile-php7.php";
//require "functionfile-php7.php";

include('header.php'); 
include "constant.php";

extract($_POST);


//$SyT ="WHERE (FS_MR LIKE '%$gFnD%' OR FS_NM_PASIEN LIKE '%$FnD%' OR FS_NM_ALIAS LIKE '%$FnD%' OR FS_ALM_PASIEN LIKE '%$FnD%' OR FS_KOTA_PASIEN LIKE '%$FnD%')";

//$ToTK = fGlobal("sum(fn_total)","ta_trs_billing","FS_KD_REG:FS_KD_TRS NOT ",$tREG.":DB%","=:LIKE","",DatabaseSA,$ConSA,"");

//SQL Server
//-----------
//$NM_PASIEN = fGlobal("FS_NM_PASIEN","tc_mr","FS_MR",$input_data,"=","",DatabaseSA,$ConSA,"");
//$ALM_PASIEN = fGlobal("FS_ALM_PASIEN","tc_mr","FS_MR",$input_data,"=","",DatabaseSA,$ConSA,"");
//$TLP_PASIEN = fGlobal("FS_TLP_PASIEN","tc_mr","FS_MR",$input_data,"=","",DatabaseSA,$ConSA,"");
//$KOTA_PASIEN = fGlobal("FS_KOTA_PASIEN","tc_mr","FS_MR",$input_data,"=","",DatabaseSA,$ConSA,"");
//$ALM_PASIEN = fGlobal("FS_ALM_PASIEN","tc_mr","FS_MR",$input_data,"=","",DatabaseSA,$ConSA,"");
//$JNS_KELAMIN = fGlobal("FB_JNS_KELAMIN","tc_mr","FS_MR",$input_data,"=","",DatabaseSA,$ConSA,"");

//Mysql
//------


$FS_MR= $FS_MR;						
$NM_PASIEN= $NM_PASIEN;
$ALM_PASIEN= $ALM_PASIEN;
$TLP_PASIEN= $TLP_PASIEN;
$KOTA_PASIEN= $KOTA_PASIEN;
$JNS_KELAMIN=  '';
$FS_KD_IDENTITAS=  $FS_KD_IDENTITAS;



/*
$sql = "SELECT FS_NM_PASIEN AS FldD FROM tc_mr WHERE FS_MR = '". $input_data ."'";
$rstClient = $mysqli->query($sql);			
$rowClient = $rstClient->fetch_array();
if($rowClient['FldD']){
	$NM_PASIEN= $rowClient['FldD'];
} 
//-----------------------------------------------------------------------------------
$sql = "SELECT FS_ALM_PASIEN AS FldD FROM tc_mr WHERE FS_MR = '". $input_data ."'";
$rstClient = $mysqli->query($sql);			
$rowClient = $rstClient->fetch_array();
if($rowClient['FldD']){
	$ALM_PASIEN= $rowClient['FldD'];
}  
//-----------------------------------------------------------------------------------
$sql = "SELECT FS_TLP_PASIEN AS FldD FROM tc_mr WHERE FS_MR = '". $input_data ."'";
$rstClient = $mysqli->query($sql);			
$rowClient = $rstClient->fetch_array();
if($rowClient['FldD']){
	$TLP_PASIEN= $rowClient['FldD'];
}  
//-----------------------------------------------------------------------------------
$sql = "SELECT FS_KOTA_PASIEN AS FldD FROM tc_mr WHERE FS_MR = '". $input_data ."'";
$rstClient = $mysqli->query($sql);			
$rowClient = $rstClient->fetch_array();
if($rowClient['FldD']){
	$KOTA_PASIEN= $rowClient['FldD'];
} 
//-----------------------------------------------------------------------------------
$sql = "SELECT FB_JNS_KELAMIN AS FldD FROM tc_mr WHERE FS_MR = '". $input_data ."'";
$rstClient = $mysqli->query($sql);			
$rowClient = $rstClient->fetch_array();
if($rowClient['FldD']){
	$JNS_KELAMIN= $rowClient['FldD'];
} 

if($JNS_KELAMIN=='0'){
	$JNS_KELAMIN="LAKI-LAKI";
}else{
	$JNS_KELAMIN="PEREMPUAN";
}

$sql = "SELECT FS_KD_IDENTITAS AS FldD FROM tc_mr WHERE FS_MR = '". $input_data ."'";
$rstClient = $mysqli->query($sql);			
$rowClient = $rstClient->fetch_array();
if($rowClient['FldD']){
	$FS_KD_IDENTITAS= $rowClient['FldD'];
} 
*/
?>






<div id="main-container">
	<div id="main-content" class="main-content container">
		<div class="well well-nice form-dark">				


			<table border="0" width="100%">
					<tr>
						<td width="1%">&nbsp;</td>
						<td width="13%"></td>
						<td width="1%"></td>
						<td width="30%"><?php //echo $input_data. " -> ". $radCaraBayar;?></td>
						<td width="1%">&nbsp;</td>
						<td width="20%"></td>
						<td width="1%"></td>
						<td width="29%"></td>
						<td width="1%">&nbsp;</td>
					</tr>
					<tr>
						<td width="1%">&nbsp;</td>
						<td width="13%">No.Rekam Medis</td>
						<td width="1%">:</td>
						<td width="30%"><?php echo $FS_MR;?></td>
						<td width="1%">&nbsp;</td>
						<td width="20%">Alamat</td>
						<td width="1%">:</td>
						<td width="29%"><?php echo $ALM_PASIEN;?></td>
						<td width="1%">&nbsp;</td>
					</tr>
					<tr>
						<td width="1%">&nbsp;</td>
						<td width="13%">Nama</td>
						<td width="1%">:</td>
						<td width="30%"><?php echo $NM_PASIEN;?></td>
						<td width="1%">&nbsp;</td>
						<td width="20%">Kota</td>
						<td width="1%">:</td>
						<td width="29%"><?php echo $KOTA_PASIEN;?></td>
						<td width="1%">&nbsp;</td>
					</tr>
					<tr>
						<td width="1%">&nbsp;</td>
						<td width="13%">Nomor Telpon</td>
						<td width="1%">:</td>
						<td width="30%"><?php echo $TLP_PASIEN;?></td>
						<td width="1%">&nbsp;</td>
						<td width="20%"></td>
						<td width="1%"></td>
						<td width="29%">&nbsp;</td>
						<td width="1%">&nbsp;</td>
					</tr>

					<tr>
						<td colspan="8" align="center">
						
						<hr></td>
						<td width="1%">&nbsp;</td>
					</tr>

					<tr>
						<td colspan="8" align="center">
						<div id="loadingImg" style="display:none"><img src="../assert/img/loading3.gif" alt="" width="30" height="30"></div>
						</td>
						<td width="1%">&nbsp;</td>
					</tr>

					<tr>
						<td width="1%">&nbsp;</td>
						<td width="13%">&nbsp;</td>
						<td width="1%">&nbsp;</td>
						<td width="30%">&nbsp;</td>
						<td width="1%">&nbsp;</td>
						<td width="20%">&nbsp;</td>
						<td width="1%">&nbsp;</td>
						<td width="29%">&nbsp;</td>
						<td width="1%">&nbsp;</td>
					</tr>

					<tr>
						<td width="1%">&nbsp;</td>
						<td width="92%" colspan="7">

						<form name = "myfrm" id="myfrm" class="form-tied margin-00" action="form_input_data_mysql_.php" method="post">																		
							
							
							<input type="hidden" name="fAlamat" id="fAlamat"  value="<?php echo $ALM_PASIEN;?>"  />
							<input type="hidden" name="fNama" id="fNama"  value="<?php echo $NM_PASIEN;?>"  />
							<input type="hidden" name="fKota" id="fKota"  value="<?php echo $KOTA_PASIEN;?>"  />
							<input type="hidden" name="fNik" id="fNik"  value="<?php echo $FS_KD_IDENTITAS;?>"  />
							
							<input type="hidden" name="fNoRM" id="fNoRM"  value="<?php echo $input_data;?>"  />
							<input type="hidden" name="FS_MR" id="FS_MR"  value="<?php echo $FS_MR;?>"  />
							<input type="hidden" name="NM_PASIEN" id="NM_PASIEN"  value="<?php echo $NM_PASIEN;?>"  />
							<input type="hidden" name="ALM_PASIEN" id="ALM_PASIEN"  value="<?php echo $ALM_PASIEN;?>"  />
							<input type="hidden" name="TLP_PASIEN" id="TLP_PASIEN"  value="<?php echo $TLP_PASIEN;?>"  />
							<input type="hidden" name="KOTA_PASIEN" id="KOTA_PASIEN"  value="<?php echo $KOTA_PASIEN;?>"  />
							<input type="hidden" name="FS_KD_IDENTITAS" id="FS_KD_IDENTITAS"  value="<?php echo $FS_KD_IDENTITAS;?>"  />
													

							<input type="hidden" name="input_data" id="input_data"  value="<?php echo $input_data;?>"  />

							<input type="hidden" name="radCaraBayar" id="radCaraBayar"  value="<?php echo $radCaraBayar;?>"  />						
							<input type="hidden" name="idPerusahaan" id="idPerusahaan"  value="<?php echo $idPerusahaan;?>"  />
							<input type="hidden" name="nmPerusahaan" id="nmPerusahaan"  value="<?php echo $nmPerusahaan;?>"  />
							<input type="hidden" name="fBpJK" id="fBpJK"  value="<?php echo $fBpJK;?>"  />
							<input type="hidden" name="fKtEP" id="fKtEP"  value="<?php echo $fKtEP;?>"  />
							<input type="hidden" name="fNmaB" id="fNmaB"  value="<?php echo $fNmaB;?>"  />
							<input type="hidden" name="fJnpK" id="fJnpK"  value="<?php echo $fJnpK;?>"  />
							<input type="hidden" name="fJnpD" id="fJnpD"  value="<?php echo $fJnpD;?>"  />
							<input type="hidden" name="fKelK" id="fKelK"  value="<?php echo $fKelK;?>"  />
							<input type="hidden" name="fKelD" id="fKelD"  value="<?php echo $fKelD;?>"  />

							<input type="hidden" name="fStaK" id="fStaK"  value="<?php echo $fStaK;?>"  />
							<input type="hidden" name="fStaD" id="fStaD"  value="<?php echo $fStaD;?>"  />
							<input type="hidden" name="fLakA" id="fLakA"  value="<?php echo $fLakA;?>"  />
							<input type="hidden" name="fLokA" id="fLokA"  value="<?php echo $fLokA;?>"  />
							<input type="hidden" name="CrSaveData" id="CrSaveData"  value=""  />
							<input type="hidden" name="CrSaveData2" id="CrSaveData2"  value=""  />
							
						
							<table border="0" width="100%">
								<tr>
									<table border="0" width="100%">
											<tr>
												<td colspan="4">Tujuan :
												
																																				
												</td>
											</tr>
											<tr>
												<td colspan="4">
												<table border="0" width="100%">
													<tr>
														<td width="281" valign="top">
														<table border="0" width="100%">	
														
														<?php	
														 
														//$api_url = 'http://localhost/api_loket/search_client_antrian.php?limit=0&until=3';	
$api_url = $url_api_get_contents.'search_client_antrian.php?limit=0&until=3';	
$arrContextOptions=array(
      "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );

$json_data = file_get_contents($api_url, false, stream_context_create($arrContextOptions));
$response_data = json_decode($json_data);


//$json_data = file_get_contents($api_url);
//$response_data = json_decode($json_data);
$jaminan = $response_data->data;
														//var_dump($jaminan);
														$loket = 1;
														foreach ($jaminan as $row) {
				
															$gKd = $row->kode;
															$gNm = $row->nama;															
															
														?>
														
														<tr>
																<td colspan="2">																							
																	<input id="fLaYK<?php echo $gKd;?>" type="radio" name="fLaYK" class='rg' value="<?php echo $gKd;?>">																	
																	<label for="fLaYK<?php echo $gKd;?>"><span><span></span></span><?php echo $gNm;?></label>																		
																</td>								
															</tr>
														
														<?php
															
															$loket++;
														}													
																									
																													
														?>
													
																										
														
														
														
													</table>
													</td>
													<td width="4">&nbsp;</td>
													<td>
														<table border="0" width="100%">
															<?php														
$api_url = $url_api_get_contents.'search_client_antrian.php?limit=3&until=20';															
															//$json_data = file_get_contents($api_url);
															//$response_data = json_decode($json_data);
$arrContextOptions=array(
      "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );

$json_data = file_get_contents($api_url, false, stream_context_create($arrContextOptions));
$response_data = json_decode($json_data);

$jaminan = $response_data->data;
															//var_dump($jaminan);
															$loket = 1;
															foreach ($jaminan as $row) {
					
																$gKd = $row->kode;
																$gNm = $row->nama;															
																
															?>
															
															<tr>
																	<td colspan="2">																							
																		<input id="fLaYK<?php echo $gKd;?>" type="radio" name="fLaYK" class='rg' value="<?php echo $gKd;?>">																	
																		<label for="fLaYK<?php echo $gKd;?>"><span><span></span></span><?php echo $gNm;?></label>																		
																	</td>								
																</tr>
															
															<?php
																
																$loket++;
															}													
																										
																														
															?>
														
														</table>
													</td>
												</tr>
												<tr>
													<td width="281">&nbsp;<input type="hidden" id="hidden_loket" name="hidden_loket" val=""></td>
													<td width="9">&nbsp;</td>
													<td>&nbsp;</td>
												</tr>
											</table>
											</td>
										</tr>
										
										<tr>
											<td width="41%">&nbsp;</td>
											<td width="9%">&nbsp;</td>
											<td width="29%">&nbsp;</td>
											<td width="18%">&nbsp;</td>
										</tr>
									</table>

									<div id="GloBMstCri" >
										<div id="GloBDiv1Cri" ></div>
										<div id="GloBDiv2Cri" ></div>
									</div>

								<div id='show-bpjs' style='display:none'>											
							
								&nbsp;</div>
									</td>
									<td width="37%">&nbsp;</td>
								</tr>
								<tr>
									<td width="1%">&nbsp;</td>
									<td width="92%" colspan="7">
										<button type="button" value="SAVE" name="fSave" id="fSave" class="btn btn-envato btn-block ">PROSES</button>
										<button type="button" class="btn btn-envato btn-block " onclick="goBack()">BATAL</button>
									</td>
									<td width="37%">&nbsp;</td>
								</tr>



								<tr>
									<td colspan="3" align="center">
										<!--
										<button type="button" value="SAVE" name="fSave" id="fSave" class="btn btn-envato btn-block ">PROSES</button>
										<button type="button" class="btn btn-envato btn-block " onclick="goBack()">BATAL</button>
										-->							
									</td>
								</tr>			

							</table>
						</form>
						</td>
						<td width="1%">&nbsp;</td>
					</tr>

					<tr>
						<td width="1%">&nbsp;</td>
						<td width="13%">&nbsp;</td>
						<td width="1%">&nbsp;</td>
						<td width="30%">&nbsp;</td>
						<td width="1%">&nbsp;</td>
						<td width="20%">&nbsp;</td>
					</tr>

			</table>

		</div>			
	</div>
	
	
</div>




<script languange="javascript">

	var objfrm=document.myfrm;
	
	function goBack() {
		window.history.back();
	}

	
	$(document).ready(function(){
		$('#fSave').click(function(){
			var check = true;
			$("input:radio").each(function(){
				var name = $(this).attr("name");
				if($("input:radio[name="+name+"]:checked").length == 0){
					check = false;
				}
			});
			
			if(check){	
				objfrm.CrSaveData.value="lainnya";
				objfrm.submit();						
				
			}else{
				//alert('Silahkan Pilih Salah Satu');		
				swal("Perhatian", "Silahkan Pilih Ruang");
				
			}
		});
	});


	$(".rg").change(function () {	

		var myRadio = $("input[name=fLaYK]");
		//get Index
		var checkedValue = myRadio.index(myRadio.filter(':checked')) +1 ;       
		//get value
		//myRadio.filter(":checked").val();
		
		$('#hidden_loket').val(checkedValue);
		//console.log(' YA ...');
		//console.log($('#hidden_loket').val());
		
	});

	

	function showGLOB(fnd,crt,IdL)	{		
		
		if (fnd=='find')
			{
				var gDrP;
				var gFnD = $("#nmPerusahaan").val();   
				
				if (crt=="LaYK" || crt=="JmNK" || crt=="TrFK"){
					gDrP = "3"; // Bukan umum dan bukan BPJS
				}
				else {
					gDrP = "";
				}
				
				document.getElementById('GloBDiv2Cri').style.display = "block";

				$(document).ready(function()
				{
					//$("#GloBDiv1Cri").load('../php/trs-reg_masuk_find_glob_top.php?crt='+crt+'&IdL='+IdL);
				});
				
				$(document).ready(function()
				{				
					$("#GloBDiv2Cri").load('../php/trs-reg_masuk_find_glob_mid.php?gFnD='+gFnD+'&gDrP='+gDrP+'&crt='+crt+'&IdL='+IdL);
				});
				
				document.getElementById('GloBMstCri').style.display = "block";

				if (document.getElementById('GloBMstCri').style.display == "block")
				{
					//document.getElementById('GloBMstCri').style.display = "none";
				}
				else
				{
					//document.getElementById('GloBMstCri').style.display = "block";
				}
				
			}
			else
			{
				document.getElementById('GloBDiv2Cri').style.display = "block";
				/*
				$(document).ready(function()
				{
					$("#GloBDiv1Cri").load('../php/trs-reg_masuk_find_glob_top.php?crt='+crt+'&IdL='+IdL);
				});
				*/
				
				$(document).ready(function()
				{
					$("#GloBDiv2Cri").load('../php/trs-reg_masuk_find_glob_mid.php?crt='+crt+'&IdL='+IdL);					
				});
				
				if (document.getElementById('GloBMstCri').style.display == "block")
				{
					document.getElementById('GloBMstCri').style.display = "none";
				}
				else
				{
					document.getElementById('GloBMstCri').style.display = "block";
				}
			}
					
	}

	function showCLICK(crt,kde,IdL)
	{
		//alert(crt+" : "+kde); return false;
		if (crt=='ReGI'){
			var IncFile = "dHJzLXJlZ19tYXN1aw==";
			window.open('index.php?JDL=TRS. REGISTRASI MASUK&tREG='+kde+'&IncFile='+IncFile+'&IdL='+IdL,'_self');
		}
		else if (crt=='NoRM'){
			fCariGLOBAL(crt,kde);
			closeCLICK(crt);
		}
		else
		{
			//fCariGLOBAL(crt,kde);
			//closeCLICK('GloB');
			$("#nmPerusahaan").val(kde);  
			$("#idPerusahaan").val(crt);  
			document.getElementById('GloBMstCri').style.display = "none";
			//alert('Tesaaa ' + ' : ' + crt + ' --> ' +  kde)
		}
	}

	function LoadBPJS(field,CrT,sCrt,sIdc,sKey)
	{
		$(document).ready(function()
		{
			VL = RefText(field.value);
			//alert(gVL)
			$("#loadingImg").show();
			fCariBPJS(CrT,gVL,sCrt,sIdc,sKey);
		});
	}

	function LoadBPJSCLICK(CrT,sCrt,sIdc,sKey)
	{
		if (sCrt=='ktp')
		{
			//var rek = objfrm.fKtEP.value;
			var rek = $("#fKtEP").val();  
			rek = rek.replace(" ","");

						
			if (rek=='')
			{
				alert('Nomor KTP masih kosong..!!');
				return false;
			}
			if (rek.length<16)
			{
				alert('Nomor kartu penduduk tidak lengkap..!!');
				return false;
			}
			gVL = RefText(rek);
			alert(gVL);
		}
		else
		{
			//var rex = objfrm.fBpJK.value;
			var rex = $("#fBpJK").val();  			
			rex = rex.replace(" ","");
			
			if (rex=='')
			{
				alert('Nomor peserta masih kosong..!!');
				return false;
			}
			if (rex.length<13)
			{
				alert('Nomor kartu peserta BPJS tidak lengkap..!!');
				return false;
			}
			gVL = RefText(rex.replace(" ",""));
			
		}
		$("#loadingImg").show();

		
		fCariBPJS(CrT,gVL,sCrt,sIdc,sKey);
	}
</script>

<?php 
//include "keyboardVirtual.php";
include "footer.php"; 
?>
