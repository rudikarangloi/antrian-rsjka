<?php

include "constant.php";
extract($_POST);
extract($_GET);





// echo "<br>radCaraBayar : ". $radCaraBayar;
// echo "<br>idPerusahaan : ". $idPerusahaan;
// echo "<br>nmPerusahaan : ". $nmPerusahaan;
// echo "<br>fBpJK : ". $fBpJK;
// echo "<br>fKtEP : ". $fKtEP;
// echo "<br>fNmaB : ". $fNmaB;
// echo "<br>fJnpK : ". $fJnpK;
// echo "<br>fJnpD : ". $fJnpD;
// echo "<br>fJnpD : ". $fJnpD;
// echo "<br>fKelK : ". $fKelK;
// echo "<br>fKelD : ". $fKelD;
// echo "<br>fStaK : ". $fStaK;
// echo "<br>fStaD  : ". $fStaD;
// echo "<br>fLakA  : ". $fLakA;
// echo "<br>fLokA  : ". $fLokA;
//  echo "<br>Alamat  : ". $fAlamat;
//  echo "<br>fNama  : ". $fNama;
//   echo "<br>fNik  : ". $fNik;
//  echo "<br>CrSaveData  : ". $CrSaveData;  //  [ibu_hamil,anak_anak,lainnya]

//  exit;

$Jns = 0;
//$fNoRM = unParseRM($fNoRM);

if ($fLakA=="2"){$fLokA="";}
$AskPrint="N";


//Tarif Registrasi
$nTrFK = 0;
//$tNmP  = fGlobal("fs_nm_pasien","tc_mr","fs_mr",$fNoRM,"=","",DatabaseSA,$ConSA,"");

/*
$sql = "SELECT FS_NM_PASIEN AS FldD FROM tc_mr WHERE FS_MR = '". $fNoRM ."'";
$rstClient = $mysqli->query($sql);			
$rowClient = $rstClient->fetch_array();
if($rowClient['FldD']){
	$tNmP= $rowClient['FldD'];
} 
*/


//Bayar Tunai
$fTuNK = 0;
$fSiSK = $nTrFK-$fTuNK;

$RekSIS= "1031.0101";
$RekBYR= "1011.011";

//Tanggal Masuk
$fTgLM = date("Y-n-j");
$fJaMM = date("H:i:s");
$gUsER = "MANDIRI";

//Jenis inap
$fInPK = "";
//Kelas perawatan
$fKlSK = "";
//Tarif Registrasi
$fTrFK = "";
//Rujukan dari
$fRjKK = "";
//No.reg ibu 
$fIbUK = "";
//Anamnesa
$fAnAM="";
//SMF/UPF
$fSmFK="";


//$KnJK = fGlobal("isnull(max(fn_kunjunganke),0)","ta_registrasi","fs_mr",$fNoRM,"=","",DatabaseSA,$ConSA,"");
$KnJK = 1;
$KnJK++;

$fMsKK = 8;


$AskPrint="Y";
//$PrmA = fGlobal("fn_registrasi_masuk","t_parameter","fn_registrasi_masuk","%","LIKE","",DatabaseSA,$ConSA,"");
$PrmA = 1;
$PrmB = $PrmA+1;
$tNEW = substr(str_repeat('0',10).$PrmA,-10,10);
$tREG = $tNEW;


// Start here for InsertKunjungan
$fLaYK = strtoupper($fLaYK);
$g01  = $fNik;
$g02  = date("Y-m-d");
$g02a = date("H:i:s");
$g03  = $FS_MR ;
$g04  = $fNama ;

$gNow = date("Y-m-d H:i:s");
$gUser = "Antrian";

if($CrSaveData == "ibu_hamil"){
	$jenis_kedatangan = "IBU";
}elseif ($CrSaveData == "anak_anak"){
	$jenis_kedatangan = "ANAK";
}else{
	$jenis_kedatangan = "NONE";
}

//pembayaran Umum
if($radCaraBayar=='V3'){
    $fJmNK = $idPerusahaan;
}elseif ($radCaraBayar=='001') {
    $fJmNK = $radCaraBayar;
	$Kd_Jns_Klmpok = "01";
	$Kd_Perusahaan = "01.2015.001";
}else{
    $fJmNK = 'BPJ';
	$Kd_Jns_Klmpok = "02";
	$Kd_Perusahaan = "";
}

								
$tlp_pasien = $TLP_PASIEN;




//Kode layanan
switch ($fLaYK) {
  case "RJ001":
    $fLaYK = "010101";
    break;
  case "RJ002":
    $fLaYK = "010102";
    break;
  case "RJ003":
    $fLaYK = "010103";
    break;
  case "RJ004":
    $fLaYK = "010104";
    break;
  case "RJ005":
    $fLaYK = "010105";
    break;
  case "RJ006":
    $fLaYK = "010106"; 
    break;
  case "RJ007":
    $fLaYK = "010107";
    break;
  default:
    $fLaYK = "010101";
}

$g05 = $Kd_Jns_Klmpok ;
$g06 = $Kd_Perusahaan ;
$g07 = $jenis_kedatangan ;
$g08 = $fLaYK ;
$g09 = $CrSaveData2 ;



//------INSERT KUNJUNGAN-----------------------------------
//$api_url = $url_api.'insertKunjunganGet.php?g01='.$g01.'&g02='.$g02.'&g02a='.$g02a.'&g03='.$g03.'&g04='.$g04.'&g05='.$g05.'&g06='.$g06.'&g07='.$g07.'&g08='.$g08.'&g09='.$g09;														
//$json_data = file_get_contents($api_url);




?>

<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title>ANTRIAN <?php echo $CLIENTNAME;?></title>
	    <link href="../assert/asset/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../assert/asset/css/jumbotron-narrow.css" rel="stylesheet">
		<script src="../assert/asset/js/jquery.min.js"></script>
	</head>
	<style>
		.jumbotron{
			background-color:#000000;	
			
		}
		
		 #loading{
            width:50px;
            height: 50px;
            border: solid 5px #ccc;
            border-top-color: #FF6A00;
            border-radius: 100%;
            position: fixed;
            left:0;
            top:0;
            right:0;
            top:0;
            bottom: 0;
            margin:auto;

            animation: putar 2s linear infinite;            
        }

         @keyframes putar{
            from{transform: rotate(0deg)}
            to{transform:rotate(360deg)}
        } 

		#loket{
			display: none;
		}
				
	
	</style>
  	<body>
		<div class="container">
			
			<div class="jumbotron">
				<font color="#FFFFFF" size="45px">
					<h1 class="counter">
						<div id="loading"></div>
						<?php //echo $rAnt;?>			
					</h1>				
				</font>	
				<p>
					<a class="btn btn-lg btn-success next_queue" href="index_home.php" role="button">BERIKUTNYA &nbsp;		
					</a>
				</p>
			</div>
			
			<footer class="footer">
			<p><?php echo date("Y");?></p>
			</footer>
			<div id="loket"><?php echo $hidden_loket;?></div>
			
										
		</div>
  	</body>
<html>
<script type="text/javascript">

$("document").ready(function(){
	
	$('.btn').html('Sedang Proses...');
	var loket = $('#loket').html();
	var caraBayar = "<?php echo $radCaraBayar;?>";
	var noBPJS = "";
	var noKTP = "";

	//var uri = "../apps/daemon.php";
	//var uri = "https://simpus.palangkaraya.go.id/api_loket/daemon.php";
	//var uri_insert_kunjungan = "https://simpus.palangkaraya.go.id/insertKunjungan.php";
	//var uri_serve = "https://simpus.palangkaraya.go.id/daemon_serve.php";
	//var $url_api = "api_loket/";
	var uri                  = "<?php echo $url_api;?>daemon.php";
	var uri_insert_kunjungan = "<?php echo $url_api;?>insertKunjungan.php";
	var uri_serve            = "<?php echo $url_api;?>daemon_serve.php";
	
	var uri_cetak_tiket = "../apps/daemon_cetak_tiket.php";
	
	var nomor_rm = "<?php echo $FS_MR;?>";
	var fAlamat = "<?php echo $fAlamat;?>";
	var fNama = "<?php echo $fNama;?>";
	var fNik = "<?php echo $fNik;?>";
	var fJnpK = "<?php echo $fJnpK;?>";
	var idPerusahaan = "<?php echo $idPerusahaan;?>";
	var nmPerusahaan = "<?php echo $nmPerusahaan;?>";
	var CrSaveData = "<?php echo $CrSaveData;?>";
	var CrSaveData2 = "<?php echo $CrSaveData2;?>";
	
	//Insert Kunjungan dan rinci
	var g01 = "<?php echo $g01;?>";
	var g02 = "<?php echo $g02;?>";
	var g02a = "<?php echo $g02a;?>";
	var g03 = "<?php echo $g03;?>";
	var g04 = "<?php echo $g04;?>";
	var g05 = "<?php echo $g05;?>";
	var g06 = "<?php echo $g06;?>";
	var g07 = "<?php echo $g07;?>";
	var g08 = "<?php echo $g08;?>";
	var g09 = "<?php echo $g09;?>";
		
	if (caraBayar=="V3") {
	  jenis_antrian_poliklinik = "2";
	} else if (caraBayar=="001") {
	  jenis_antrian_poliklinik = "3";
	} else {
	  jenis_antrian_poliklinik = "1";
	  noBPJS = "<?php echo $fBpJK;?>";
	  noKTP = "<?php echo $fKtEP;?>";
	}
	

	console.log(' loket-> '+loket);
	console.log(' nomor_rm-> '+nomor_rm);
	console.log(' caraBayar-> '+caraBayar);
	console.log(' noBPJS-> '+noBPJS);
	console.log(' noKTP-> '+noKTP);
	console.log(' jenis_antrian_poliklinik-> '+jenis_antrian_poliklinik);
	
	console.log(' fAlamat-> '+fAlamat);
	console.log(' fNama-> '+fNama);
	console.log(' fNik-> '+fNik);
	console.log(' CrSaveData-> '+CrSaveData);
	console.log(' CrSaveData2-> '+CrSaveData2);
	
	
	 $.post( uri_serve, {
				"loket" : loket,
				"nomor_rm": nomor_rm				
			} , function( data ) {
				
				//Jika cetak menggunakan mesin khusus
				//  $.post( uri_cetak_tiket, {
				// 		"nomor_antrian" : data['nomor_antrian'],
				// 		"nama_loket": data['nama_loket'],	
				// 		"nomor_rm": data['nomor_rm'],
				// 		"nama_pasien": data['nama_pasien'],
				// 		"CrSaveData": CrSaveData
				// 	} , function( data ) {					
										
						
				// 	},"json");

				//Jika cetak menggunakan browser
				showDoc('cetak_antrian',data['nomor_antrian']);									
				
			},"json");
	
	
	$.post( uri_insert_kunjungan, {
				"g01" : g01,
				"g02": g02,
				"g02a": g02a,
				"g03": g03,
				"g04": g04,
				"g05": g05,
				"g06": g06,
				"g07": g07,
				"g08": g08,				
				"g09": g09
			} , function( data ) {
				
				console.log(' OK  ');		
				
			},"json");


	nik = fNik;
	nohp = "<?php echo $tlp_pasien;?>"; 
	kodepoli = "<?php echo $fLaYK;?>"; 
	namapoli = "POLIKLINIK PENYAKIT JIWA";
	tanggalperiksa =  "<?php echo date('Y-m-d');?>";  
	kodedokter = "<?php echo $kode_dokter;?>"; 
	namadokter = "<?php echo $nama_dokter;?>";
	noBPJS = "<?php echo $fBpJK;?>";
	
			  
    $.post( uri, {
				"loket" : loket,
				"nomor_rm": nomor_rm,
				"noBPJS": noBPJS,
				"noKTP": fNik,
				"jenis_antrian_poliklinik": jenis_antrian_poliklinik,
				"fAlamat": fAlamat,
				"fNama": fNama,
				"fNik": fNik,
				"fJnpK": fJnpK,
				"idPerusahaan": idPerusahaan,
				"nmPerusahaan": nmPerusahaan,
				"CrSaveData": CrSaveData,
				"CrSaveData2": CrSaveData2
			} , function( data ) {

						
				kodebooking = data['kodebooking'];
				nik = data['nik'];
				kodepoli = data['kodepoli'];
				namapoli = data['namapoli'];
				norm = data['nomor_rm'];
				tanggalperiksa = data['tanggalperiksa'];
				nomorreferensi = data['nomorreferensi'];
				nomorantrean = data['nomor_antrian'];
				angkaantrean = data['nomor_antrian'];
				estimasidilayani = data['estimasidilayani'];
				sisakuotajkn = data['sisakuotajkn'];
				kuotajkn = data['kuotajkn'];
				sisakuotanonjkn = data['sisakuotanonjkn'];
				kuotanonjkn = data['kuotanonjkn'];
				taskid = "3";
				
				peserta(noBPJS, kodebooking, nik, nohp, kodepoli, namapoli, norm, tanggalperiksa, kodedokter, namadokter,
					    nomorreferensi, nomorantrean, angkaantrean, estimasidilayani,
					    sisakuotajkn, kuotajkn, sisakuotanonjkn, kuotanonjkn);

				// updateDataAntrean(kodebooking,taskid)

				$(".jumbotron h1").html(data["next"]);	
				$('#loading').hide();
				$('.btn').html('BERIKUTNYA');
				console.log(loket);		
				goHome();
			},"json");
	
   	

	//Tiga detik ke Home

	function goHome(){

		setInterval(function() {
			window.location = "index_home.php";  
		}, 10000);

	}

	function showDoc(aX,nomor_antrian) {

			
			var nama_pasien = "<?php echo $FS_MR;?>";
			//var inomor_antrian = $('#loket').html();
			var inomor_antrian = nomor_antrian;
			var nomor_loket = "<?php echo $nomor_loket;?>";
			var nama_dokter = "<?php echo $nama_dokter;?>";

    		// var nama_pasien = $("#hidden_loket").val();
    		// var inomor_antrian = $('#hidden_nomor_antrian').val();

    		var LeftPosition = (screen.width) ? (screen.width - 40) / 2 : 100;
    		var TopPosition = (screen.height) ? (screen.height - 20) / 2 : 100;

    		URL =  aX + '.php?nama_pasien=' + nama_pasien + '&nomor_antrian=' + inomor_antrian + '&nomor_loket=' + nomor_loket + '&nama_dokter=' + nama_dokter;
    		window.open(URL, 'WinDOC' + aX, 'toolbar=no,menubar=yes, top=' + TopPosition + ',left=' + LeftPosition + ' location=no, scrollbars=yes, resizable, width=800, height=' + 400);
	}
	

	function peserta(noBPJS, kodebooking, nik, nohp, kodepoli, namapoli, norm, tanggalperiksa, kodedokter, namadokter,
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
				pasienbaru:"0",
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
				taskid = "3";
				updateDataAntrean(kodebooking,taskid)
				var response =  eval("(" + data + ")");				
			
			});		

	}

	function updateDataAntrean(kodebooking,taskid) {

			jQuery.post('bridging_proses.php',{
				kodeBooking:kodebooking,
				taskid:taskid,
				reqdata:'updateWaktuAntrian'
			},function(data){
				
				//alert(data);
				var response =  eval("(" + data + ")");				
			
			});		

	}

	//

	// var data = {"loket" : loket};
	// $.ajax({
	// 		type: 'GET',
	// 		url: 'http://localhost:5123/SIMRSSI/antrian_release2/apps/daemon.php',
	// 		data: data,		
	// 		dataType:'json',		
	// 		xhrFields: {withCredentials: false},
	// 		headers: {
	// 			'Access-Control-Allow-Credentials' : true,
	// 			'Access-Control-Allow-Origin':'*',
	// 			'Access-Control-Allow-Methods':'GET',
	// 			'Access-Control-Allow-Headers':'application/json',
	// 		},
	// 		success: function(data) {
	// 			console.log(data);
	// 		},
	// 		error: function(error) {
	// 			console.log("FAIL....=================");
	// 		}
	// 	});

	//

});

</script>

<?php
//Catatan :
/*
Tarif Registrasi = 0
Bayar Tunai      = 0
Tanggal Masuk dibuat otomatis tanggal sistem
fs_jam_masuk  dibuat otomatis JAM sistem
fs_kd_petugas = MESIN MANDIRI
fs_kd_jenis_inap / Jenis Inap = "" --> pada tabel kosong,1,2
fs_kd_kelas / kleas perawat = "" --> pada tabel : 006,002,004
fs_kd_cara_masuk_dk / Cara masuk = 8 --> Sendiri
fs_kd_karcis / Tarif Registrasi = ""   --> Tidak ada isian



Pertanyaan :
fn_kunjunganke query nya = MAX(fn_kunjunganke). 
    Isi field ini 1 dan 2, kebanyakan 1. akibatnya kunjungan selelu ke 2
    ada isinya 651 ???


PR:
Cari tabel cara masuk :
*/


?>
