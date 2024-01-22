<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
		if(isset($_POST['boton'])==false){
		
	?>
		<form method="POST" action="EJ_xxUnicaWeb.php">
			<label>Nombre = </label><br>
			<input type="text" name="nombre">
			<input type="submit" name="boton" value="Aceptar">
		</form>
	<?php
		}
		else{
			//Codigo PHP
			$nombre=$_POST['nombre'];
			echo "Bienvenido $nombre";

		}
	?>
</body>
</html>