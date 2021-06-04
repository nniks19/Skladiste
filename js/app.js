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

var oSkladistePanelModul = angular.module('skladiste-panel', ['datatables']);

oSkladistePanelModul.controller('ctablicaArtikli', ['$scope', '$http', function ($scope, $http){
		$scope.ucitajArtikle = function () {
			$http({
			method:'get',
			url: '../action/action.php?action_id=get_artikli_crud'
		}).then(function successCallback(response){
			$scope.Artikli = response.data;
		});
	}
	$scope.ucitajArtikle();
}]);

oSkladistePanelModul.controller('ctablicaPrimke', ['$scope', '$http', function ($scope, $http){
	$scope.ucitajPrimke = function(){
		$http({
			method:'get',
			url: '../action/action.php?action_id=get_primke_crud'
		}).then(function successCallback(response){
			$scope.Primke = response.data;
		});
	}
	$scope.ucitajPrimke();
}]);

oSkladistePanelModul.controller('ctablicaIzdatnice', ['$scope', '$http', function ($scope, $http){
	$scope.ucitajIzdatnice = function(){
		$http({
			method:'get',
			url: '../action/action.php?action_id=get_izdatnice_crud'
		}).then(function successCallback(response){
			$scope.Izdatnice = response.data;
		});
	}
	$scope.ucitajIzdatnice();
}]);

oSkladistePanelModul.controller('ctablicaKategorije', ['$scope', '$http', function ($scope, $http){
	$scope.ucitajKategorije = function(){
		$http({
			method:'get',
			url: '../action/action.php?action_id=get_kategorije_crud'
		}).then(function successCallback(response){
			$scope.Kategorije = response.data;
		});
	}
	$scope.ucitajKategorije();
}]);

oSkladistePanelModul.directive("headerpanelnav",
	function(){
		return{
			restrict: "E",
			templateUrl: "../templates/navbarpanel.html"
		};
});

