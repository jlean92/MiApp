<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<?php
	//1. crear una matriz indexada
	$notas = 	array(
					array(3,10,7),
				   	array(8,5,3),
				   	array(7,2,1),
				   	array(4,7,8),
				   	array(6,2,3),
				);
	//2. visualizar la cantidad de filas y de columnas que tiene 
	$nfilas = count($notas);
	for ($fila=0; $fila < $nfilas ; $fila++) { 
		$ncol = count($notas[$fila]);
		for ($columna=0; $columna < $ncol ; $columna++) { 
			echo "En la fila ". $fila. " la columna $columna es ". $notas[$fila][$columna]."<br>" ;
		}
	}
	//3. visualizar los datos.
?>

</body>
</html>