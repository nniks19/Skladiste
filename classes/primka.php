<?php
	include 'dokument.php';
	class Primka extends Dokument
	{
		private $dIznosUlaz;
		private $dIznosIzlaz=0;

		// constructor

        public function __construct($sSifraDokumenta, $sTipDokumenta, $dDatumDokumenta, $dIznos, $dIznosUlaz, $dIznosIzlaz){
			$this->dIznosUlaz =  $dIznosUlaz;
			$this->dIznosIzlaz = 0;
			parent::__construct($sSifraDokumenta, $sTipDokumenta, $dDatumDokumenta, $dIznos);
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