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

		// constructor

        public function __construct($nKorisnikId, $sKorisnicko_Ime, $sLozinka, $sEmail, $sIme, $sPrezime, $sDrzava, $sGrad, $sBroj_Mobitela){
            $this->nKorisnikId = $nKorisnikId;
            $this->sKorisnicko_Ime = $sKorisnicko_Ime;
            $this->sLozinka = $sLozinka;
            $this->sEmail = $sEmail;
            $this->sIme = $sIme;
            $this->sPrezime = $sPrezime;
            $this->sDrzava = $sDrzava;
            $this->sGrad = $sGrad;
            $this->sBroj_Mobitela = $sBroj_Mobitela;
		} 

		// destructor

		public function __destruct()
		{
		}
	}
    
?>