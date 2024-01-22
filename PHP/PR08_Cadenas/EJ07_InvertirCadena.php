<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="">
	<label>Introducir una cadena</label>
	<input type="text" name="Cadena"><br>
	<input type="submit" name="boton" value="Enviar">
	<input type="submit" name="boton2" value="Volver">
</form>

<?php
	if (isset($_POST['boton'])==false) {
	
	}else{
		$cadena = $_POST['Cadena'];
		$cantidad = strlen($cadena);
		$inv = "";
		for ($i=($cantidad-1); $i >= 0 ; $i--) { 
			$inv = $inv . substr($cadena, $i,1);
		}
		echo "La cadena invertida es $inv";
	}
?>
</body>
</html>