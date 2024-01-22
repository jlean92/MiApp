<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<form method="POST" action="">
	<label><h2>Comparar dos cadenas</h2></label>
	<table>
		<tr>
			<td><label>Introduce una cadena</label></td>
			<td><input type="text" name="Cadena" ></td>
		</tr>
		<tr>
			<td><label>Caracter a buscar</label></td>
			<td><input type="text" name="Caracter" maxlength="" minlength=""></td>
		
		</tr>
		<tr>
			<td><input type="submit" name="Boton" value="Enviar"></td>
			<td>
				<form method="POST" action="">
					<input type="submit" name="boton2" value="volver">
				</form>
			</td>
		</tr>
	</table>
</form>

<?php
	if (isset($_POST['Boton'])==false) {
		
	}
	else{

		$cad = $_POST['Cadena'];
		$car = $_POST['Caracter'];

		$posicion = strpos($cad, $car);
		if ($posicion != false) {
			echo "El caracter esta en la posicion ". ($posicion+1);
		}else{
			echo "El caracter $car no está en la cadena $cad";
		}

	}
?>

</body>
</html>