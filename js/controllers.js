'use scrict';

angular.module('cadastroApp').config(
		[ '$routeProvider', '$locationProvider',
				function($routeProvider, $locationProvider) {
					$routeProvider.when('/', {
						templateUrl : 'opcoesCadastro.html'
//						,controller : 'CadastroCtrl'
					}).when('/planta', {
						templateUrl : 'cadastroPlanta.html',
						controller : 'CadPlantaCtrl'
					}).when('/doenca', {
						templateUrl : 'cadastroDoenca.html',
						controller : 'CadDoencaCtrl'
					}).when('/solucao', {
						templateUrl : 'cadastroSolucao.html',
						controller : 'CadSolucaoCtrl'
					}).when('/planta#!/familia', {
						templateUrl : 'modalFamilia.html',
						controller : 'CadSolucaoCtrl'
					}).otherwise({
						templateUrl : 'opcoesCadastro.html'
//						controller : 'optionCtrl'
					});

					$locationProvider.html5Mode(false).hashPrefix('!');
				} ]);

var MyCtrlDialog = function($scope) {
	$scope.open = function() {
		$scope.showModal = true;
	};
	$scope.ok = function() {

		$scope.showModal = false;
	};
	$scope.cancel = function() {

		$scope.showModal = false;
	};
};
