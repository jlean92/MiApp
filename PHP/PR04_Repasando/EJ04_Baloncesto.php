<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="">
	<table>
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
				<input type="submit" name="boton" value="Enviar">
			</td>
			<td>
				<input type="reset" name="limpiar" value="Borrar">
			</td>
		</tr>
	</table>
</form>
<?php 
if (isset($_POST['boton'])==false) {
	// code...
}
else{


?>
<br><br>
	<table border="1">
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
	if ($acertados <=5) {
		if ($fallados >3 && $fallados <5) {
			$resultado= "Realizo un partido flojo";
		}
		else if ($fallados < 3) {
			$resultado= "No ha estado mal el partido";
		}
		else {
			$resultado= "Ha realizado muchos fallos";	
		}
	}
	if ($acertados >5 && $acertados <10) {
		if ($fallados > 10) {
			$resultado = "Ha fallado mas que aciertos";
		}
		else{
			$resultado = "Partido compensado";
		}
	}
	if ($acertados >10) {
		if ($fallados == 0 ) {
			$resultado = "Excelente Partido";
		}
		else{
			$resultado = "Buen partido"	;
		}
	}
	echo "
		<td>$nombre</td>
		<td>$dorsal</td>
		<td>$acertados</td>
		<td>$fallados</td>
		<td>$resultado</td>
		"
?>
		</tr>
	</table>
<?php
}
?>
</body>
</html>