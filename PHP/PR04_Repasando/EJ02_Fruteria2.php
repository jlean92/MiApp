<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="">
	<h1>Fruteria</h1>
	<label>Kilos de Manzanas </label><input type="number" name="Manzanas"><br><br>
	<label>Kilos de peras </label><input type="number" name="Peras"><br><br>
	<input type="submit" name="Boton" value="Enviar">
</form>
<?php 
	if (isset($_POST['Boton'])==false) {
		// code...
	}
	else{
		$manzanas = $_POST['Manzanas'];
		$peras = $_POST['Peras'];

		switch ($manzanas) {
			case (0-2):
				echo "Hay entre 0 y 2 Kilos de manzanas";
				break;
			
			default:
				echo "Otro tamaño";
				break;
		}

		#if ($manzanas <= 2 && $manzanas >= 0){
		#	if ($peras == 0 ) {
		#		echo "Tienes un descuento de 0%";
		#	}
		#	elseif ($peras >0 && $peras <=2) {
		#		echo "Tienes un descuento de 5%";
		#	}
		#	else {
		#		echo "Tienes un descuento de 10%";
		#	}
		#}
		#elseif ($manzanas > 2 && $manzanas <= 5) {
		#	if ($peras >= 2 && $peras <= 4) {
		#		echo "Tienes un descuento de 10%";
		#	}
		#	elseif ($peras > 4) {
		#		echo "Tienes un descuento de 20%";
		#	}
		#	else{
		#		echo "Tienes un descuento de 5%";
		#	}
		#}
		#elseif ($manzanas > 5 && $manzanas <= 10) {
		#	if ($peras > 0) {
		#		echo "Tienes un descuento de 15%";	
		#	}
		#	else{
		#		echo "Tienes un descuento de 10%";
		#	}
		#}
		#elseif ($manzanas > 10) {
		#	echo "Tienes un descuento de 20%";
		#}

	}

?>
</body>
</html>