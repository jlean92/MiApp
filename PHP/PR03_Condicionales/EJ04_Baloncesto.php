<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
	if (isset($_POST['boton'])) {
		
	
?>

<form>
	<tr>
		<td>
			<label>Nombre del equipo</label>
		</td>
		<td>
			<input type="text" name="Nombre">
		</td>
	</tr>
	<tr>
		<td>
			<label>Numero de dorsal</label>
		</td>
		<td>
			<input type="number" name="dorsal">
		</td>
	</tr>
	<tr>
		<td>
			<label>Puntos Acertados</label>
		</td>
		<td>
			<input type="number" name="Acertado">
		</td>
	</tr>
	<tr>
		<td>
			<label>Puntos fallados</label>
		</td>
		<td>
			<input type="number" name="fallado">
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" name="enviar" value="Enviado">
		</td>
		<td>
			<input type="reset" name="limpiar" value="Fallado">
		</td>
	</tr>
</form>



<?php
	}
	else{

	}
?>
</body>
</html>