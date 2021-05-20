<?php
	class Dokument
	{
		public $sSifraDokumenta;
		public $sTipDokumenta;
        public $dDatumDokumenta;
        public $dIznos;
		public $nKolicina;

		// constructor

        public function __construct($sSifraDokumenta, $sTipDokumenta, $dDatumDokumenta, $dIznos, $nKolicina){
			$this->sSifraDokumenta = $sSifraDokumenta;
			$this->sTipDokumenta =  $sTipDokumenta;
			$this->dDatumDokumenta = $dDatumDokumenta;
			$this->dIznos = $dIznos;
			$this->nKolicina = $nKolicina;
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