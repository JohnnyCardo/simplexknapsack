<html ng-app>
<head>
	<link rel="stylesheet" type="text/css" href="personalização.css">
	<meta name="description" content="Implementando método Simplex" />
	<meta name="keywords" content="Programação Linear" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.13/angular.min.js"></script>
	<title> Implementando Simplex com HTML, PHP e parte de Javascript</title>
	<table border="0" width="100%">
    	<table border="5" width="100%">
		<tr><td align="center" align="center">
		<font size="10" color="black"> <b>Simplex - Implementação </b></font></td></tr>
	</table>
	<br>
	</head>
<body>

	<center> <font size="8" color="red"><b> Programação Linear </b></font> </center>
	<br>
	
    <script type="text/javascript">
//Parte de framework de javascript para criação de campos extras para preencher as restrições
//o primeiro campo de restrição será fixo, imune a ser deletado, pois é obrigatório     
	 var principal = function($scope)
	{
		$scope.array = [];
        $scope.add = function(indice) 
		{	
			$scope.array.push
		   ({ 	indexvalue: indice });
        };
		$scope.clear = function() 
		{
			//limpa array e adiciona
			$scope.array = []; $scope.add(-1);
        };
		$scope.del = function(indice)
		{
			$scope.array.splice(indice, 1);
			if($scope.array.length == 0)
				{ $scope.add(-1); }
		}
		$scope.add(-1);
    }
    </script>
	<div ng-controller="principal" class="form">
		<form action="resultado.php" target="blank" method="POST" >
			<tr>
			<center><th><b><font size="6" color="black">Método Simplex - Procedimento para Resolução de Problemas</b></td></center></font>
				<tr>
					<td>
					<br>
					<br>
					<fieldset class="field"><center><font size="5" color="red"><b>Função Objetivo</b></center></font>
					<hr>
						<table align="center">
						<tr>
							<br>
							</tr>
							<tr>
							<td>
							<b><font size="3" color="red"><p>Z = </p></font></b>
							</td>
							<td>
							<input name="funcao" type="text" id="funcaoObjetivo" tabindex="1" size="70">
							</td>	
							</tr>
						</table>
					</fieldset>
					</td>
				</tr>
				<tr>
					<td>
					<br>
					<fieldset class="field"><font size="5" color="red"><b><center>Restrições e Variaveis</center></b></font>
						<table align="center">
						<hr>
						<tr>
						<td colspan="2" class="exemplo">
						</td>
						</tr>
						<tr>
						<td>
						<div ng-repeat="item in array" class="sa">
						<b><font size="4" color="red">S.A.: </b>
						<input name="sa[]" type="text" id="regras" tabindex="2" size="20" > <= <input name="suj[]" type="text" id="regras" tabindex="2" size="5">
						<input type="button" id="btnDelete" value="Deletar campo" style="width: 120px; height: 23px;" ng-click="del($indice)">
						</div>
						</td>
						<td>
						<table class="botao">
						<tr>
						<td><input type="button" id="btnAdicionar" tabindex="-1" value="Adicionar mais um campo" style="width: 200px; height: 30px;" ng-click="add()"></td>
						</tr>
						</table>	
						</td>		
						<tr>
						<td><font color="red">Número de Iterações:<input type="text" name="qtdeit" id="qtdeit" tabindex="3" ></td></font>
						<br>
						<td><input type="submit" name="result" id="ckbImprimirResultado" tabindex="4" value="Realizar o cálculo!" ></td>
						</tr>										
						</fieldset>
				</tr>
			</tr>
		</form>
	</div>
</body>
</html>