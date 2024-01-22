<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="">
	<label><h2>Numeros Aleatorios </h2></label><br>
	<label>Numero: </label>
	<input type="number" name="cantidad"><br>
	<input type="submit" name="Enviar" value="Enviar">
	<input type="reset" name="Borrar" value="Borrar">


</form>
<?php
	if (isset($_POST['Enviar'])==false) {
		
	}else{
		$cantidad=$_POST['cantidad'];
		$contador=0;
		while ($contador < $cantidad) {
			$contador = $contador + 1;
			echo "$contador";
			$numAl=rand(1,100);
			echo "El numero Aleatorio es $numAl <br>";
		}
	}
?>
</body>
</html>