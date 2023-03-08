<?

header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');

require "file_connfile.php";
require "file_functionfile.php";
require "file_insertupdate.php";
include "mysql_connect.php";

date_default_timezone_set('Asia/Jakarta');	

	
$g01 = $_GET['g01'];
//$g02 = $_GET['g02'];	
//$g02a = $_GET['g02a'];
$g02  = date("Y-m-d");
$g02a = date("H:i:s");
$g03 = $_GET['g03'];	
$g04 = $_GET['g04'];
$g05 = $_GET['g05'];	
$g06 = $_GET['g06'];
$g07 = $_GET['g07'];	
$g08 = $_GET['g08'];
$g09 = $_GET['g09'];	

$gNow = date("Y-m-d H:i:s");
$gUser = "Antrian";


insertKunjungan($g01,$g02,$g02a,$g03,$g04,$g05,$g06,$g07,$g08,$g09,$gNow,$gUser,DatabaseSA,$ConSA);

function insertKunjungan($g01,$g02,$g02a,$g03,$g04,$g05,$g06,$g07,$g08,$g09,$gNow,$gUser,$gDataBase,$gCon)
{
		$gKD = fGlobal("Max(Register)","tb_tr_kunjungan","Register","RWJ.".date('Y').".%","LIKE","",$gDataBase,$gCon,"");
		if ($gKD!="") {
			$gKD = (int)substr($gKD,-7,7)+1;
		}else {
			$gKD = 1;
		}
		$regi = "RWJ.".date('Y').".".substr("0000000".$gKD,-7,7);
		
		$Jenis_Kelamin = fGlobal("Jenis_Kelamin","tb_biodata","No_KTP",$g01,"=","",$gDataBase,$gCon,"");
		$Alamat        = fGlobal("Alamat","tb_biodata","No_KTP",$g01,"=","",$gDataBase,$gCon,"1");
		$RT_RW         = fGlobal("RT_RW","tb_biodata","No_KTP",$g01,"=","",$gDataBase,$gCon,"");
		$Kecamatan     = fGlobal("Kecamatan","tb_biodata","No_KTP",$g01,"=","",$gDataBase,$gCon,"");
		$Kota_Kab      = fGlobal("Kota_Kab","tb_biodata","No_KTP",$g01,"=","",$gDataBase,$gCon,"");
		$Provinsi      = fGlobal("Provinsi","tb_biodata","No_KTP",$g01,"=","",$gDataBase,$gCon,"");
		$Kode_Pos      = fGlobal("Kode_Pos","tb_biodata","No_KTP",$g01,"=","",$gDataBase,$gCon,"");
		$Kd_Stakaw     = fGlobal("Kd_Stakaw","tb_biodata","No_KTP",$g01,"=","",$gDataBase,$gCon,"");
		$Kd_Pendidikan = fGlobal("Kd_Pendidikan","tb_biodata","No_KTP",$g01,"=","",$gDataBase,$gCon,"");
		$Kd_Pekerjaan  = fGlobal("Kd_Pekerjaan","tb_biodata","No_KTP",$g01,"=","",$gDataBase,$gCon,"");
		
		$SQ="INSERT INTO tb_tr_kunjungan SET 
			Register='$regi',
			Tanggal='$g02',
			Jam='$g02a',
			NoRekMed='$g03',
			Nama='$g04',
			Jenis_Kelamin='$Jenis_Kelamin',
			Alamat='$Alamat',
			RT_RW='$RT_RW',
			Kecamatan='$Kecamatan',
			Kota_Kab='$Kota_Kab',
			Provinsi='$Provinsi',
			Kode_Pos='$Kode_Pos',
			Kd_Stakaw='$Kd_Stakaw',
			Kd_Pendidikan='$Kd_Pendidikan',
			Kd_Pekerjaan='$Kd_Pekerjaan',		
			Nma_PnggJawab='',
			Hub_PnggJawab='',
			Alm_PnggJawab='',
			Tlp_PnggJawab='',
			Ket_Polisi='',
			Ket_Polisi_Tgl='0000-00-00',
			
			Kd_Jns_Klmpok='$g05',
			Kd_Perusahaan='$g06',
			NoRegKartu='',
			KartuBerobat='BARU',
			jenis_kedatangan='$g07',
			No_SEP='',
			Status='CheckIn',
			KePnjgLgsg='N',
			
			Recorded='$gNow',
			Pencatat='$gUser'";
		//echo " -------- ".$SQ;
		$nRs = mysqli_query($gCon, $SQ) or die(mysqli_error($gCon));
		
		$gKD = fGlobal("Max(Register)","tb_tr_kunjungan_rinci","Register",$regi.".%","LIKE","",$gDataBase,$gCon,"");
		if ($gKD!="") {$gKD = (int)substr($gKD,-2,2)+1;}
		else {$gKD = 1;}
		$g01x = $regi.".".substr("00".$gKD,-2,2);
		
		$SQ="INSERT INTO tb_tr_kunjungan_rinci SET 
			Register='$g01x',
			Tanggal='$g02',
			Jam='$g02a',
			NoRekMed='$g03',			
			Kd_Rujukan='00',
			Kd_Ruang_Poli='$g08',			
			Jns_Layanan='$g08',			
			Ibu_Hamil='$g09',
			Status='ON',
			Recorded='$gNow',
			Pencatat='$gUser'";
		$nRs = mysqli_query($gCon, $SQ) or die(mysqli_error($gCon));
}


?>