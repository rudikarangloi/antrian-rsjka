<?php

use Bpjs\Bridging\Antrol\BridgeAntrol;
use Bpjs\Bridging\Vclaim\BridgeVclaim;

require "vendor/autoload.php";

class ServiceReferensi{
    protected $bridging;

    public function __construct()
    {
        //$this->bridging = new BridgeVclaim;
        $this->bridging = new BridgeAntrol;
    }

    public function diagnosa($kode){
        $endpoint = "referensi/diagnosa/{$kode}";

        $diagnosa = $this->bridging->getRequest($endpoint);
        return $diagnosa;
    }

    public function poli(){
        $endpoint = "/ref/poli";

        $poli = $this->bridging->getRequest($endpoint);
        return $poli;
    }

    public function dokter(){
        $endpoint = "/ref/dokter";

        $dokter = $this->bridging->getRequest($endpoint);
        return $dokter;
    }

    public function jadwalDokter($Parameter1,$Parameter2){
        $endpoint = "/jadwaldokter/kodepoli/{$Parameter1}/tanggal/{$Parameter2}";

        $jadwalDokter = $this->bridging->getRequest($endpoint);
        return $jadwalDokter;
    }

    
    public function poliFingerPrint(){
        $endpoint = "/ref/poli/fp";

        $request = $this->bridging->getRequest($endpoint);
        return $request;
    }
	
	public function pasienFingerPrint($Parameter1,$Parameter2){
		$endpoint = "/ref/pasien/fp/identitas/{$Parameter1}/noidentitas/{$Parameter1}";

        $request = $this->bridging->getRequest($endpoint);
        return $request;
    }


    //Antrean Per tanggal
    public function antreanPertanggal($Parameter){
        $endpoint = "/antrean/pendaftaran/tanggal/{$Parameter}";

        $request = $this->bridging->getRequest($endpoint);
        return $request;
    }

    //Antrean per Kodebooking
    public function antreanPerKodebooking($Parameter){
        $endpoint = "/antrean/pendaftaran/kodebooking/{$Parameter}";

        $request = $this->bridging->getRequest($endpoint);
        return $request;
    }

    //Antrean belumdilayani
    public function antreanBelumDilayani(){
        $endpoint = "/antrean/pendaftaran/aktif";

        $request = $this->bridging->getRequest($endpoint);
        return $request;
    }

    //Dashboard Per tanggal
    public function dashboardPertanggal($Parameter1,$Parameter2){
        $endpoint = "/dashboard/waktutunggu/tanggal/{$Parameter1}/waktu/{$Parameter2}";

        $request = $this->bridging->getRequest($endpoint);
        return $request;
    }

    //Dashboard Per bulan
    public function dashboardPerBulan($Parameter1,$Parameter2,$Parameter3){
        $endpoint = "/waktutunggu/bulan/{$Parameter1}/tahun/{$Parameter2}/waktu/{$Parameter3}";

        $request = $this->bridging->getRequest($endpoint);
        return $request;
    }

    //Antrean Belum Dilayani Per Poli Per Dokter Per Hari Per Jam Praktek
    public function antreanBelumDilayaniPerdokterPerhariPerjam($kodepoli,$kodedokter,$hari,$jampraktek){
        $endpoint = "/antrean/pendaftaran/kodepoli/{$kodepoli}/kodedokter/{$kodedokter}/hari/{$hari}/jampraktek/{$jampraktek}";

        $request = $this->bridging->getRequest($endpoint);
        return $request;
    }

    //Get List task
    public function listTask($kodeBooking){
        $endpoint = "/antrean/getlisttask";

        $request = $this->bridging->postRequest($endpoint,$kodeBooking);
        return $request;
    }

    //Batal antrean    
    public function batalAntrean($kodeBooking){
        $endpoint = "/antrean/batal";

        $request = $this->bridging->postRequest($endpoint,$kodeBooking);
        return $request;
    }

    //Tambah  farmasi
    public function addFarmasi($kodeBooking){
        $endpoint = "/antrean/farmasi/add";

        $request = $this->bridging->postRequest($endpoint,$kodeBooking);
        return $request;
    }
	
	//update jadwal dokter
	public function updateJadwalDokter($postData){
        $endpoint = "/jadwaldokter/updatejadwaldokter";

        $request = $this->bridging->postRequest($endpoint,$postData);
        return $request;
    }
	
}

?>