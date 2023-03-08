<?php
//Form pendaftaran pasien baru khusus BPJS, untuk menghandel bridging bpjs taskid=1
require('header.php'); 
require "constant.php";

extract($_POST);


?>


<div id="main-container">
	<div id="main-content" class="main-content container">
		<div class="well well-nice form-dark">				


			<table border="0" width="100%">
					

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

						<form name = "myfrm" class="form-tied margin-00" action="#" method="post">
							

							<table border="0" width="100%">
								<tr>
									<td width="15%">&nbsp;</td>
									<td width="68%" valign=top>
									<table border="0" width="100%">
																				<tr>
											<td colspan="3">									
												
													<label for="radCaraBayar2"><span><span></span></span>Peserta BPJS</label>																		
											</td>											
										</tr>
										
										<tr>
											<td width="97%" colspan="3">
												<div id="perusahaan" style='display:none'>	
													
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

								<div id='show-bpjs'>											
							
								<table border="0" width="102%">
									<tr>
										<td width="179"><u></u></td>
										<td width="23"></td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td width="179">No.Kartu BPJS</td>
										<td width="23">:</td>
										<td>				
											<input type="text"   name="fBpJK" id="fBpJK" value="" maxlength="13"
												class="form-control" placeholder="Nomor Kartu BPJS" style="width: 200px;"> 												
											
											<button type="button" name="B3231" class="btn btn-success" 
											onClick="peserta()"> Cek </button>
											
										</td>
									</tr>
									
									<tr>
										<td width="179">Nama</td>
										<td width="23">:</td>
										<td>
											<input type="hidden" name="fKtEP" id="fKtEP" />
											<input type="text" name="fNmaB" id="fNmaB" value="<?php //echo $NmaB?>" readonly style="width: 255px; background:#<?=$redON?>" />
										</td>
									</tr>

									<tr>
										<td width="179">NIK</td>
										<td width="23">:</td>
										<td>
											<input type="text" name="NOKTP" id="NOKTP" value="" readonly style="width: 255px; background:#<?=$redON?>" />
										</td>
									</tr>

									
										<tr>
											<td width="179">Nomor Telepon</td>
											<td width="23">:</td>
											<td>
												<input type="text" name="txtNoTelp" id="txtNoTelp" value=""  
													style="width: 255px; " />

											</td>
										</tr>
									

									<tr>
										<td width="179">Jenis Kelamin</td>
										<td width="23">:</td>
										<td>
											<input type="hidden" name="SEX_HIDDEN" id="SEX_HIDDEN">
											<input type="text" name="SEX" id="SEX" value="" readonly style="width: 255px; background:#<?=$redON?>" />
										</td>
									</tr>

									<tr>
										<td width="179">Tanggal lahir</td>
										<td width="23">:</td>
										<td>
											<input type="hidden" name="tglLahir_HIDDEN" id="tglLahir_HIDDEN">
											<input type="text" name="tglLahir" id="tglLahir" value="" readonly style="width: 255px; background:#<?=$redON?>" />
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
										<td width="179"></td>
										<td width="23"></td>
										<td>
											&nbsp;
										</td>								
									</tr>

									<tr>
											<td colspan="2">
														
												<input class='rg' id="loket2" type="radio" name="fLaYK" value="loket2">																	
												<label for="Loket2"><span><span></span></span>POLIKLINIK PENYAKIT JIWA</label>													

											</td>								
									</tr>

									<tr>
											<td colspan="2">														
													
												<input class='rg' id="loket3" type="radio" name="fLaYK" value="loket3">																	
												<label for="Loket3"><span><span></span></span>POLIKLINIK GIGI DAN MULUT</label>

											</td>								
									</tr>

									<tr>
										<td width="179"></td>
										<td width="23"></td>
										<td>
											Pilih Dokter :
										</td>								
									</tr>

									<tr>
										<td width="179"></td>
										<td width="23"></td>
										<td>

												<div id='show-loket1' style='display:none'>Ruang 1 : dr.Yulinar N. Siringo, MSc, SpKJ</div>

												<div id='show-loket2' style='display:none'>									
													<input class='rg2' id="dr1" type="radio" name="dokter" value="dr1">
													<label for="Loket1"><span><span></span></span>Ruang Perawatan 1 : dr.Frida Ayu N.H, SpKJ</label>	
													<br/>
													<input class='rg2' id="dr2" type="radio" name="dokter" value="dr2">
													<label for="Loket1"><span><span></span></span>Ruang Perawatan 2 : dr.Fadlian Noor, SpKJ</label>	
													<br/>
													<input class='rg2' id="dr3" type="radio" name="dokter" value="dr3">
													<label for="Loket1"><span><span></span></span>Ruang Perawatan 3 : dr.Dina E.Sinaga, SpKJ</label>	
													<br/>
													<input class='rg2' id="dr4" type="radio" name="dokter" value="dr4">
													<label for="Loket1"><span><span></span></span>Ruang Perawatan 4 : dr.Yulinar N. Siringo, MSc, SpKJ</label>														
												</div>

												<div id='show-loket3' style='display:none'>
													<input class='rg2' id="dr5" type="radio" name="dokter" value="dr5">
													<label for="Loket1"><span><span></span></span>Ruang Perawatan 1 : drg. Sri Fadjar L, M.Kes</label>	
													<br/>								</div>
												<div id='show-loket4' style='display:none'>Ruang 4 : dr.Frida Ayu N.H, SpKJ</div>

										</td>								
									</tr>

									
									<!-- <tr>
										<td width="179">Json</td>
										<td width="23">:</td>
										<td>
											<textarea id="txtJason" name="txtJason" rows="10" cols="150" maxlength="700">
											
											</textarea>
										</td>
									</tr> -->
									
									<input type="hidden" name="happy" id="happy">
									<input type="hidden" name="fLakA" id="fLakA" value="">
									<input type="hidden" name="fLokA" id="fLokA" value="">

									<input type="hidden" name="hidden_poli" id="hidden_poli">
									<input type="hidden" name="hidden_dokter" id="hidden_dokter">


																		
								</table>
								</div>
									</td>
									<td width="16%">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="3" align="center">
										
										<button type="button" value="SAVE" name="fSave" id="fSave" class="btn btn-envato btn-block next_queue">PROSES</button>
										<!-- <button type="button" class="btn btn-envato btn-block "  onclick="goBack()">BATAL</button> -->
																	
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

	function peserta() {
		var nopeserta	= jQuery('#fBpJK').val();
		
		//alert(nopeserta);
		//jQuery('#btnrujukan').click(function(){
		if(jQuery('#fBpJK').val()==""){
			alert("Nomor Kartu BPJS Masih Kosong...");
			jQuery('#fBpJK').focus();
			return false;
		}
		else{	
		var nopeserta	= jQuery('#fBpJK').val();
		jQuery.post('bridging_proses.php',{nopeserta:nopeserta,reqdata:'rujukan'},function(data){
			//var n = data.split("|");
			//jQuery('#kddokter').val(n[0]);
			//alert(data);
			var response =  eval("(" + data + ")");
			jQuery('#fNmaB').val(response.peserta.nama);
			jQuery('#NOKTP').val(response.peserta.nik);
			jQuery('#SEX_HIDDEN').val(response.peserta.sex);   				//L=pria P=Perempuan
			
			jQuery('#tglLahir_HIDDEN').val(response.peserta.tglLahir); 

			//jQuery('#txtJason').val(JSON.stringify(response)); 
			aa = response.peserta.tglLahir;
			result=aa.split('-');;
			JTgl_lahir = result[2] +'-'+ result[1]+'-'+ result[0] ;
			jQuery('#tglLahir').val(JTgl_lahir); 
			
			if(response.peserta.sex == 'L'){
				jQuery('#SEX').val("LAKI-LAKI");  
			}else{
				jQuery('#SEX').val("PEREMPUAN");  
			}

			if(response.peserta.statusPeserta.kode == '0'){
				$("#fSave").attr("disabled", false);
			}else{
				$("#fSave").attr("disabled", true);
			}

			jQuery('#fJnpK').val(response.peserta.jenisPeserta.kode);
			jQuery('#fJnpD').val(response.peserta.jenisPeserta.keterangan);
			
			jQuery('#fKelK').val(response.peserta.hakKelas.kode);
			jQuery('#fKelD').val(response.peserta.hakKelas.keterangan);

			jQuery('#fStaK').val(response.peserta.statusPeserta.kode);
			jQuery('#fStaD').val(response.peserta.statusPeserta.keterangan);

			jQuery('#kartu1').val(response.peserta.noKartu);
			jQuery('#noppk').val(response.peserta.provUmum.kdProvider);
			jQuery('#namappk').val(response.peserta.provUmum.nmProvider);
			jQuery('#kdrujuk_lain').val(response.peserta.provUmum.nmProvider);
			jQuery('#kelas').val(response.peserta.hakKelas.kode);
			jQuery('#status').val(response.peserta.statusPeserta.keterangan);
			jQuery('#txtNoTelp').val(response.peserta.mr.noTelepon);
			
			//jQuery('#loader_namadokter').hide();
		});
		}
	
	}


	
		
	
	$(document).ready(function(){	


		var uri       = "<?php echo $url_api;?>daemon_serve_client.php";
		var uri_addBiodata = "<?php echo $url_api;?>add_biodata.php";

		$('#show-noTelp').hide();

		$("#fSave").attr("disabled", true);

		$('#fSave').click(function(){

				var check = true;					
				$("input:radio").each(function(){
					var name = $(this).attr("name");
					if($("input:radio[name="+name+"]:checked").length == 0){
						check = false;
					}
				});
				
				if(check){	
					nohp = jQuery('#txtNoTelp').val();
					if(nohp==""){
						swal("Perhatian", "Silahkan isi nomor Telepon");	
					}else{
						simpanData();
					}
							
				}else{
					swal("Perhatian", "Silahkan Pilih Poliklinik");					
				}
                
                return false;
		});
	});

	function simpanData(){

				var uri       = "<?php echo $url_api;?>daemon_serve_client.php";
				var uri_addBiodata = "<?php echo $url_api;?>add_biodata.php";

				var nomor_rm = '';
				var loket    = '1';
                
				//------------
				kdPoli = jQuery('#hidden_poli').val();
				kdDokter = jQuery('#hidden_dokter').val();

				switch (kdPoli) {
					case '1':
						poliClient = '1';
						poliCode = 'JIW';
						poliName = 'POLIKLINIK PENYAKIT JIWA';
						break;
					case '2':
						poliClient = '2';
						poliCode = 'JIW';
						poliName = 'POLIKLINIK GIGI DAN MULUT';
						break;
					
					default:
						poliClient = '1';
						poliCode = 'JIW';
						poliName = 'POLIKLINIK PENYAKIT JIWA';
				}

				switch (kdDokter) {
					case '1':
						kodedokter = "11111";
						nama_dokter = "dr.Frida Ayu N.H, SpKJ";
						break;
					case '2':
						kodedokter = '342806';
						nama_dokter = 'dr. FADLIAN NOOR, Sp.KJ';
						break;
					case '3':
						kodedokter = '306446';
						nama_dokter = 'dr. DINA ELIZABETH SINAGA, Sp.KJ';
						break;
					case '4':
						kodedokter = '305407';
						nama_dokter = 'dr. YULINAR NURYAGUS SIRINGO, Sp.KJ';
						break;
					case '5':
						kodedokter = '22222';
						nama_dokter = 'drg. Sri Fadjar L, M.Kes';
						break;
					
					default:
						kodedokter = '342806';
						nama_dokter = 'dr. FADLIAN NOOR, Sp.KJ';
				}

				//------------

				var data = {"loket" : loket,"nomor_rm": nomor_rm,"kd_client": poliClient};  
                $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: uri,
                        data: data,					
                        success: function(data) {	

							kodebooking = data['kodebooking'];
							noBPJS = jQuery('#fBpJK').val();
							nik = jQuery('#NOKTP').val();
							nohp = jQuery('#txtNoTelp').val();
							nama_pasien = jQuery('#fNmaB').val();
							tglLahir = jQuery('#tglLahir_HIDDEN').val(); 
							sex = jQuery('#SEX_HIDDEN').val();  
							if(sex == 'L'){
								jenis_kelamin = "P";  
							}else{
								jenis_kelamin = "W";  
							}

																													
							
							//?? Baru mendaftar kode poli, nomor RM dan Dokter belum diketahui
							kodepoli = poliCode;
							namapoli = poliName;
							//norm = biodata_norm;
							kodedokter = kodedokter;
							namadokter = nama_dokter;

							tanggalperiksa = data['tanggalperiksa'];
							nomorreferensi = data['nomorreferensi'];
							nomorantrean = data['nomor_antrian'];
							angkaantrean = data['nomor_antrian'];
							estimasidilayani = data['estimasidilayani'];

							//??Kuota tergantung dari kode poli, sat ini kode poli belum diketahui
							sisakuotajkn = data['sisakuotajkn'];
							kuotajkn = data['kuotajkn'];
							sisakuotanonjkn = data['sisakuotanonjkn'];
							kuotanonjkn = data['kuotanonjkn'];

							var uri_addBiodata = "<?php echo $url_api;?>add_biodata.php";	
							var biodata = {"nik" : nik,"nohp": nohp,"noBPJS": noBPJS,"nama_pasien": nama_pasien,
										"tgl_lahir": tglLahir,"jenis_kelamin": jenis_kelamin,"kodeBooking": kodebooking}; 
							$.ajax({
								type: "POST",
								dataType: "json",
								url: uri_addBiodata,
								data: biodata,					
								success: function(biodata) {		  
									biodata_norm = biodata['norm'];		
									//alert(biodata_norm)		

									tambahAntrean(noBPJS, kodebooking, nik, nohp, kodepoli, namapoli, biodata_norm, tanggalperiksa, kodedokter, namadokter,
									nomorreferensi, nomorantrean, angkaantrean, estimasidilayani,
									sisakuotajkn, kuotajkn, sisakuotanonjkn, kuotanonjkn);												
																			
								}
							});
							
							// tambahAntrean(noBPJS, kodebooking, nik, nohp, kodepoli, namapoli, norm, tanggalperiksa, kodedokter, namadokter,
							// 		nomorreferensi, nomorantrean, angkaantrean, estimasidilayani,
							// 		sisakuotajkn, kuotajkn, sisakuotanonjkn, kuotanonjkn);
							
														
							//Cetak Tiket menggunakan browser
							showDoc('cetak_antrian',data['nomor_antrian']);	

							//Add Biodata
							//addBiodata(nik,nohp,noBPJS,nama_pasien,tglLahir,jenis_kelamin,kodebooking);	
							
                        }
                });
	}

	function showDoc(aX,nomor_antrian) {
			
		var nama_pasien = jQuery('#fNmaB').val();
		var inomor_antrian = nomor_antrian;
		var nomor_loket = "";
		var nama_dokter = "";

		var LeftPosition = (screen.width) ? (screen.width - 40) / 2 : 100;
		var TopPosition = (screen.height) ? (screen.height - 20) / 2 : 100;

		URL =  aX + '.php?nama_pasien=' + nama_pasien + '&nomor_antrian=' + inomor_antrian + '&nomor_loket=' + nomor_loket + '&nama_dokter=' + nama_dokter;
		window.open(URL, 'WinDOC' + aX, 'toolbar=no,menubar=yes, top=' + TopPosition + ',left=' + LeftPosition + ' location=no, scrollbars=yes, resizable, width=800, height=' + 400);
	}

	function tambahAntrean(noBPJS, kodebooking, nik, nohp, kodepoli, namapoli, norm, tanggalperiksa, kodedokter, namadokter,
					 nomorreferensi, nomorantrean, angkaantrean, estimasidilayani,
					 sisakuotajkn, kuotajkn, sisakuotanonjkn, kuotanonjkn) {

		var nopeserta	= jQuery('#fBpJK').val();

			jQuery.post('bridging_proses.php',{
				nopeserta:nopeserta,
				kodebooking:kodebooking,
				jenispasien:"JKN",
				nomorkartu:noBPJS,
				nik:nik,
				nohp:nohp,
				kodepoli:kodepoli,
				namapoli:namapoli,
				pasienbaru:"1",
				norm:norm,
				tanggalperiksa:tanggalperiksa,
				kodedokter:kodedokter,
				namadokter:namadokter,
				jampraktek:"08:00-13:30",
				jeniskunjungan:"1",
				nomorreferensi:nomorreferensi,
				nomorantrean:nomorantrean,
				angkaantrean:angkaantrean,
				estimasidilayani:estimasidilayani,
				sisakuotajkn:sisakuotajkn,
				kuotajkn:kuotajkn,
				sisakuotanonjkn:sisakuotanonjkn,
				kuotanonjkn:kuotanonjkn,
				keterangan:"Peserta harap 30 menit lebih awal guna pencatatan administrasi.",
				reqdata:'insertAntrian'
			},function(data){
				
				//alert(data);
				taskid = "1";
				updateDataAntrean(kodebooking,taskid)
				var response =  eval("(" + data + ")");				
			
			});		

	}


	function updateDataAntrean(iKodebooking,taskid) {
			jQuery.post('bridging_proses.php',{
				kodeBooking:iKodebooking,
				taskid:taskid,
				reqdata:'updateWaktuAntrian'
			},function(data){				
				//alert(data);
				window.location.reload();
			});		

	}

	
	function addBiodata(nik,nohp,noBPJS,nama_pasien,tgl_lahir,jenis_kelamin,kodeBooking) {

		
		var uri_addBiodata = "<?php echo $url_api;?>add_biodata.php";
	
		var data = {"nik" : nik,"nohp": nohp,"noBPJS": noBPJS,"nama_pasien": nama_pasien,
					"tgl_lahir": tgl_lahir,"jenis_kelamin": jenis_kelamin,"kodeBooking": kodeBooking}; 
		$.ajax({
            type: "POST",
            dataType: "json",
            url: uri_addBiodata,
            data: data,					
            success: function(data) {		  
				nama_pasien = data['nama_pasien'];		
				//alert(nama_pasien)														
														
            }
        });
				

	}


	$(".rg").change(function () {	

		if ($('#loket1').attr('checked')) {
			$('#show-loket1').show();

		} else {
			$('#show-loket1').hide();
		}

		if ($('#loket2').attr('checked')) {
			$('#show-loket2').show();
			//alert(11)
			//$('.dokter')[0].checked = true;
			$('#dr1').attr('checked', true);
			
		} else {
			$('#show-loket2').hide();
		}

		if ($('#loket3').attr('checked')) {
			$('#show-loket3').show();
			$('#dr5').attr('checked', true);
		} else {
			$('#show-loket3').hide();
		}

		if ($('#loket4').attr('checked')) {
			$('#show-loket4').show();
			
		} else {
			$('#show-loket4').hide();
		}




		});

	
   
	

	
	
</script>


<?php 
//include "keyboardVirtual.php";
include "footer.php"; 
?>
