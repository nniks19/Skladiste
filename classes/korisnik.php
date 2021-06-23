<?php
	class Korisnik
	{
		public $nKorisnikId;
		public $sKorisnicko_Ime;
        public $sLozinka;
		public $sEmail;
		public $sIme;
        public $sPrezime;
        public $sDrzava;
        public $sGrad;
        public $sBroj_Mobitela;
        public $sDatum_Kreiranja;

		// constructor

        public function __construct($nKorisnikId, $sKorisnicko_Ime, $sLozinka, $sEmail, $sIme, $sPrezime, $sDrzava, $sGrad, $sBroj_Mobitela, $sDatum_Kreiranja){
            $this->nKorisnikId = $nKorisnikId;
            $this->sKorisnicko_Ime = $sKorisnicko_Ime;
            $this->sLozinka = $sLozinka;
            $this->sEmail = $sEmail;
            $this->sIme = $sIme;
            $this->sPrezime = $sPrezime;
            $this->sDrzava = $sDrzava;
            $this->sGrad = $sGrad;
            $this->sBroj_Mobitela = $sBroj_Mobitela;
            $this->sDatum_Kreiranja = $sDatum_Kreiranja;
		} 

		// destructor

		public function __destruct()
		{
		}
	}
    
?>