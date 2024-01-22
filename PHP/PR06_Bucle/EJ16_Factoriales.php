<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="">
	<label><h2>Calculando el factorial</h2></label>
	<label>Introduce un numero: </label>
	<input type="number" min="1" max="7" name="num"><br>
	<input type="submit" name="boton" value="Enviar">
</form>

<?php 
	if (isset($_POST["boton"])==false) {
		// code...
	}
	else{
		$fact = $_POST['num'];
		$factoriales = 1;
		for ($i=1; $i <= $fact ; $i++) { 
			$factoriales= $factoriales * $i;
		}
		echo "El factorial es $factoriales";
	}
?>
</body>
</html>