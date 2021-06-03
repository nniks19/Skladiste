//prije panela modul skladiste-app

var oSkladisteModul = angular.module('skladiste-app', ['datatables']);

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

// controller liste artikala iz modula skladiste-app

oSkladisteModul.controller('listaArtikala', ['$scope', '$http', function ($scope, $http){
	$http({
		method:'get',
		url: 'action/action.php?action_id=get_artikli'
	}).then(function successCallback(response){
		$scope.Artikli = response.data;
	});
}]);

//modul skladiste-panel

var oSkladistePanelModul = angular.module('skladiste-panel', ['datatables']);


oSkladistePanelModul.directive("headerpanelnav",
	function(){
		return{
			restrict: "E",
			templateUrl: "../templates/navbarpanel.html"
		};
});