<?php
	header("Access-Control-Allow-Headers: Authorization, Content-Type");
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
	header('content-type: application/json; charset=utf-8');
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

	//error_reporting (0);	  	
	include "mysql_connect.php";	
		
	$loket                    = $_POST['loket'];
	$nomor_rm                 = $_POST['nomor_rm'];	
	$kodedokter              = $_POST['kodedokter'];

	//$filter_jenis_antrian = " AND jenis_antrian_poliklinik <> '0' ";
	$filter_jenis_antrian = " AND jenis_antrian_poliklinik <> '0' AND kodedokter='".$kodedokter."'";

	if($model_antrian == 1){
		//Jika nomor antrian per loket
		$rstCountId = $mysqli->query("SELECT count(*) as count FROM data_antrian WHERE counter='".$loket."' ".$filter_waktu.$filter_jenis_antrian);
	}else{
		//Jika nomor antrian tidak per loket
		$rstCountId = $mysqli->query("SELECT count(*) as count FROM data_antrian WHERE id ".$filter_waktu.$filter_jenis_antrian);	
	}
	
	

	$rowCountId = $rstCountId->fetch_array();
	if($rowCountId['count']>0){
		$jmlCountId = (int)$rowCountId['count'] + 1 ;
	}else{
		$jmlCountId = 1;
	}
	
				
	$result = $mysqli->query('SELECT description FROM client_antrian ORDER BY client'); 
	while ($rows = $result->fetch_array()) {	
		$NmArr[] = $rows['description'];
	}
			
	$val_loket = intval($loket) - 1;							
	$nama_loket= $NmArr[$val_loket];

	$result = $mysqli->query("SELECT * FROM tb_biodata WHERE NoRekMed = '". $nomor_rm ."' ORDER BY IDT"); 
	while ($rows = $result->fetch_array()) {	
		$nama_pasien = $rows['Nama'];
	}
	
		
	$data['nomor_antrian']  = $jmlCountId;
	$data['nama_loket']     = $nama_loket;
	$data['nomor_rm']       = $nomor_rm;
	$data['nama_pasien']    = $nama_pasien;
	
	echo json_encode($data);
	include 'mysql_close.php';
	
	
	

?>
