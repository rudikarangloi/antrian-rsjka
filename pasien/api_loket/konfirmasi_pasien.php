<?
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');

include "mysql_connect.php";



if(isset($_POST['input_data'])){

		$input_data = $_POST['input_data'];
				
		$sql = "SELECT * FROM tb_biodata WHERE No_KTP = '". $input_data ."' OR NoRekMed = '". $input_data ."' ";	
		$rstClient = $mysqli->query($sql);			
    	$rowClient = $rstClient->fetch_array();
    	if($rowClient['NoRekMed']){
			$json['peringatan'] = 0;			
			$json['data'] = $rowClient;

			//Cek di tabel antrian,jika berasal dari aplikasi jkn bpjs maka langsung cetak nomor 
			$sqla = "SELECT * FROM data_antrian WHERE (nik = '". $input_data ."' OR nomorkartubpjs = '". $input_data ."')
					AND status=3 AND input_from = 'jkn' AND DATE(waktu) = CURDATE()";	
			$rsta = $mysqli->query($sqla);			
			$rowAntrian = $rsta->fetch_array();
			if($rowAntrian['nik']){
				$json['directPrint'] = 1;
				$json['nomor_antrian'] = $rowAntrian['nomor'];
				$json['kodebooking'] = $rowAntrian['kodebooking'];

				$kode_dokter = $rowAntrian['kodedokter'];
				
				switch ($kode_dokter) {
					case "K0001":
					  $nomor_loket = "Ruang Perawatan 1";
					  $nama_dokter = "dr.Frida Ayu N.H, SpKJ";
					  break;
					case "342806":
						$nomor_loket = "Ruang Perawatan 2";
						$nama_dokter = "dr.Fadlian Noor, SpKJ";
					  break;
					case "306446":
						$nomor_loket = "Ruang Perawatan 3";
						$nama_dokter = "dr.Dina E.Sinaga, SpKJ";
					  break;
					case "305407":
						$nomor_loket = "Ruang Perawatan 4";
						$nama_dokter = "dr.Yulinar N. Siringo, MSc, SpKJ";
					  break;
					case "K0005":
						$nomor_loket = "Ruang Perawatan 1";
						$nama_dokter = "drg. Sri Fadjar L, M.Kes";
					  break;
					
					default:
						$nomor_loket = "Ruangan 0";
						$nama_dokter = "dr.Yulinar N. Siringo, MSc, SpKJ";
				}

				$json['loket'] = $nomor_loket;				
				$json['nama_dokter'] = $nama_dokter;
			}else{
				$json['directPrint'] = 0;
			}
		}else{
			$json['peringatan'] = 1;				
			$json['nama'] = '---';
			$json['directPrint'] = 0;
		}       
		
		
}else{
	
}
echo json_encode($json);


?>
