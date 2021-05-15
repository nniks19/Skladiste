<?php
	class Dokument
	{
		private $sSifraDokumenta;
		private $sTipDokumenta;
        private $dDatumDokumenta;
        private $dIznos;
		private $nKolicina;

		// constructor

        public function __construct($sSifraDokumenta, $sTipDokumenta, $dDatumDokumenta, $dIznos){
			$this->sSifraDokumenta = $sSifraDokumenta;
			$this->nTipDokumenta =  $sTipDokumenta;
			$this->dDatumDokumenta = $dDatumDokumenta;
			$this->dIznos = $dIznos;
		} 

		// getters

		public function getSifraDokumenta(){
			return $this->sSifraDokumenta;
		}
		public function getTipDokumenta(){
			return $this->sTipDokumenta;
		}
		public function getDatumDokumenta(){
			return $this->nDatumDokumenta;
		}
		public function getIznos(){
			return $this->dIznos;
		}

		// setters

		public function setSifraDokumenta($SifraDokumenta){
			$this->sSifraDokumenta = $SifraDokumenta;
		}
		public function setTipDokumenta($TipDokumenta){
			if ($sTipDokumenta == "PRM" || $sTipDokumenta == "IZD"){
				$this->sTipDokumenta = $TipDokumenta;
			}
		}
		public function setDatumDokumenta($DatumDokumenta){
			// add check if this is date -> in future
			$this->dDatumDokumenta = $DatumDokumenta;
		}
		public function setIznos($Iznos){
			if ($Iznos >= 0){
				$this->dIznos = $Iznos;
			}
		}

		// destructor

		public function __destruct()
		{
		}
	}
    
?>