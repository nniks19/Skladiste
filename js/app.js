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
var oHeaderPanelModul = angular.module('skladiste-panel', []);
oHeaderPanelModul.directive("headerpanelnav",
	function(){
		return{
			restrict: "E",
			templateUrl: "../templates/navbarpanel.html"
		};
});
