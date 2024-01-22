<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
	require('conexion.php');
		//1. Establecer la conexion
	$conexion = new mysqli($servidor, $usuario, $password, $BaseDatos);
	//2. Comprobar si es correcta
	if ($conexion) {
		echo "Conexion correcta";
		//3. Ejecutar consulta de seleccion
		$SQL="select * from propietarios";
		$resultado = $conexion -> query($SQL);
		//4. mostrar los datos de la consulta
		echo "<br>** Datos obtenidos de la consulta **";
		//echo "Datos obtenidos = ";.count($resultado);
		echo "<table border=2>";
		foreach ($resultado as $key => $fila) {
			//pinto una fila
			echo "<tr>";
			foreach ($fila as $key => $value) {
				echo "<td>$value </td>";
			}
			echo "</tr>";
			echo "<br>";
		}
		echo "<table>";

	}else{
		echo "No se ha podido conectar";
	}
		

		

		//4. Liberar la conexion 

	?>
</body>
</html>