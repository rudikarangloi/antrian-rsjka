<?php 
		session_start();
		
		include "mysql_connect.php";
		$data  = array();
		$date  = date("Y-m-d");		
		$loket = $_POST['nomor_loket'];
		//$sql_loket = " AND counter = ".$loket ;
        //$loket = '2';
		$kodedokter = getKodeDokter(trim($loket));	
		// switch (trim($_POST['nomor_loket'])) {
		// 	case "1":
		// 		$kodedokter = "K0001";
		// 	  break;
		// 	case "2":
		// 		$kodedokter = "342806";
		// 	  break;
		// 	case "3":
		// 		$kodedokter = "306446";
		// 	  break;
		// 	case "4":
		// 		$kodedokter = "305407";
		// 	  break;
		// 	case "5":
		// 		$kodedokter = "K0005";
		// 	  break;
			
		//   }	
		//$kodedokter = "342806";
		$sql_loket = " AND kodedokter='".$kodedokter."'" ;	//filter loket diganti kode dokter
		$filter_jenis_antrian = " AND jenis_antrian_poliklinik <> '0' ";		
	
		$rst = $mysqli->query('SELECT max(nomor) as id FROM data_antrian WHERE status=2 '. $sql_loket . $filter_waktu . $filter_jenis_antrian); // Nomor tertinggi
		$row = $rst->fetch_array();
		if ($row['id']==NULL) {
            $id=0;               
		} else {
            $id=$row['id'];              
		}
		$data["init_max_queque"] = $id; 
		
		
		$rst = $mysqli->query('SELECT COUNT(*) as id FROM data_antrian WHERE status '. $sql_loket . $filter_waktu. $filter_jenis_antrian); // Jumlah Total antrian
		$row = $rst->fetch_array();
		if ($row['id']==NULL) {
            $id=0;               
		} else {
            $id=$row['id'];              
		}
		

		$data["init_count_queque"] = $id; 
		$data["kodedokter"] = $kodedokter; 
		$data["loket"] = $loket;
		
				
		echo json_encode($data);
		include 'mysql_close.php';


		function getKodeDokter($kode)
		{
			$kdDokter = array ('','K0001','342806','306446','305407','K0005');
			return $kdDokter[$kode];
		}
	
?>