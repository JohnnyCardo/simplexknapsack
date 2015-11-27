<html ng-app>

<head>
	<title>Algoritmo da Mochila - Knapsack Algorithm</title>
	<meta http-equiv="Content-Type" content="text/html">
	<meta name="description" content="Problema da Mochila - Knapsack" />
	<link rel="stylesheet" type="text/css" href="inicio.css">
	<link href='https://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.13/angular.min.js"></script>	
	<table border="0" width="100%">
    	<table border="5" width="100%">
		<tr><td align="center">
		<font size="10" color="yellow"> <b>Algoritmo da Mochila - Knapsack</b></font></td></tr>
	</table>
	<br>	
</head>
<body>
    <script type="text/javascript">
	//Usando framework de javascript pra criar campos extras
	//Assim como simplex, o primeiro campo será imune a deletação, pois é obrigatório.
      var principal = function($scope)
	  {
		$scope.array = [];//cria array
        $scope.add = function (index) 
		{
			$scope.array.push({ indexvalue: index	});
        };
		$scope.clear = function () 
		{
			$scope.array = [];
			$scope.add(-1);
        };
		$scope.delete = function(index)
		{
			$scope.array.splice(index, 1);
			if($scope.array.length == 0)
			{			$scope.add(-1);				}
		}
		$scope.add(-1);
     }
    </script>
	<div ng-controller="principal" class="form">
		<form action="mochila.php" target="blank" method="POST">
		<tr>
		<center><th><font color="white" size="7"><b><p>Knapsack - Mochila</td></font></center></p></b>
		<br><br>
			<table align="center">
			<tr>
			<center><p><font color="yellow" size="5">Escolha a capacidade da mochila a ser preenchida: </p></font></center>
				<td>
				<center><input name="pesomaximo" type="number" id="pesomaximo" tabindex="1" size="70"></center>
				</td>	
			</tr>
			<tr>
				<td>
				<br>					
				<fieldset class="field"><center><b><font color="yellow" size="4"><p>Tabela de Pesos e Valores para Mochila</center></font></p></b>
					<br>
					<table align="center">
					<tr>
						<td>
							<div ng-repeat="item in array" class="item">
							<hr>
								<font color="yellow">{{$index + 1}} )  Peso = <input name="peso[]" type="number" id="peso" tabindex="2" size="20" >  
								Valor = <input name="custo[]" type="number" id="custo" tabindex="2" size="5">
									<input type="button" id="btnRemover" value="Apagar campo" style="width: 115px; height: 25px;" ng-click="delete($index)">
								</font>
							</div>
							</td>
								<td>
									<table class="botao">
									<tr>
									<td><input type="button" id="btnAdicionar" tabindex="-1" value="Adicionar outro" style="width: 110px; height: 25px;" ng-click="add()"></td>
									</tr>
									<tr>
									<td><input type="button" id="btnLimpar" tabindex="-1" value="Remover todos" style="width: 110px; height: 25px;" ng-click="clear()"></td>
									</tr>
									</table>	
									</td>		
								</tr>	
							</table>
							<hr>
							<br>
							<table class="botao">
								<tr>
								<center><input type="submit" style="width: 150px; height: 30px;" tabindex="-1" value="Calcular"></center>
								</tr>	
							</table>	
						</fieldset>
					</td>
				</tr>
			</tr>
		</table>
		</form>
	</div>
</body>
</html>