<?
//Backend pendaftaran pasien baru
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require "file_connfile.php";
require "file_functionfile.php";
require "file_insertupdate.php";
include "mysql_connect.php";

date_default_timezone_set('Asia/Jakarta');	

	
$nik = $_POST['nik'];
$nohp = $_POST['nohp'];	
$noBPJS = $_POST['noBPJS'];
$nama_pasien = $_POST['nama_pasien'];	
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$kodeBooking = $_POST['kodeBooking'];

$gNow = date("Y-m-d H:i:s");
$gUser = "Antrian";


addBiodata($nik,$nohp,$noBPJS,$nama_pasien,$tgl_lahir,$jenis_kelamin,$kodeBooking,$gNow,$gUser,DatabaseSA,$ConSA);

function addBiodata($nik,$nohp,$noBPJS,$nama_pasien,$tgl_lahir,$jenis_kelamin,$kodeBooking,$gNow,$gUser,$gDataBase,$gCon)
{
		$gKD = fGlobal("Max(NoRekMed)","tb_biodata","NoRekMed","%","LIKE","",$gDataBase,$gCon,"");
		if ($gKD!="") {
			$gKD = (int)substr($gKD,-6,6)+1;
		}else {
			$gKD = 1;
		}

		//002506
		$regi = substr("000000".$gKD,-6,6);
		
		//$Alamat        = fGlobal("Alamat","tb_biodata","No_KTP",$g01,"=","",$gDataBase,$gCon,"");		
		
		$SQ="INSERT INTO tb_biodata SET 
			NoRekMed='$regi',
			Nama='$nama_pasien',
			Jenis_Kelamin='$jenis_kelamin',
			No_KTP='$nik',
			No_Telpon='$nohp',
			Tanggal_Lahir='$tgl_lahir',
			No_BPJS='$noBPJS',
			no_kartu='$noBPJS',	
			kodebooking='$kodeBooking',						
			Recorded='$gNow',
			Pencatat='$gUser'";
			//echo $SQ;
		$nRs = mysqli_query($gCon, $SQ) or die(mysqli_error($gCon));

		$data['norm'] = $regi;	
		$data['nama_pasien'] = $nama_pasien;	
		$data['No_KTP'] = $nik;
		$data['Tanggal_Lahir'] = $tgl_lahir;
		
		echo json_encode($data);
		
				
}


?>
