<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="">
	<label>Nombre y Primer Apellido = </label>
	<input type="text" name="nombre"><br>
	<h3><u>Menu</u></h3>
	<ol>
		<li>Pintar el nombre carácter a carácter y separados por guiones.</li>
		<li>Mostrar la cantidad de caracteres que tiene el nombre y la cantidad de caracteres que tiene el apellido.</li>
		<li>Pintar el apellido en orden inverso en la misma línea.</li>
		<li>Buscar en el apellido la posición que ocupa el primer carácter del nombre.</li>
	</ol>
	<label>Elegir Opcion</label>
	<input type="number" min="1" max="4" name="opcion"><br>
	<input type="submit" name="boton" value="Procesar opcion">
</form>
<?php
	if (isset($_POST['boton'])==false) {
		// code...
	}
	else{
		$nombreyap=$_POST['nombre'];
		$numero = $_POST['opcion'];
		switch ($numero) {
			case '1':
				$nombre = substr($nombreyap, 0, strpos($nombreyap, " "));
				$length = strlen($nombre);
				for ($i=0; $i < $length ; $i++) { 
					echo substr($nombre, $i, 1)."-";
				}
				break;
			case '2':
				$nombre = substr($nombreyap, 0, strpos($nombreyap, " "));
				$apellido = substr($nombreyap, strpos($nombreyap, " "));
				$nombre = trim($nombre);
				$apellido = trim($apellido);
				echo "El nombre tiene ".strlen($nombre)." caracteres <br>";
				echo "El apellido tiene ".strlen($apellido)." caracteres";
				break;
			case '3':
				$apellido = substr($nombreyap, strpos($nombreyap, " "));
				$apellido = trim($apellido);
				$length = strlen($apellido);
				for ($i=$length ; $i >= 0 ; $i--) { 
					echo substr($apellido, $i,1);
				}
				break;
			case '4':
				$caracter = substr($nombreyap, 0, 1);
				$apellido = substr($nombreyap, strpos($nombreyap, " "));
				echo "La posición de la letra ". $caracter." en el apellido es la posición ".stripos($apellido, $caracter);;
				break;
			default:
				echo "Se ha seleccionado una ocion incorrecta";
				break;
		}
	}
?>
</body>
</html>