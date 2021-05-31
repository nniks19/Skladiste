var oSkladisteModul = angular.module('skladiste-app', []);
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
var oSkladistePanelModul = angular.module('skladiste-panel', []);
oSkladistePanelModul.directive("headerpanelnav",
	function(){
		return{
			restrict: "E",
			templateUrl: "../templates/navbarpanel.html"
		};
});