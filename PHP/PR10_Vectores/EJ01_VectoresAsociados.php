<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
	//1. Crear el array
	$profesor = array('nombre' => "Jorge" ,'apellido' => "Leon" ,'edad' => 24 );

	//2. Recorrer el array

	echo "<h2>Datos del profesor</h2>";
	
	echo "<br> Nombre = $profesor[nombre]";
	echo "<br> Apellido = $profesor[apellido]";
	echo "<br> Edad = $profesor[edad]";

	foreach ($profesor as $key => $value) {
		echo "<br> $key = $value";
	}

?>
</body>
</html>