<?php
	class Dokument
	{
		public $sSifraDokumenta;
		public $sTipDokumenta;
        public $dDatumDokumenta;
		public $nKolicina;
		public $_Artikli;
		public $oKorisnik;

		// constructor

        public function __construct($sSifraDokumenta, $sTipDokumenta, $dDatumDokumenta, $nKolicina, $_Artikli, $oKorisnik){
			$this->sSifraDokumenta = $sSifraDokumenta;
			$this->sTipDokumenta =  $sTipDokumenta;
			$this->dDatumDokumenta = $dDatumDokumenta;
			$this->nKolicina = $nKolicina;
			$this->_Artikli = $_Artikli;
			$this->oKorisnik = $oKorisnik;
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

		// destructor

		public function __destruct()
		{
		}
	}
    
?>