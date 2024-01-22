<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agencia De Viajes</title>
</head>
<body style="background-color:#FFF000;">

<?php
	if (isset($_POST['boton'])==false) {
		// code...
	
?>

<center>
<h2>AGENCIA DE VIAJES</h2>
<h2>Jorge León</h2>
<form method="POST" action="">
<table border="1">
	<tr>
		<th>Informacion Del cliente</th>
		<th>Destino</th>
		<th>Operaciones</th>
	</tr>
	<tr>
		<td>
			<label>Nombre completo(Nombre Apellido): </label>
			<input type="text" name="nombreyap" placeholder="nombre apellido"><br>
			<label>Días: </label>
			<input type="number" min="1" max="10" name="dias"><br>
			<label>Personas: </label>
			<input type="number" min="1" max="10" name="personas">
		</td>
		<td>
			<label>Destino</label><br>
			<input type="radio" name="destino" value="praga">
			<label>PRAGA</label><br>
			<input type="radio" name="destino" value="Venecia">
			<label>VENECIA</label>
		</td>
		<td>
			<label>ELEGIR ESPECIALIZACION</label><br>
			<input type="checkbox" name="exp">
			<label>Expediente y descuentos</label><br>
			<input type="checkbox" name="cod">
			<label>Codigo e importe</label>
		</td>
	</tr>
</table>
<input type="submit" name="boton" value="Aceptar">
<input type="reset" name="vaciar" value="Borrar">
</form>
</center>
<?php
}else{
	$nombreyap=$_POST['nombreyap'];
	$espacio = strpos($nombreyap, " ");
	$nombre = trim(substr($nombreyap,0,$espacio));
	$apellido = trim(substr($nombreyap,$espacio));
	$destino = $_POST['destino'];
	$personas = $_POST['personas'];
	$dias = $_POST['dias'];

	echo "<h2>Colegio Montessori</h2><br>";
	if (isset($_POST['exp'])) {
		echo "<h3>EXPEDIENTE DEL VIAJE Y DESCUENTOS</h3>";		
		echo "Nombre: ".$nombre ."<br>";
		echo "Apellido: ".$apellido ."<br>";
		$exp = $nombre."-AgenciaMontessori";
		echo "Expediente: ".$exp."<br>";
		if (strcmp($destino, "praga")==0) {
			$descuento = 1;
			for ($i=1; $i <= $dias; $i++) { 
				$descuento = $descuento * $i;
			}
		}
		elseif (strcmp($destino, "Venecia")==0) {
			$descuento = 0;
			for ($i=1; $i <= 10; $i++) { 
				$resultado = $personas * $i;
				$descuento = $descuento + $resultado;
			}
		}
		echo "Descuento: ".$descuento."<br><br>";
	}
	if (isset($_POST['cod'])) {
		echo "<h3>CODIGO E IMPORTE DEL VIAJE</h3>";	
		echo "Nombre: ".$nombre ."<br>";
		echo "Apellido: ".$apellido ."<br>";
		$long=strlen($apellido);
		echo "Codigo: ";
		for ($i=$long; $i >= 0 ; $i--) { 
			echo substr($apellido, $i,1);
		}
		echo "-AgenciaMontessori<br>";
		$importe=0;
		$min = min($dias, $personas);
		$max = max($dias, $personas);
		if (strcmp($destino, "praga")==0) {
			for ($i=$min; $i <= $max ; $i++) { 
				if ($i%2 == 0 ) {
					$importe = $importe + $i;	
				}
			}
		}
		elseif (strcmp($destino, "Venecia")==0) {
			for ($i=1; $i < 10 ; $i++) { 
				if ($i%2==0) {
					$resultado = $i * $personas;
					$importe = $importe + $resultado;
				}
			}
		}
		echo "Importe: ".$importe."<br><br>";
	}
?>
<form>
<input type="submit" name="Boton2" value="Volver">
</form>
<?php
}
?>
</body>
</html>