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
		<form method="POST" action="">
			<label>Nombre = </label>
			<input type="text" name="nombre"><br>
			<label>Años de antiguedad</label>
			<input type="number" name="anos"><br>
			<input type="radio" name="estado" value="c">
			<label>Casado</label><br>
			<input type="radio" name="estado" value="s">
			<label>Soltero</label><br>
			<input type="radio" name="estado" value="v">
			<label>Viudo</label><br>
			<input type="radio" name="estado" value="d">
			<label>Divorciado</label><br>
			<input type="submit" name="boton" value="Aceptar">
		</form>
	<?php
		}
		else{
			//Codigo PHP
			$nombre=$_POST['nombre'];
			$anos=$_POST['anos'];
			$estado=$_POST['estado'];

			switch ($anos) {
				case  >10:
					echo "Más de dos años";
					break;
				
				default:
					echo "Menos de dos años";
					break;
			}

		}
	?>
</body>
</html>