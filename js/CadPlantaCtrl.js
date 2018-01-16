'use strict';

angular.module("cadastroApp").controller("CadPlantaCtrl",
		function($scope, $http) {

			$scope.familia = [ {
				codFamilia : 0,
				nomFamilia : "Acaucacia"
			}, {
				codFamilia : 3,
				nomFamilia : "Leny"
			} ];
			$scope.qtdSelecionado = 1;
			$scope.selecionado;

			function acrecentaSelecionado() {
				console.log("acrescenta");
				$scope.qtdSelecionado++;
			}

			function carregarFamilia() {
				$http.get("../php/read_familia.php").success(function(data) {
					console.log(data);
				}).error(function(data, status) {
					$scope.message = "Aconteceu um problema: " + data;
					console.log(data);
				});
			}
			;

			// app.controller('customersCtrl', function($scope, $http) {
			// $http.get("http://www.w3schools.com/angular/customers_sql.aspx")
			// .then(function (response) {$scope.names =
			// response.data.records;});
			// });

			//
			function ordenarPor(campo) {
				$scope.criterioDeOrdenacao = campo;
				$scope.direcaoDaOrdenacao = !$scope.direcaoDaOrdenacao;
			};

			function isFamiliaCadastroVisivel() {
				return familiaCadastroVisivel;
			};
			function mudarVisibilidadeCadastro (){
				familiaCadastroVisivel = true;
			};
			// var carregarOperadoras = function() {
			// $http.get("http://localhost:3412/operadoras").success(
			// function(data) {
			// $scope.operadoras = data;
			// });
			// };
			//
			function adicionarFamilia(familia) {
			 $http.post('../php/record/create_familia.php', {
			 'nomFamilia' : $scope.familia
			 }).success(function(data, status, headers, config) {
				 console.log(data);
// tell the user new product was created
			  Materialize.toast(data, 4000);
			 })
			 }
			// $scope.familiaForm.$setPristine();
			// // refresh the list
			// console.log("salvo com sucesso");
			// carregarFamilia();
			// });
			// };
			// $scope.apagarContatos = function(contatos) {
			// $scope.contatos = contatos.filter(function(contato) {
			// if (!contato.selecionado)
			// return contato;
			// });
			// };
			// $scope.isContatoSelecionado = function(contatos) {
			// return contatos.some(function(contato) {
			// return contato.selecionado;
			// });
			// };
			// $scope.ordenarPor = function(campo) {
			// $scope.criterioDeOrdenacao = campo;
			// $scope.direcaoDaOrdenacao = !$scope.direcaoDaOrdenacao;
			// };
			//

			// $scope.pesquisar = function(pesquisa){
			//
			// // // Se a pesquisa for vazia
			// // if (pesquisa == ""){
			// //
			// // // Retira o autocomplete
			// // $scope.completing = false;
			// //
			// // }else{
			// //
			// // // Pesquisa no banco via AJAX
			// // $http.post('/json.php', { "data" : pesquisa}).
			// // success(function(data) {
			// //
			// // // Coloca o autocomplemento
			// // $scope.completing = true;
			// //
			// // // JSON retornado do banco
			// // $scope.dicas = data.empresas;
			// // })
			// // .
			// // error(function(data) {
			// // // Se deu algum erro, mostro no log do console
			// // console.log("Ocorreu um erro no banco de dados ao trazer
			// auto-ajuda da home");
			// // });
			// // }
			// };

			carregarFamilia();
			// carregarContatos();
			// carregarOperadoras();
		});