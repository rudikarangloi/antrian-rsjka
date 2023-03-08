<?

	header("Access-Control-Allow-Headers: Authorization, Content-Type");
	header("Access-Control-Allow-Origin: *");
	header('content-type: application/json; charset=utf-8');
	Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

	include "mysql_connect.php";		
	
	$limit = $_GET['limit'];
	$until = $_GET['until'];
	
	$result = $mysqli->query("SELECT  * FROM client_antrian limit ".$limit.",".$until); 
	while ($rows = $result->fetch_array()) {	
			
			$pasien[] = [
                'kode'  => $rows['kode_layanan'],
                'nama'  => $rows['description']              
				
			];	
	}
	
	
	$json['data'] = $pasien;	
	echo json_encode($json); 



?>
