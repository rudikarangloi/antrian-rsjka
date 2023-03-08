<?php 
	// include('../head_css.php'); 
	// include('../constant.php');
    require "ServiceReferensi.php";

    class Referensi{
        protected $serviceReferensi;
    
        public function __construct()
        {
            $this->serviceReferensi = new ServiceReferensi;
        }

        public function getDiagnosa($kode)
        {
            $diagnosa = $this->serviceReferensi->diagnosa(($kode));
            return $diagnosa;
        }
    
        public function getPoli()
        {
            $poli = $this->serviceReferensi->poli();
            return $poli;
        }
    
        public function getDokter()
        {
            $dokter = $this->serviceReferensi->dokter();
            return $dokter;
        }
    
        public function getJadwalDokter($parameter1,$parameter2)
        {
            $request = $this->serviceReferensi->jadwalDokter($parameter1,$parameter2);
            return $request;
        }
    
        public function getPoliFingerPrint()
        {
            $request = $this->serviceReferensi->poliFingerPrint();
            return $request;
        }
        
         public function getPasienFingerPrint($parameter1,$parameter2)
        {
            $request = $this->serviceReferensi->pasienFingerPrint($parameter1,$parameter2);
            return $request;
        }
    
        public function getAntreanPerTanggal($parameter)
        {
            $request = $this->serviceReferensi->antreanPertanggal($parameter);
            return $request;
        }
    
        public function getAntreanPerKodebooking($parameter)
        {
            $request = $this->serviceReferensi->antreanPerKodebooking($parameter);
            return $request;
        }
    
        public function getAntreanBelumDilayani()
        {
            $request = $this->serviceReferensi->antreanBelumDilayani();
            return $request;
        }
    
        public function getDashboardPertanggal($parameter1,$parameter2)
        {
            $request = $this->serviceReferensi->dashboardPertanggal($parameter1,$parameter2);
            return $request;
        }
    
        public function getDashboardPerbulan($parameter1,$parameter2,$parameter3)
        {
            $request = $this->serviceReferensi->dashboardPerBulan($parameter1,$parameter2,$parameter3);
            return $request;
        }
    
        public function getAntreanBelumDilayaniPerdokterPerhariPerjam($kodepoli,$kodedokter,$hari,$jampraktek){
            $request = $this->serviceReferensi->antreanBelumDilayaniPerdokterPerhariPerjam($kodepoli,$kodedokter,$hari,$jampraktek);
            return $request;
        }
    
        public function postListTask($data){
            $request = $this->serviceReferensi->listTask($data);
            return $request;
        }
    
        public function postBatalAntrean($data){
            $request = $this->serviceReferensi->batalAntrean($data);
            return $request;
        }
    
        public function postAddFarmasi($data){
            $request = $this->serviceReferensi->addFarmasi($data);
            return $request;
        }
        
        public function postUpdateJadwalDokter($data){
            $request = $this->serviceReferensi->updateJadwalDokter($data);
            return $request;
        }
    
        
    }

    $referensi = new Referensi;
    
    if(isset($_GET["tanggal"])){
        $tanggal = $_GET["tanggal"];
    }

    if(isset($_GET["dataArray"])){
        $dataArray = $_GET["dataArray"];
    }

    if(isset($_GET["kodepoli"])){
        $kodepoli = $_GET["kodepoli"];
        $kodesubspesialis = $_GET["kodesubspesialis"];
        $kodedokter = $_GET["kodedokter"];
        $hari = $_GET["hari"];
        $buka = $_GET["buka"];
        $tutup = $_GET["tutup"];
       
    }
    

    switch ($_GET["qname"]) {
        case "dokter":
            echo $referensi->getDokter();
            break;
        case "poli":
            echo $referensi->getPoli();
            break;
        case "jadwal-dokter":
            echo $referensi->getJadwalDokter("JIW",$tanggal);
            break;
        case "update-jadwal-dokter":
            $data ='
            {
                "kodepoli": "'.$kodepoli.'",
                "kodesubspesialis": "'.$kodesubspesialis.'",
                "kodedokter": '.$kodedokter.',
                "jadwal": [
                    {
                        "hari": "'.$hari.'",
                        "buka": "'.$buka.'",
                        "tutup": "'.$tutup.'"
                    }
                ]
                }
            ';
            echo $referensi->postUpdateJadwalDokter($data);

            break;

            
        default:
            echo $referensi->getDokter();
      }
	
	?>