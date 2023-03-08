
<?php
	// require "../bridging-bpjs-package/ServiceReferensi.php";
	
	// class Referensi{
	// 	protected $serviceReferensi;
	
	// 	public function __construct()
	// 	{
	// 		$this->serviceReferensi = new ServiceReferensi;
	// 	}
	
				
	// 	public function postUpdateJadwalDokter($data){
	// 		$request = $this->serviceReferensi->updateJadwalDokter($data);
	// 		return $request;
	// 	}
	
	
	// }

	if(isset($_POST['btn_save']))
	{
	    $txt_id      = $_POST['hidden_id'];
	    $txt_hari    = $_POST['hidden_hari'];
	    $txt_kodepoli= $_POST['hidden_kodepoli'];
	    $txt_kodesubspesialis = $_POST['hidden_kodesubspesialis'];

	    $txt_nomor   = $_POST['txt_nomor'];
	    $txt_nama    = $_POST['txt_nama'];
		$txt_jadwal  = $_POST['txt_jadwal'];	
		$dateSearch = '-';								
		if(isset($_POST["dateSearch"])){
            $dateSearch = $_POST["dateSearch"];		
        }									
	   		
		$split = explode("-",$txt_jadwal);
		$buka = $split[0];
		$tutup = $split[1];
		
		//jadwal: "08:00-13:30"
		$data ='
            {
               "kodepoli": "'.$txt_kodepoli.'",
			   "kodesubspesialis": "'.$txt_kodesubspesialis.'",
			   "kodedokter": '.$txt_id.',
			   "jadwal": [
				  {
					 "hari": "'.$txt_hari.'",
					 "buka": "'.$buka.'",
					 "tutup": "'.$tutup.'"
				  }
			   ]
            }
        ';
		$dataArray = [    
			'kodepoli' => $txt_kodepoli,    
			'kodesubspesialis' => $txt_kodesubspesialis,    
			'kodedokter' => $txt_id,  
			'hari' => $txt_hari, 
			'buka' => $buka,   
			'tutup' => $tutup 
		];

		
		$kodepoli = $txt_kodepoli;
		$kodesubspesialis = $txt_kodesubspesialis;
		$kodedokter = $txt_id;
		$hari = $txt_hari;
		$buka = $buka;
		$tutup = $tutup;
		

		$api_url = $url_bridging."qname=update-jadwal-dokter&kodepoli=$kodepoli&kodesubspesialis=$kodesubspesialis&kodedokter=$kodedokter&hari=$hari&buka=$buka&tutup=$tutup";
		$json_data = file_get_contents($api_url);
		$response_data = json_decode($json_data);
   		$code = $response_data->metadata->code;
   		$message = $response_data->metadata->message;
		// echo '&nbsp;&nbsp;&nbsp;'.$message;

		// echo '<p>'.$dateSearch;
		// exit;
		header("location: ".$_SERVER['REQUEST_URI']."?qryDateSearch=".$dateSearch."&message=".$message);

	    // if($query == true){
	    //     $_SESSION['edit'] = 1;
	    //     header("location: ".$_SERVER['REQUEST_URI']);
	    // }

		// if(mysqli_error($con)){
		// 	$_SESSION['duplicate'] = 1;
        //     header ("location: ".$_SERVER['REQUEST_URI']);
		// }
	}
?>
