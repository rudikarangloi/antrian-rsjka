<?php
	include "mysql_connect.php";
				
       
    $dLoket = $_POST['nomor_loket']; 
	$sql_loket = " AND counter = '$dLoket'";
	$data = array();
	
	$filter_jenis_antrian = " AND jenis_antrian_poliklinik <> '0' ";	

	$sql = "SELECT id as count, nomor, nomor_lama FROM data_antrian WHERE  STATUS = 2 ". $sql_loket . $filter_waktu . $filter_jenis_antrian . " ORDER BY nomor DESC LIMIT 1";
    
	$rstClient = $mysqli->query($sql);			
    $rowClient = $rstClient->fetch_array();
    if($rowClient['count']){

		$id             = $rowClient['count'];
		$nomor_terkahir = $rowClient['nomor'];
		$nomor_lama     = $rowClient['nomor_lama'];					
				
		$data['next']    = $nomor_terkahir;	
	}else{
		$data['next']    = 0;
	}
	echo json_encode($data);
    	
   include 'mysql_close.php';
		
?>		
		
    