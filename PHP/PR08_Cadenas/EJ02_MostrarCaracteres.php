<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="">
	<label><h2>Dividir Cadena</h2></label>
	<label>Nombre</label>
	<input type="text" name="nombre"><br><br>
	<input type="submit" name="Boton" value="Enviar">
<?php 
	if (isset($_POST['Boton'])==false ) {
		// code...
	}
	else{
		$cadena=$_POST['nombre'];
		$longitud = strlen($cadena);
		echo "Se va a hacer con una palabra de $longitud caracteres";
		for ($i=0; $i < $longitud ; $i++) { 
			echo "<br>".substr($cadena, $i , 1);

		}
	}

?>
</form>
</body>
</html>