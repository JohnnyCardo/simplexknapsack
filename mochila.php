<html>
<head>
	<title>Knapsack - Algoritmo da Mochila</title>
	<meta charset="utf-8">
	<meta name="description" content="Problema da Mochila - Knapsack" />
	<link rel="stylesheet" type="text/css" href="mochila.css">
	<meta http-equiv="Content-Type" content="text/html">
</head>
<body>
<?php 
	if(!isset($_POST['pesomaximo']) && !isset($_POST['peso']) && !isset($_POST['custo']))
	{	echo "Entre com os valores corretamente!"; //break;	
		die;	}

//Criando função para tabela:	
	function mostraTabela($tabela, $arraypeso, $linhatabela, $colunatabela, $tblfinal)
	{
		echo "<table style=\"border: 2px solid black; width: 100%; \">";
		echo "<tr><th class=\"base\">#</th>";
		for($x=0; $x<$colunatabela; $x++) 
		{
			echo "<th>";	echo $x;	echo "</th>";
		}		
		echo "</tr>";
		
		for($x=0; $x<$linhatabela; $x++) 
		{
			echo "<tr><td>";
			if($x==0)
			{		
				echo "<center>";
				echo 0; //colocando zero		
			}
			else
			{		
				echo "<center>";	echo $arraypeso[$x-1];		
			}				
			echo "</td>";
			for($y=0; $y<$colunatabela; $y++) 
			{
				echo "<td><center>";	echo $tabela[$x][$y];	echo "</td>";
			}	
			echo "</tr>";
		}		
		echo "</table>";	
	}
	
	$arraypeso = $_POST['peso'];
	$arraycusto = $_POST['custo'];	
	$pesomaximo = $_POST['pesomaximo'];
	
	$tabela; 
	$tblfinal;
	$linhatabela = count($arraypeso)+1;
	$colunatabela = $pesomaximo+1;
	$resultado="";
	
	for($x=0; $x<$linhatabela; $x++) 
	{
		for($y=0; $y<$colunatabela; $y++) 
		{
			$tblfinal[$x][$y] = "t_0";	$tabela[$x][$y] = 0;
		}
	}

	for($x=0; $x<$linhatabela; $x++) 
	{
		for($y=0; $y<$colunatabela; $y++) 
		{
			if($x==0 || $y==0)
				continue;
			if($arraypeso[$x-1]<=$y)
			{
				$indicex = $tabela[$x-1][$y];
				$indicey = $tabela[$x-1][$y-$arraypeso[$x-1]] + $arraycusto[$x-1];
					if($indicex>$indicey)
						$tabela[$x][$y] = $indicex;
					else
						$tabela[$x][$y] = $indicey;
			}
			else
			{	$tabela[$x][$y] = $tabela[$x - 1][$y];	}
		}
	}			
	//Verificação pro algoritmo escolher itens a serem adicionados:
	$linha = $linhatabela-1;
	$coluna = $colunatabela-1;
	$ctotal = 0;
	$ptotal = 0;	

	do
	{
		if($tabela[$linha][$coluna] == $tabela[$linha - 1][$coluna])
		{
			$tblfinal[$linha][$coluna]=false;
			$linha = $linha-1;
			$coluna = $coluna;
		}
		else
		{
			$resultado = $resultado."<center><h4> item de peso ".$arraypeso[$linha - 1]." e valor = ".$arraycusto[$linha - 1].";</h4></center>";
			$ptotal += $arraypeso[$linha - 1];
			$ctotal += $arraycusto[$linha - 1];

			$tblfinal[$linha][$coluna] = "t_1";
			$linha = $linha-1;
			$coluna = $coluna-$arraypeso[$linha];
		}
		
		if($linha==0)
		{	$tblfinal[$linha][$coluna] = "t_2";	}
	}
	
	while($linha!=0);
	$resultado = $resultado."<center><font color='red'><h3> Peso adicionado à mochila = ".$ptotal."</h3></font>";
	$resultado = $resultado."<font color='red'><h3> Valor final = ".$ctotal."</h4></font></center>";
	echo "<br><hr/>";
	echo "<center><h3>Tabela gerada através de programação dinâmica</h3></center>";
	mostraTabela($tabela, $arraypeso, $linhatabela, $colunatabela, $tblfinal);
	echo "<br><hr>";
	echo "<center><h2>Itens escolhidos pelo algoritmo:</h2></center>";
	echo $resultado;
?>
</body>
</html>	