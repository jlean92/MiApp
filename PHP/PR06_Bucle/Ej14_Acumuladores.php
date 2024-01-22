<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form>
	<label><h2>Generar dos aleatorios y mistrar la suma de los pares y la suma de los impares entre ellos</h2></label>
	<input type="submit" name="boton" value="Enviar">
</form>
<?php 
if (isset($_POST['boton'])==false) {
	// code...
}
	$numero1 = rand(1,20) ;
	$numero2 = rand(1,20);
	if ($numero1 == $numero2) {
		echo "Los dos numeros son iguales";
	}
	else{
	$min = min($numero1, $numero2);
	$max = max($numero1, $numero2);
	echo "Los numeros aleatorios son: $min y $max <br>";
	$resultadoPar = 0;
	$resultadoImPar = 0;
	for ($i=$min; $i < $max; $i++) { 
		if ($i%2 ==0) {
			
			$resultadoAntes = $resultadoPar;
			$resultadoPar = $resultadoPar + $i;
			echo "PAR: $resultadoPar = $resultadoAntes + $i <br>";

		}
		else{
			$resultadoAntes = $resultadoImPar;
			$resultadoImPar = $resultadoImPar + $i;
			echo "IMPAR $resultadoImPar = $resultadoAntes + $i <br>";	
		}
		
	}
	echo "El resultado es $resultadoImPar <br>";
	echo "El resultado es $resultadoPar";
	}
?>
</body>
</html>