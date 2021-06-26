//prije panela modul skladiste-app

var oSkladisteModul = angular.module('skladiste-app', ['datatables']);

oSkladisteModul.controller('listaArtikala', ['$scope', '$http', function ($scope, $http){
	$http({
		method:'get',
		url: 'action/action.php?action_id=get_artikli'
	}).then(function successCallback(response){
		$scope.Artikli = response.data;
	});
}]);

//direktive modula skladiste-app

oSkladisteModul.directive("headernav",
	function(){
		return{
			restrict: "E",
			templateUrl: "templates/navbar.html"
		};
});
oSkladisteModul.directive("footercopy",
	function(){
		return{
			restrict: "E",
			templateUrl: "templates/footer.html"
		};
});
oSkladisteModul.directive("login",
	function(){
		return{
			retrist: "E",
			templateUrl: "templates/login.html"
		}
	}
)


//modul skladiste-panel

var appCRUD = angular.module('skladiste-panel', ['datatables']);

// direktive

appCRUD.directive("headerpanelnav",
	function(){
		return{
			restrict: "E",
			templateUrl: "../templates/navbarpanel.html"
		};
});


//kontroleri

//KategorijeCRUD.php
appCRUD.controller('kategorijeCRUD', function($scope, $http){
	$scope.dohvatiKategorije = function(){
        $http({
			method:'get',
			url: '../action/fetch_kategorija.php'
		}).then(function successCallback(response){
			$scope.Kategorije = response.data;
		});
	};
    
	$scope.openModal = function(){
		var modal_popup = angular.element('#crudmodal');
		modal_popup.modal('show');
	};

	$scope.closeModal = function(){
		var modal_popup = angular.element('#crudmodal');
		modal_popup.modal('hide');
	};

	$scope.addData = function(){
		$scope.modalNaslov = 'Dodaj kategoriju';
		$scope.submit_button = 'DODAJ';
		$scope.Kategorija_Naziv='';
		$scope.openModal();
	};

	$scope.submitForm = function(){
		$http({
			method:"POST",
			url:"../action/kategorija.php",
			data:{'Kategorija_Id': $scope.hidden_id, 'Kategorija_Naziv':$scope.Kategorija_Naziv, 'action':$scope.submit_button, 'id':$scope.hidden_id}
		}).then(function(response){
			if (response.data.error){
				alert(response.data.error);
			}
			if (response.data.message){
				alert(response.data.message);
				$scope.dohvatiKategorije();
				$scope.closeModal();
			}
		});
	};

	$scope.fetchSingleData = function(id){
		$http({
			method:"POST",
			url:"../action/kategorija.php",
			data:{'Kategorija_Id':id, 'action':'dohvati_kategoriju'}
		}).then(function(data){
			$scope.Kategorija_Id = data.data[0].nIdKategorije;
			$scope.Kategorija_Naziv = data.data[0].sNazivKategorije;
			$scope.hidden_id = id;
			$scope.modalNaslov = 'Uredi podatke';
			$scope.submit_button = 'UREDI';
			$scope.openModal();
		});
	};

	$scope.deleteData = function(id){
		if(confirm("Jeste li sigurni da želite obrisati kategoriju?"))
		{
			$http({
				method:"POST",
				url:"../action/kategorija.php",
				data:{'id':id, 'action':'Delete'}
			}).then(function(response){
				if (response.data.error){
					alert(response.data.error);
				}
				if (response.data.message){
					alert(response.data.message);
					$scope.dohvatiKategorije();
				}
			});
		}
	};

});
//ArtikliCRUD.php
appCRUD.controller('artikliCRUD', function($scope, $http){
	$scope.dohvatiArtikle = function(){
        $http({
			method:'get',
			url: '../action/fetch_artikl.php'
		}).then(function successCallback(response){
			$scope.Artikli = response.data;
		});
	};

	$scope.dohvatiKategorije = function(){
        $http({
			method:'get',
			url: '../action/fetch_kategorija.php'
		}).then(function successCallback(response){
			$scope.Kategorije = response.data;
		});
	};

	$scope.openModal = function(){
		var modal_popup = angular.element('#crudmodal');
		$scope.dohvatiKategorije();
		modal_popup.modal('show');
	};

	$scope.closeModal = function(){
		var modal_popup = angular.element('#crudmodal');
		modal_popup.modal('hide');
	};

	$scope.addData = function(){
		$scope.modalNaslov = 'Dodaj artikl';
		$scope.submit_button = 'DODAJ';
		$scope.Artikl_Sifra = '';
		$scope.Artikl_Naziv = '';
		$scope.Artikl_Opis = '';
		$scope.Artikl_JedMj = '';
		$scope.Artikl_Cijena = '';
		$scope.Artikl_URL = '';
		$scope.hidden_id = '';
		$scope.Artikl_Kategorija = '1';
		$scope.openModal();
	};

	$scope.submitForm = function(){
		$http({
			method:"POST",
			url:"../action/artikl.php",
			data:{'Artikl_Sifra': $scope.hidden_id, 'Artikl_Naziv':$scope.Artikl_Naziv, 'Artikl_Opis': $scope.Artikl_Opis, 'Artikl_JedMj': $scope.Artikl_JedMj, 'Artikl_Cijena': $scope.Artikl_Cijena, 'Artikl_URL': $scope.Artikl_URL, 'Artikl_Kategorija': $scope.Artikl_Kategorija, 'action':$scope.submit_button, 'id':$scope.hidden_id}
		}).then(function(response){
			console.log(response);
			if (response.data.error){
				alert(response.data.error);
			}
			if (response.data.message){
				alert(response.data.message);
				$scope.closeModal();
				$scope.dohvatiArtikle();
			}
		});
	};

	$scope.fetchSingleData = function(id){
		$http({
			method:"POST",
			url:"../action/artikl.php",
			data:{'Artikl_Sifra':id, 'action':'dohvati_artikl'}
		}).then(function(data){
			$scope.Artikl_Sifra = id;
			$scope.Artikl_Naziv = data.data[0].sArtikl_Naziv;
			$scope.Artikl_Opis = data.data[0].sArtikl_Opis;
			$scope.Artikl_JedMj = data.data[0].sArtikl_JedMj;
			$scope.Artikl_Cijena = data.data[0].dArtikl_Cijena;
			$scope.Artikl_URL = data.data[0].sArtikl_URL;
			$scope.hidden_id = id;
			$scope.Artikl_Kategorija = data.data[0].sArtikl_Kategorija.nArtikl_KategorijaId;
			$scope.modalNaslov = 'Uredi podatke';
			$scope.submit_button = 'UREDI';
			$scope.openModal();
		});
	};

	$scope.deleteData = function(id){
		if(confirm("Jeste li sigurni da želite obrisati artikl?"))
		{
			$http({
				method:"POST",
				url:"../action/artikl.php",
				data:{'id':id, 'action':'Delete'}
			}).then(function(response){
				if (response.data && response.data.message){
					alert("Artikl je uspješno obrisan!");
				}
				$scope.dohvatiArtikle();
			});
		}
	};

});
//IzdatniceCRUD.php
appCRUD.controller('izdatniceCRUD', function($scope, $http){
	$scope.OdabraniArtikli = [];
	$scope.dohvatiIzdatnice = function(){
        $http({
			method:'get',
			url: '../action/fetch_izdatnica.php'
		}).then(function successCallback(response){
			$scope.Izdatnice = response.data;
		});
	};

	$scope.dohvatiArtikle = function(){
        $http({
			method:'get',
			url: '../action/fetch_artikl.php'
		}).then(function successCallback(response){
			$scope.Artikli = response.data;
		});
	};

	$scope.deleteArtikl = function(sifra){
		for (var i=0;i<$scope.OdabraniArtikli.length;i++){
			if ($scope.OdabraniArtikli[i].SifraArtikla == sifra){
				$scope.OdabraniArtikli.splice(i,1); // briše taj artikl iz liste
			}
		}
	}
	$scope.checkRange = function(thisAr){
		for (var i=0;i<$scope.OdabraniArtikli.length;i++){
			if ($scope.OdabraniArtikli[i].SifraArtikla == thisAr.$$watchers[0].last){
				$scope.OdabraniArtikli[i].UnosKolicina = thisAr.Artikl_Kolicina;
			}
		}
	}
	$scope.onChangeArtikl = function(){
		// kada se odabere neki artikl ovo se izvršava
		$scope.fetchSingleArtikl();
	}

	$scope.openModal = function(){
		var modal_popup = angular.element('#crudmodal');
		$scope.dohvatiArtikle();
		$scope.OdabraniArtikli = [];
		modal_popup.modal('show');
	};

	$scope.closeModal = function(){
		var modal_popup = angular.element('#crudmodal');
		modal_popup.modal('hide');
	};

	$scope.addData = function(){
		$scope.modalNaslov = 'Kreiraj dokument';
		$scope.submit_button = 'DODAJ';
		$scope.openModal();
	};
	$scope.submitForm = function(){
		$http({
			method:"POST",
			url:"../action/izdatnica.php",
			data:{'Artikli': $scope.OdabraniArtikli, 'action':$scope.submit_button, 'id':$scope.hidden_id}
		}).then(function(response){
			if (response.data.error){
				alert(response.data.error);
			}
			if (response.data.message){
				alert(response.data.message);
				$scope.closeModal();
				$scope.dohvatiIzdatnice();
			}
		});
	};

	$scope.fetchSingleArtikl = function(){
		$http({
			method:"POST",
			url:"../action/izdatnica.php",
			data:{'Artikl_Sifra':$scope.ArtiklS, 'action':'dohvati_artikl'}
		}).then(function(data){
			var pronaden = false;
			var oArtikl = {SifraArtikla: data.data.sArtikl_Sifra, NazivArtikla: data.data.sArtikl_Naziv, DostupnaKolicina: data.data.DostupnaKolicina, UnosKolicina: 0, Artikl_Cijena: data.data.Artikl_Cijena};
			if (oArtikl.DostupnaKolicina == 0){
				pronaden= true;
				alert("Odabranog artikla nema na stanju!");
			}
			for (var i=0;i<$scope.OdabraniArtikli.length;i++){
				if ($scope.OdabraniArtikli[i].SifraArtikla == oArtikl.SifraArtikla){
					alert("Odabrani artikl je već dodan na listu!");
					pronaden=true;
				}
			}
			if (pronaden == false){
				$scope.OdabraniArtikli.push(oArtikl);
			}
		});
	};

	$scope.deleteData = function(id){
		if(confirm("Jeste li sigurni da želite obrisati izdatnicu?"))
		{
			$http({
				method:"POST",
				url:"../action/izdatnica.php",
				data:{'id':id, 'action':'Delete'}
			}).then(function(response){
				if (response.data && response.data.message){
					alert("Izdatnica je uspješno obrisana!");
				}
				$scope.dohvatiIzdatnice();
			});
		}
	};

});
//PrimkeCRUD.php
appCRUD.controller('primkeCRUD', function($scope, $http){
	$scope.OdabraniArtikli = [];
	$scope.dohvatiPrimke = function(){
        $http({
			method:'get',
			url: '../action/fetch_primka.php'
		}).then(function successCallback(response){
			$scope.Primke = response.data;
		});
	};

	$scope.dohvatiArtikle = function(){
        $http({
			method:'get',
			url: '../action/fetch_artikl.php'
		}).then(function successCallback(response){
			$scope.Artikli = response.data;
		});
	};

	$scope.deleteArtikl = function(sifra){
		for (var i=0;i<$scope.OdabraniArtikli.length;i++){
			if ($scope.OdabraniArtikli[i].SifraArtikla == sifra){
				$scope.OdabraniArtikli.splice(i,1); // briše taj artikl iz liste
			}
		}
	}
	$scope.onChangeArtikl = function(){
		// kada se odabere neki artikl ovo se izvršava
		$scope.fetchSingleArtikl();
	}

	$scope.setKolicina = function(thisAr){
		for (var i=0;i<$scope.OdabraniArtikli.length;i++){
			if ($scope.OdabraniArtikli[i].SifraArtikla == thisAr.$$watchers[0].last){
				$scope.OdabraniArtikli[i].UnosKolicina = thisAr.Artikl_Kolicina;
			}
		}
	}

	$scope.openModal = function(){
		var modal_popup = angular.element('#crudmodal');
		$scope.dohvatiArtikle();
		$scope.OdabraniArtikli = [];
		modal_popup.modal('show');
	};

	$scope.closeModal = function(){
		var modal_popup = angular.element('#crudmodal');
		modal_popup.modal('hide');
	};

	$scope.addData = function(){
		$scope.modalNaslov = 'Kreiraj dokument';
		$scope.submit_button = 'DODAJ';
		$scope.openModal();
	};
	$scope.submitForm = function(){
		$http({
			method:"POST",
			url:"../action/primka.php",
			data:{'Artikli': $scope.OdabraniArtikli, 'action':$scope.submit_button, 'id':$scope.hidden_id}
		}).then(function(response){
			if (response.data.error){
				alert(response.data.error);
			}
			if (response.data.message){
				alert(response.data.message);
				$scope.closeModal();
				$scope.dohvatiPrimke();
			}
		});
	};

	$scope.fetchSingleArtikl = function(){
		$http({
			method:"POST",
			url:"../action/primka.php",
			data:{'Artikl_Sifra':$scope.ArtiklS, 'action':'dohvati_artikl'}
		}).then(function(data){
			var pronaden = false;
			var oArtikl = {SifraArtikla: data.data.sArtikl_Sifra, NazivArtikla: data.data.sArtikl_Naziv, UnosKolicina: 0, Artikl_Cijena: data.data.Artikl_Cijena};
			for (var i=0;i<$scope.OdabraniArtikli.length;i++){
				if ($scope.OdabraniArtikli[i].SifraArtikla == oArtikl.SifraArtikla){
					alert("Odabrani artikl je već dodan na listu!");
					pronaden=true;
				}
			}
			if (pronaden == false){
				$scope.OdabraniArtikli.push(oArtikl);
			}
		});
	};

	$scope.deleteData = function(id){
		if(confirm("Jeste li sigurni da želite obrisati primku? Primka neće biti obrisana ukoliko postojeće izdatnice imaju količinu izvoza artikala veću od dostupne nakon brisanja."))
		{
			$http({
				method:"POST",
				url:"../action/primka.php",
				data:{'id':id, 'action':'Delete'}
			}).then(function(response){
				if (response.data.error){
					alert(response.data.error);
				}
				if (response.data.message){
					alert(response.data.message);
					$scope.dohvatiPrimke();
				}
			});
		}
	};

});
//profil.php
appCRUD.controller('profilController', function($scope, $http){
	$scope.dohvatiInfo = function(){
		$http({
			method:'get',
			url: '../action/fetch_korisnik.php'
		}).then(function successCallback(response){
			$scope.Korisnici = response.data;
		});
	}
	$scope.fetchPodatak = function(podatak, naslov){
		$scope.Korisnik_Podatak = podatak;
		$scope.modalNaslov = naslov;
		$scope.submit_button = 'UREDI';
		$scope.openModal();
	}
	$scope.openModal = function(){
		var modal_popup = angular.element('#crudmodal');
		$scope.dohvatiInfo();
		modal_popup.modal('show');
	};

	$scope.closeModal = function(){
		var modal_popup = angular.element('#crudmodal');
		modal_popup.modal('hide');
	};
	$scope.submitForm = function(){
		$http({
			method:"POST",
			url:"../action/korisnik.php",
			data:{'Korisnik_Podatak': $scope.Korisnik_Podatak, 'Korisnik_TipPodatka': $scope.modalNaslov}
		}).then(function(response){
			console.log(response);
			if (response.data.error){
				alert(response.data.error);
			}
			if (response.data.message){
				alert(response.data.message);
				$scope.dohvatiInfo();
				$scope.closeModal();
			}
		});
	};
});
//dashboard.php
appCRUD.controller('dashboardController', function($scope, $http){
	$http({
		method:'get',
		url: '../action/get_dashboard_stats.php'
	}).then(function successCallback(response){
		$scope.Statistika = response.data;
	});
});
appCRUD.controller('backupController', function($scope, $http){
	$scope.dummyPodaci = function(){
		$http({
			method:'get',
			url: '../action/backup/sqlrebuild.php'
		}).then(function successCallback(response){
			alert(response.data);
		});
	}
	$scope.backup = function(req){
		$http({
			method:'POST',
			url: '../action/backup/backup_create.php',
			data: {'req':req}
		}).then(function successCallback(response){
			$scope.download(req + '.txt',response.data);
		});
	}
	$scope.download = function(filename,text){
		var element = document.createElement('a');
  		element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
  		element.setAttribute('download', filename);
  		element.style.display = 'none';
  		document.body.appendChild(element);
  		element.click();
 		document.body.removeChild(element);
	}
});