var oHeaderModul = angular.module('skladiste-app', []);
oHeaderModul.directive("headernav",
	function(){
		return{
			restrict: "E",
			templateUrl: "templates/navbar.html"
		};
});
oHeaderModul.directive("login",
	function(){
		return{
			retrist: "E",
			templateUrl: "templates/login.html"
		}
	}
)