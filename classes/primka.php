<?php
	include_once 'dokument.php';
	class Primka extends Dokument
	{
		public $dIznosUlaz;
		public $dIznosIzlaz=0;

		// constructor

        public function __construct($sSifraDokumenta, $sTipDokumenta, $dDatumDokumenta, $nKolicina, $_Artikli, $oKorisnik, $dIznosUlaz, $dIznosIzlaz){
			$this->dIznosUlaz =  $dIznosUlaz;
			$this->dIznosIzlaz = 0;
			parent::__construct($sSifraDokumenta, $sTipDokumenta, $dDatumDokumenta, $nKolicina, $_Artikli, $oKorisnik);
		} 

		// setters

		public function setIznosUlaz($IznosUlaz){
			if ($IznosUlaz > 0){
				$this->dIznosUlaz = $IznosUlaz;
			}
		}
		public function setIznosIzlaz($IznosIzlaz){
			$this->dIznosIzlaz = 0;
		}

		// destructor

		public function __destruct()
		{
		}
	}
    
?>