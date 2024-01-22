<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<table>
		<tr>
			<td>
				Nombre del equipo
			</td>
			<td>
				Numero de dorsal
			</td>
			<td>
				Puntos acertados
			</td>
			<td>
				Puntos fallados
			</td>
			<td>
				Valoracion
			</td>		
		</tr>
		<tr>
<?php
	$nombre=$_POST['Nombre'];
	$dorsal=$_POST['dorsal'];
	$acertados=$_POST['Acertado'];
	$fallados=$_POST['fallado'];

	echo "
		<td>$nombre</td>
		<td>$dorsal</td>
		<td>$acertados</td>
		<td>$fallados</td>
		"
?>
		</tr>
	</table>
</body>
</html>