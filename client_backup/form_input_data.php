<?php
//require "connfile-php7.php";
require "functionfile-php7.php";

include "../apps/mysql_connect.php";



include('header.php'); 

extract($_POST);

$FS_MR= $FS_MR;		  
$NM_PASIEN= $FS_NM_PASIEN;
$ALM_PASIEN= $FS_ALM_PASIEN;
$TLP_PASIEN= $FS_TLP_PASIEN;
$KOTA_PASIEN= $FS_KOTA_PASIEN;
$JNS_KELAMIN=  '-';
$FS_KD_IDENTITAS=  $FS_KD_IDENTITAS;


if($JNS_KELAMIN=='0'){
	$JNS_KELAMIN="LAKI-LAKI";
}else{
	$JNS_KELAMIN="PEREMPUAN";
}
?>


<div id="main-container">
	<div id="main-content" class="main-content container">
		<div class="well well-nice form-dark">				


			<table border="0" width="100%">
					<tr>
						<td width="1%">&nbsp;</td>
						<td width="13%"></td>
						<td width="1%"></td>
						<td width="30%"><?php //echo $input_data;?></td>
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

						<form name = "myfrm" class="form-tied margin-00" action="form_input_data2.php" method="post">
							<input type="hidden" name="input_data" id="input_data"  value="<?php echo $input_data;?>"  />
							<input type="hidden" name="fNoRM" id="fNoRM"  value="<?php echo $input_data;?>"  />
							<input type="hidden" name="FS_MR" id="FS_MR"  value="<?php echo $FS_MR;?>"  />
							<input type="hidden" name="NM_PASIEN" id="NM_PASIEN"  value="<?php echo $NM_PASIEN;?>"  />
							<input type="hidden" name="ALM_PASIEN" id="ALM_PASIEN"  value="<?php echo $ALM_PASIEN;?>"  />
							<input type="hidden" name="TLP_PASIEN" id="TLP_PASIEN"  value="<?php echo $TLP_PASIEN;?>"  />
							<input type="hidden" name="KOTA_PASIEN" id="KOTA_PASIEN"  value="<?php echo $KOTA_PASIEN;?>"  />
							<input type="hidden" name="FS_KD_IDENTITAS" id="FS_KD_IDENTITAS"  value="<?php echo $FS_KD_IDENTITAS;?>"  />
							
							

							<table border="0" width="100%">
								<tr>
									<td width="15%">&nbsp;</td>
									<td width="68%" valign=top>
									<table border="0" width="100%">
										<tr>
											<td colspan="3">Cara Bayar :</td>
										</tr>
										<tr>
											<td colspan="3">									
												<input class='rg' id="radCaraBayar1" type="radio" name="radCaraBayar" value="001">	
													<label for="radCaraBayar1"><span><span></span></span>Umum</label>																		
											</td>												
										</tr>
										<tr>
											<td colspan="3">									
												<input class='rg' id="radCaraBayar2" type="radio" name="radCaraBayar" value="V2">	
													<label for="radCaraBayar2"><span><span></span></span>BPJS</label>																		
											</td>											
										</tr>
										<!--
										<tr>
											<td colspan="3">									
												<input class='rg' id="radCaraBayar3" type="radio" name="radCaraBayar" value="V3">	
													<label for="radCaraBayar3"><span><span></span></span>Perusahaan</label>																		
											</td>											
										</tr>
										-->
										<tr>
											<td width="97%" colspan="3">
												<div id="perusahaan" style='display:none'>	
													<!-- <input type="hidden" name="idPerusahaan" id="idPerusahaan"  value=""  />
													
													<input type="text"   name="nmPerusahaan" id="nmPerusahaan"  value="" 
														 style="width: 227px; " placeholder="Isi nama perusahaan di sini ..." 
														 onKeyPress="if (event.keyCode==13){
															 			showGLOB('find','JmNK','');
																		return false;
																	}"
														 
														/>

													<button type="button" value="cari_perusahaan" name="cari_perusahaan" id="cari_perusahaan" 
															class="btn btn-envato btn-block"
															style="width:90px"
													> 															
														Pencarian
													</button> -->

													<table border="0" width="100%" cellspacing="1">
														<tr>
															<td width="21">&nbsp;</td>
															<td width="242">
																<input type="hidden" name="idPerusahaan" id="idPerusahaan"  value=""  />	
																<input type="text"   name="nmPerusahaan" id="nmPerusahaan"  value="" 
																	style="width: 227px; " placeholder="Isi nama perusahaan di sini ..." 
																	onKeyPress="if (event.keyCode==13){
																					showGLOB('find','JmNK','');
																					return false;
																				}"
																	
																	/>
																
															</td>
															<td width="25">&nbsp;</td>
															<td>
																<button type="button" value="cari_perusahaan" name="cari_perusahaan" id="cari_perusahaan" 
																		class="btn btn-envato btn-block"
																		style="width:90px"> 															
																	Pencarian
																</button>
															</td>
															<td>&nbsp;</td>
														</tr>
														
														<tr>
															<td>&nbsp;</td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
													</table>

														
												</div>
											</td>
										</tr>
									</table>

									<div id="GloBMstCri" >
										<div id="GloBDiv1Cri" ></div>
										<div id="GloBDiv2Cri" ></div>
									</div>

								<div id='show-bpjs' style='display:none'>											
							
								<table border="0" width="102%">
									<tr>
										<td width="179"><u></u></td>
										<td width="23"></td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td width="179">No.Kartu</td>
										<td width="23">:</td>
										<td>										
											<!-- <input type="text" name="fBpJK" id="fBpJK" value="<?=$BpJK?>"  
												onKeyPress="if (event.keyCode==13){LoadBPJS(this,'BpJK','nom','4328','rsu41iman902');return false;}"
												maxlength="13" style="width: 110px" />												 -->
											
											<!-- <input  type="button" value="..."  name="B3231" onClick="LoadBPJSCLICK('BpJK','nom','<?=$xID?>','<?=$xPS?>')" /> -->

											<input type="text"   name="fBpJK" id="fBpJK" value="<?php //echo $BpJK;?>" 
												onKeyPress="if (event.keyCode==13){LoadBPJS(this,'BpJK','nom','4328','rsu41iman902');return false;}"
												maxlength="13"
												class="form-control" placeholder="Nomor Kartu BPJS" style="width: 200px;"> 												
											
											<button type="button" name="B3231" class="btn btn-success" onClick="LoadBPJSCLICK('BpJK','nom','<?=$xID?>','<?=$xPS?>')"> Cek </button>
											
										</td>
									</tr>
									<tr>
										<td width="179">Nomor KTP</td>
										<td width="23">:</td>
										<td>										
												<!-- <input type="text" name="fKtEP" id="fKtEP" value="<?=$KtEP?>"  maxlength="16" style="width: 110px" />

												<input type="button" value="..." name="B3232"
													onClick="LoadBPJSCLICK('BpJK','ktp','<?=$xID?>','<?=$xPS?>')" 
													style="width: 40px; height: 21px"/> -->

												<input type="text" name="fKtEP" id="fKtEP" value="" maxlength="16"
													class="form-control" placeholder="Nomor KTP" style="width: 200px;"> 												
											
												<button type="button" name="B3232" class="btn btn-success" onClick="LoadBPJSCLICK('BpJK','ktp','<?=$xID?>','<?=$xPS?>')" > Cek </button>
										</td>
									</tr>
									<tr>
										<td width="179">Nama</td>
										<td width="23">:</td>
										<td>
											<input type="text" name="fNmaB" id="fNmaB" value="<?php //echo $NmaB?>" readonly style="width: 255px; background:#<?=$redON?>" />
										</td>
									</tr>
									<tr>
										<td width="179">Kelompok</td>
										<td width="23">:</td>
										<td>
											<input type="text" name="fJnpK" id="fJnpK" value="<?php //echo $JnpK?>" readonly style="width: 35px; text-align:center; background:#<?=$redON?>" />
											<input type="text" name="fJnpD" id="fJnpD" value="<?php //echo $JnpD?>" readonly style="width: 227px; background:#<?php  //echo $redON?>" />
										</td>
									</tr>
									<tr>
										<td width="179">Kelas Tanggungan</td>
										<td width="23">:</td>
										<td>
											<input type="text" name="fKelK" id="fKelK" value="<?php  //echo $KelK?>" readonly style="width: 35px; text-align:center; background:#<?=$redON?>" />
											<input type="text" name="fKelD" id="fKelD" value="<?php  //echo $KelD?>" readonly style="width: 227px; background:#<?=$redON?>" />
										</td>
									</tr>
									<tr>
										<td width="179">Status</td>
										<td width="23">:</td>
										<td>
											<input type="text" name="fStaK" id="fStaK" value="<?php  //echo $StaK?>" readonly style="width: 35px; text-align:center; background:#<?=$redON?>" />
											<input type="text" name="fStaD" id="fStaD" value="<?php  //echo $StaD?>" readonly style="width: 227px; background:#<?=$redON?>" />
										</td>
									</tr>
									<tr>
										<td width="179" valign='top'>Laka Lantas</td>
										<td width="23"  valign='top'>:</td>
										<td>
											<!-- 
											<input name="fLakA" id="fLakA" type="radio" value="1">YA
											<input name="fLakA" id="fLakA" checked type="radio" value="2" >TIDAK -->
											
											
											<!-- <div class="btn-group btn-group-toggle">
												<label class="btn btn-secondary active">
													<input type="radio" name="fLakA" id="fLakA1" class="radio_laka"  value="1"> Tidak
												</label>
												<label class="btn btn-secondary">
													<input type="radio" name="fLakA" id="fLakA2" class="radio_laka"  value="2" checked> Ya
												</label>												
											</div> -->

										
										<div class="input-group">
											<div id="radioBtn" class="btn-group">
												<a class="btn btn-primary btn-sm active" data-toggle="happy" data-title="Y">Ya</a>
												<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="N">Tidak</a>
											</div>
											<input type="hidden" name="happy" id="happy">
											<input type="hidden" name="fLakA" id="fLakA" value="">
										</div>				
											
										</td>
									</tr>
									
										<tr>
											<td width="179"><div id="dlokasi">Lokasi</div></td>
											<td width="23">&nbsp;</td>
											<td>
												<div id="dlokasi2">
													<!-- <input type="text" name="fLokA" id="fLokA" value="<?php  //echo $LokA?>" style="width: 156px" /> -->
													<input type="text"  name="fLokA" id="fLokA" value="<?php  //echo $LokA?>" 
															class="form-control" placeholder="Lokasi Kecelakaan" style="width: 260px;"> &nbsp;
												</div>
											</td>
										</tr>
									
								</table>
								</div>
									</td>
									<td width="16%">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="3" align="center">
										
										<button type="button" value="SAVE" name="fSave" id="fSave" class="btn btn-envato btn-block ">PROSES</button>
										<button type="button" class="btn btn-envato btn-block "  onclick="goBack()">BATAL</button>
																	
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


	$('#radioBtn a').on('click', function(){
		var sel = $(this).data('title');
		var tog = $(this).data('toggle');
		$('#'+tog).prop('value', sel);		
		
		if(sel=='Y'){
			$('#fLakA').val('1');
			$('#dlokasi').show();
			$('#dlokasi2').show();
			//console.log(sel)
		}else{
			$('#fLakA').val('2');
			$('#dlokasi').hide();
			$('#dlokasi2').hide();
			//console.log(sel)
		}

		$('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
		$('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
	})

	function goBack() {
		window.history.back();
	}


	
		
	
	$(document).ready(function(){	

         jqKeyboard.init();
		 //$('#nmPerusahaan').keyboard({
                    //theme: 'default',
                    //is_hidden: false,
                    //close_speed: 1000,
                    //enabled: false,
                    //layout: 'en_US',
                    // definimos un trigger al keyboard.
                    // Al hacer click sobre el selector que tenga el id (#) o la clase (.) definida
                    // se ocultara o mostrara el keyboard segun corresponda.
                   // trigger: '#nmPerusahaan'
         //});
		
		  
		 
		 //$('#fBpJK').keyboard({
		//	 enabled: true
		 //});
		 // $('#fKtEP').keyboard({
			 //enabled: true
		 //});
		 
		 //$('#fKtEP').keyboard();
		 //var keyboard = $('#nmPerusahaan').data('pluginKeyboard');
         
		//$('#nmPerusahaan').keyboard();

		
		$('#cari_perusahaan').click(function(){
			showGLOB('find','JmNK','');
		});

		
		$('#fSave').click(function(){
			var check = true;
			$("input:radio").each(function(){
				var name = $(this).attr("name");
				if($("input:radio[name="+name+"]:checked").length == 0){
					check = false;
				}
			});
			
			if(check){

				if ($('#radCaraBayar2').attr('checked')) {
					//fBpJK fKtEP
					if ($('#fBpJK').val().length < 13 ){
						alert('Nomor BPJS Belum lengkap - Harus 13 digit');
					}else if($('#fKtEP').val().length < 16 )
						alert('Nomor KTP Belum lengkap - Harus 16 digit');
					else{
						
						objfrm.submit();
					}
								
				} else if ($('#radCaraBayar3').attr('checked')){					
					if ($('#nmPerusahaan').val().length == 0 ){
						alert('Perusahaan Harus terisi');
					}else{
						
						objfrm.submit();
					}
				}else {					
					objfrm.submit();
				}
			
				//objfrm.submit();
			}else{
				alert('Silahkan Pilih Salah Satu');
			}
		});
	});

	
   
	$(".rg").change(function () {	
		if ($('#radCaraBayar1').attr('checked')) {
			document.getElementById('GloBMstCri').style.display = "none";
		}
		if ($('#radCaraBayar2').attr('checked')) {
			$('#show-bpjs').show();
			document.getElementById('GloBMstCri').style.display = "none";
		} else {
			$('#show-bpjs').hide();
		}

		if ($('#radCaraBayar3').attr('checked')) {
			$('#perusahaan').show();
		} else {
			$('#perusahaan').hide();
		}
	});

	

	function showGLOB(fnd,crt,IdL)	{		
		
		if (fnd=='find'){
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
					//$("#GloBDiv2Cri").load('trs-reg_masuk_find_glob_mid.php?gFnD='+gFnD+'&gDrP='+gDrP+'&crt='+crt+'&IdL='+IdL);
					$("#GloBDiv2Cri").load('popup_ta_jaminan.php?gFnD='+gFnD+'&gDrP='+gDrP+'&crt='+crt+'&IdL='+IdL);
					
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
				
		}else{
				document.getElementById('GloBDiv2Cri').style.display = "block";
				/*
				$(document).ready(function()
				{
					$("#GloBDiv1Cri").load('../php/trs-reg_masuk_find_glob_top.php?crt='+crt+'&IdL='+IdL);
				});
				*/
				
				$(document).ready(function()
				{
					//$("#GloBDiv2Cri").load('trs-reg_masuk_find_glob_mid.php?crt='+crt+'&IdL='+IdL);		
					$("#GloBDiv2Cri").load('popup_ta_jaminan.php?gFnD='+gFnD+'&gDrP='+gDrP+'&crt='+crt+'&IdL='+IdL);					
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
                var rek = objfrm.fKtEP.value;
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
            }
            else
            {
                var rex = objfrm.fBpJK.value;
                rex = rex.replace(" ","");

                if (objfrm.fBpJK.value=='')
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
			//console.log(CrT+' : '+sCrt+' : '+sIdc+' : '+sKey + ' -> ' + gVL)
            $("#loadingImg").show();
            fCariBPJS(CrT,gVL,sCrt,sIdc,sKey);
			$("#loadingImg").hide();
		}
		
	function LoadBPJSCLICK_old(CrT,sCrt,sIdc,sKey)
	{
		console.log(CrT+' : '+sCrt+' : '+sIdc+' : '+sKey)
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

		}else{

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
