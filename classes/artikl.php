<?php
	class Artikl
	{
		public $sArtikl_Sifra;
        public $sArtikl_Naziv;
        public $sArtikl_Opis;
        public $sArtikl_JedMj;
        public $dArtikl_Cijena;
        public $nArtikl_KategorijaId;
        public $sArtikl_URL;

        // constructor

        public function __construct($sArtikl_Sifra, $sArtikl_Naziv, $sArtikl_Opis, $sArtikl_JedMj, $dArtikl_Cijena, $nArtikl_KategorijaId, $sArtikl_URL){
            $this->sArtikl_Sifra = $sArtikl_Sifra;
            $this->sArtikl_Naziv = $sArtikl_Naziv;
            $this->sArtikl_Opis = $sArtikl_Opis;
            $this->sArtikl_JedMj = $sArtikl_JedMj;
            $this->dArtikl_Cijena = $dArtikl_Cijena;
            $this->nArtikl_KategorijaId = $nArtikl_KategorijaId;
            $this->sArtikl_URL = $sArtikl_URL;
		} 

		// destructor

		public function __destruct()
		{
		}
        
	}
    
?>