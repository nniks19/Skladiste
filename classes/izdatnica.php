<?php
	include 'dokument.php';
	class Izdatnica extends Dokument
	{
		private $dIznosUlaz = 0;
		private $dIznosIzlaz;

		// constructor

        public function __construct($sSifraDokumenta, $sTipDokumenta, $dDatumDokumenta, $dIznos, $dIznosUlaz, $dIznosIzlaz){
			$this->dIznosUlaz =  0;
			$this->dIznosIzlaz = $dIznosIzlaz;
			parent::__construct($sSifraDokumenta, $sTipDokumenta, $dDatumDokumenta, $nKolicina);
		} 

		// getters

		public function getIznosUlaz(){
			return $this->dIznosUlaz
		}
		public function getIznosIzlaz(){
			return $this->dIznosIzlaz;
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