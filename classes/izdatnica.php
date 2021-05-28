<?php
	include_once 'dokument.php';
	class Izdatnica extends Dokument
	{
		public $dIznosUlaz = 0;
		public $dIznosIzlaz;

		// constructor

        public function __construct($sSifraDokumenta, $sTipDokumenta, $dDatumDokumenta, $dIznos, $nKolicina, $_Artikli, $dIznosUlaz, $dIznosIzlaz){
			$this->dIznosUlaz =  0;
			$this->dIznosIzlaz = $dIznosIzlaz;
			parent::__construct($sSifraDokumenta, $sTipDokumenta, $dDatumDokumenta, $dIznos, $nKolicina, $_Artikli);
		} 

		// setters

		public function setIznosUlaz($IznosUlaz){
			$this->dIznosUlaz = 0;
		}
		public function setIznosIzlaz($IznosIzlaz){
			if ($IznosIzlaz > 0){
				$this->dIznosIzlaz = $IznosIzlaz;
			}
		}

		// destructor

		public function __destruct()
		{
		}
	}
    
?>