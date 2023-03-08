<?
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');

include "mysql_connect.php";



if(isset($_POST['input_data'])){

		$input_data = $_POST['input_data'];
		
		/*
		
		$tIDT = fGlobal("FS_NM_PASIEN","TC_MR","FS_KD_IDENTITAS","$input_data","=","",DatabaseSA,$ConSA,"");
		
        $query    = " SELECT FS_NM_PASIEN AS FldD, FS_MR,FS_KD_IDENTITAS, FS_NM_PASIEN, FS_ALM_PASIEN, FS_KOTA_PASIEN, FS_TLP_PASIEN
						FROM tc_mr WHERE FS_KD_IDENTITAS = '". $input_data ."' ";
        $sql      = sqlsrv_query($ConSA, $query, array(), array('Scrollable' => 'static'));
        $ketemu   = sqlsrv_num_rows($sql);
        $data     = sqlsrv_fetch_array($sql);
		
		if ($ketemu > 0) {
            $json['peringatan'] = 0;  
			$json['nama'] = $tIDT;   
			$json['data'] = $data;
        }else{
            $json['peringatan'] = 1;
			$json['nama'] = '---';
        }		
		*/
		
		$sql = "SELECT * FROM tb_biodata WHERE No_KTP = '". $input_data ."' OR NoRekMed = '". $input_data ."' ";
	
		$rstClient = $mysqli->query($sql);			
    	$rowClient = $rstClient->fetch_array();
    	if($rowClient['NoRekMed']){
			$json['peringatan'] = 0;			
			$json['data'] = $rowClient;
		}else{
			$json['peringatan'] = 1;	
			
			$json['nama'] = '---';
		}       
		
		
}else{
	
}
echo json_encode($json);


?>
