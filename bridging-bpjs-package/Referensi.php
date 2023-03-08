<?php

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
//echo $referensi->getDiagnosa("a32");
//echo $referensi->getPoli();
echo $referensi->getDokter();
//echo $referensi->getJadwalDokter("JIW","2023-01-30");
//echo $referensi->getPoliFingerPrint();
//echo $referensi->getPasienFingerPrint("6748373747440003","6748373747440003");   //Error
//echo $referensi->getAntreanPerTanggal("2023-01-30");
//echo $referensi->getAntreanPerKodebooking("58V4W3");
//echo $referensi->getAntreanBelumDilayani();
//echo $referensi->getDashboardPertanggal("2023-01-30","rs");   // parameter ke 2 : rs atau server   		                    [Error:metadata]
//echo $referensi->getDashboardPerbulan("01","2023","rs");   		// parameter ke 1 : bulan - parameter ke 3 : rs atau server     [Error:metadata]
//echo $referensi->getAntreanBelumDilayaniPerdokterPerhariPerjam("JIW","342806","01","08:00-13:30"); 

$data ='{"kodebooking": "58V4W3"}';
//echo $referensi->postListTask($data);

$data ='
            {
                "kodebooking": "49P10",
                "keterangan": "Terjadi perubahan jadwal dokter, silahkan daftar kembali"
            }
        ';
//echo $referensi->postBatalAntrean($data);

$data = '{
        "kodebooking": "49P10",
        "jenisresep": "racikan",
        "nomorantrean": 1,
        "keterangan": ""
    }';
//echo $referensi->postAddFarmasi($data);


$data ='
            {
               "kodepoli": "JIW",
			   "kodesubspesialis": "JIW",
			   "kodedokter": 305407,
			   "jadwal": [
				  {
					 "hari": "5",
					 "buka": "08:00",
					 "tutup": "14:00"
				  }
			   ]
            }
        ';
//echo $referensi->postUpdateJadwalDokter($data);

?>