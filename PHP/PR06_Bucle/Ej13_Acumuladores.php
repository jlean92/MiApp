<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 

	$numero1 = rand(1,20) ;
	$numero2 = rand(1,20);
	if ($numero1 == $numero2) {
		echo "Los dos numeros son iguales";
	}
	else{
	$min = min($numero1, $numero2);
	$max = max($numero1, $numero2);
	echo "Los numeros aleatorios son: $min y $max <br>";
	$resultado = 0;
	for ($i=$min; $i < $max; $i++) { 
		if ($i%2 ==0) {
			
			$resultadoAntes = $resultado;
			$resultado = $resultado + $i;
			echo "$resultado = $resultadoAntes + $i <br>";

		}
		
	}
	echo "El resultado es $resultado";
	}
?>
</body>
</html>