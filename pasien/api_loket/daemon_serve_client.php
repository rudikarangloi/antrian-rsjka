<?php
	header("Access-Control-Allow-Headers: Authorization, Content-Type");
	header("Access-Control-Allow-Origin: *");
	header('content-type: application/json; charset=utf-8');
		
	require "mysql_connect.php";
	require "constant.php";	
	date_default_timezone_set('Asia/Jakarta');
		
	$loket    = $_POST['loket'];
	$nomor_rm = $_POST['nomor_rm'];
	$kd_client = $_POST['kd_client'];	
	$counter  = "";
	$filter_jenis_antrian = " AND jenis_antrian_poliklinik = '0' ";

		//fungsi untuk mendapatkan jumlah total baris di database
	function getTotalRow($sql)
	{
		//$rs = mysql_query($sql) or die(mysql_error().$sql);
		//$r = mysql_num_rows($rs);
		//mysql_free_result($rs);

		include "mysql_connect.php";

		$rstClient = $mysqli->query($sql);		
		$rowClient = $rstClient->fetch_array();
		if($rowClient['count']>0){
			$jmlClient = $rowClient['count'];
		}else{
			$jmlClient = 0;
		}
	  
		return $jmlClient;
	}

	function KodeBooking()
	{
		//jumlah panjang karakter angka dan huruf.
		
		$length_abjad = "2";
		$length_angka = "4";

		//huruf yg dimasukan, kecuali I,L dan O
		$huruf = "ABCDEFGHJKMNPRSTUVWXYZ";

		//mulai proses generate huruf
		$i = 1;
		$txt_abjad = "";
		while ($i <= $length_abjad) {
			$txt_abjad .= $huruf{mt_rand(0,strlen($huruf))};
			$i++;
		}

		//mulai proses generate angka
		$datejam = date("His");
		$time_md5 = rand(time(), $datejam);
		$cut = substr($time_md5, 0, $length_angka);	

		//mennggabungkan dan mengacak hasil generate huruf dan angka
		$acak = str_shuffle($txt_abjad.$cut);

		//menghitung dan memeriksa hasil generate di database menggunakan fungsi getTotalRow(),
		//jika hasil generate sudah ada di database maka proses generate akan diulang

		
		$cek  = getTotalRow("SELECT count(*) as count FROM data_antrian WHERE kodebooking = '".$acak."'");
		if($cek > 0) { $cek = KodeBooking(); }

		/*
		$cek = 0;
		$rstClient = $mysqli->query("SELECT count(*) as count FROM data_antrian WHERE kodebooking = '".$acak."'");		
		$rowClient = $rstClient->fetch_array();
		if($rowClient['count']>0){
			$jmlClient = $rowClient['count'];
		}else{
			$jmlClient = 0;
		}
		if($jmlClient > 0) { $cek = KodeBooking(); }
		*/

		return $acak;
	}

	function get_client_ip() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	
					
	/*MYSQL SERVER*/
	$rstClient = $mysqli->query("SELECT * FROM data_antrian WHERE counter='' AND status=3 ". $filter_waktu. $filter_jenis_antrian . " LIMIT 1");
	
	$rowClient = $rstClient->fetch_array();
	if($rowClient['id']){
	//if(count($rowClient)>0){
			$id = $rowClient['id'];
			$results = $mysqli->query('UPDATE data_antrian SET counter='.$loket.', status=0 WHERE id='.$id.'');
			$next_counter = $id;
			//update
	}else{
			if($model_antrian == 1){
				//Jika nomor antrian per loket
				$rstCountId = $mysqli->query("SELECT count(*) as count FROM data_antrian WHERE counter='".$loket."' ". $filter_waktu . $filter_jenis_antrian);
			}else{
				//Jika nomor antrian tidak per loket
				$rstCountId = $mysqli->query("SELECT count(*) as count FROM data_antrian WHERE id ". $filter_waktu . $filter_jenis_antrian);	
			}

			$rowCountId = $rstCountId->fetch_array();
			if($rowCountId['count']>0){
				$jmlCountId = (int)$rowCountId['count'] + 1 ;
			}else{
				$jmlCountId = 1;
			}
			//insert

			$KodeBookings = KodeBooking();
			$results = $mysqli->query('INSERT INTO data_antrian (waktu,counter,status,nomor,kodebooking) VALUES ("'.date("Y-m-d H:i:s").'",'.$loket.',3,'.$jmlCountId.',"'.$KodeBookings.'")');
			
			$nama_loket= $loket_name;					
			
			if($model_antrian == 1){
				//Jika nomor antrian per loket
				//$rstCountId = $mysqli->query('SELECT count(*) as count FROM data_antrian WHERE counter='. $loket .''. $filter_waktu . $filter_jenis_antrian);
				$rstCountId = $mysqli->query('SELECT count(*) as count FROM data_antrian WHERE id '. $filter_waktu . $filter_jenis_antrian);
			}else{
				//Jika nomor antrian tidak per loket
				$rstCountId = $mysqli->query('SELECT count(*) as count FROM data_antrian WHERE id '. $filter_waktu . $filter_jenis_antrian);
			}

			$rowCountId = $rstCountId->fetch_array();
			if($rowCountId['count']>0){
				$jmlCountId = $rowCountId['count'];
			}else{
				$jmlCountId = 0;
			}
			//----
			//$next_counter = $mysqli->insert_id;
			$next_counter = $jmlCountId ;
			$data['idle'] = "TRUE";
	}
	//$results = $mysqli->query('INSERT INTO data_antrian (counter,waktu,status) VALUES ('.$loket.',"'.date("Y-m-d H:i:s").'",0)');
	$data['next'] = $next_counter;
	
	$data['nomor_antrian']  = $jmlCountId;
	$data['nama_loket']     = $nama_loket;
	$data['nomor_rm']       = $nomor_rm;
	$data['kodebooking'] = $KodeBookings;

	//Tambahan untuk pasien baru, bridging bpjs taskid=1
	$antrianDate = date("Y-m-d");
	$estimasidilayani = strtotime(date('Y-m-d H:i:s', strtotime('+3 hours')));

	$data['tanggalperiksa'] = $antrianDate;	
	
	$rstClient = $mysqli->query("SELECT * FROM client_antrian WHERE client='$kd_client' ");
	$rowClient = $rstClient->fetch_array();
	if($rowClient['id']){
		$kuota_jkn = $rowClient['kuota_jkn'];
		$kuota_hp = $rowClient['kuota_hp'];
		$kuota_web = $rowClient['kuota_web'];
		$kuota_box = $rowClient['kuota_box'];
		$kuotaNonJkn  = $kuota_hp + $kuota_web + $kuota_box ;
		$kdpoli = $rowClient['kdpoli'];
	}

	$data['kodepoli'] = $kdpoli;

	$rstCount = $mysqli->query("SELECT count(*) as count FROM data_antrian_detail WHERE jenisantrianpoliklinik='1' ");
	$rowCount = $rstCount->fetch_array();
	if($rowCount['count']>0){
		$jmlPasienBpjs = (int)$rowCount['count'] ;
	}else{
		$jmlPasienBpjs = 0;
	}
	$sisaKuotaJkn = $kuota_jkn - $jmlPasienBpjs;

	$rstCount = $mysqli->query("SELECT count(*) as count FROM data_antrian_detail WHERE jenisantrianpoliklinik<>'1' ");
	$rowCount = $rstCount->fetch_array();
	if($rowCount['count']>0){
		$jmlPasienNonBpjs = (int)$rowCount['count'] ;
	}else{
		$jmlPasienNonBpjs = 0;
	}
	$sisaKuotaNonJkn = $kuotaNonJkn - $jmlPasienNonBpjs;

	$data['nomorreferensi'] = "0001R0040116A000001";
	$data['estimasidilayani'] = $estimasidilayani;
	$data['sisakuotajkn'] = $sisaKuotaJkn;
	$data['kuotajkn'] = $kuota_jkn;
	$data['sisakuotanonjkn'] = $sisaKuotaNonJkn;
	$data['kuotanonjkn'] = $kuotaNonJkn;
	
	echo json_encode($data);
	include 'mysql_close.php';
	
?>