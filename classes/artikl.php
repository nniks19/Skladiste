<?php
	class Artikl
	{
		public $sArtikl_Sifra;
        public $sArtikl_Naziv;
        public $sArtikl_Opis;
        public $sArtikl_JedMj;
        public $dArtikl_Cijena;
        public $sArtikl_Kategorija;
        public $sArtikl_URL;

        // constructor

        public function __construct($sArtikl_Sifra, $sArtikl_Naziv, $sArtikl_Opis, $sArtikl_JedMj, $dArtikl_Cijena, $sArtikl_Kategorija, $sArtikl_URL){
            $this->sArtikl_Sifra = $sArtikl_Sifra;
            $this->sArtikl_Naziv = $sArtikl_Naziv;
            $this->sArtikl_Opis = $sArtikl_Opis;
            $this->sArtikl_JedMj = $sArtikl_JedMj;
            $this->dArtikl_Cijena = $dArtikl_Cijena;
            $this->sArtikl_Kategorija = $sArtikl_Kategorija;
            $this->sArtikl_URL = $sArtikl_URL;
		} 

		// destructor

		public function __destruct()
		{
		}
        
	}
    
?>