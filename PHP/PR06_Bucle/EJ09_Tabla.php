<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST" action="">
		<label><h2>Tabla de multiplicar</h2></label>
		<label>Introduce un numero</label>
		<input type="number" min="1" max="100" name="numero"><br>
		<input type="submit" name="boton" value="Enviar">
	</form>
	<?php
		if (isset($_POST['boton'])==false) {
			
		}
		else{
			$numero = $_POST['numero'];
			for ($i=1; $i <= 10; $i++) {
				$resultado = $numero*$i ;
				echo "<br>$i * $numero = $resultado ";
			}
		}
	?>
</body>
</html>