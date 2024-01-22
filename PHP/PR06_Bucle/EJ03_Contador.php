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
	<input type="submit" name="Enviar" value="Enviar">


</form>
<?php
	if (isset($_POST['Enviar'])==false) {
		
	}else{
		$cantidad=rand(1,10);
		$contador=0;
		echo "<br>Se va a mostrar $cantidad veces <br><br>";
		while ($contador < $cantidad) {
			$contador ++;
			$aleatorio=rand(1,100);
			echo "Aleatorio = $aleatorio <br>";
		}

	}
?>
</body>
</html>