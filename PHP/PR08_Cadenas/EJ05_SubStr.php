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
			<td><label>Introduce un correo</label></td>
			<td><input type="text" name="Correo" ></td>
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

		$correo = $_POST['Correo'];
		$posicion = strpos($correo, '@');
		$dominio = substr($correo, ($posicion+1));
		$Usuario = substr($correo, 0 ,($posicion));
		echo "Usuario: $Usuario <br>";
		echo "Dominio: $dominio";


	}
?>
</body>
</html>