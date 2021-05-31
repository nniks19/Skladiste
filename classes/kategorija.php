<?php
	class Kategorija
	{
		public $nIdKategorije;
		public $sNazivKategorije;

		// constructor

        public function __construct($nIdKategorije, $sNazivKategorije){
			$this->nIdKategorije = $nIdKategorije;
			$this->sNazivKategorije = $sNazivKategorije;
    	} 

		// destructor

		public function __destruct()
		{
		}
	}
    
?>