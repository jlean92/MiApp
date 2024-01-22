<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body bgcolor="#ff0000">
<?php
	if (isset($_POST['boton'])==false) {
		// code...
	
?>
<center>
	<h2>INSCRIPCION A LOS GRADOS DE ESPECIALIZACION</h2>
	<h2>COLEGIO MONTESSORI "Jorge Leon"</h2>
<table border="1">
<form method="POST" action="">
	<tr>
		<td>
			<label>Nombre completo(Nombre Apellido)</label>
			<input type="text" name="nombre" placeholder="Nombre Alumno"><br>
			<label>Edad</label>
			<input type="number" min="18" max="60" name="edad"><br>
			<label>Nota fin de grado</label>
			<input type="number" name="nota" min="1" max="10">
		</td>
	</tr>
	<tr>
		<td>
			<label>Grado</label><br>
			<input type="radio" name="grado" value="ASIR" checked>
			<label>ASIR</label><br>
			<input type="radio" name="grado" value="DAM">
			<label>DAM</label>
		</td>
	</tr>
	<tr>
		<td>
			<label>ELEGIR ESPECIALIZACION</label><br>
			<input type="checkbox" name="cib" value="cib">
			<label>Ciberseguridad</label><br>
			<input type="checkbox" name="IA" value="IA">
			<label>Inteligencia Artificial</label>
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" name="boton" value="Aceptar">
			<input type="reset" name="vaciar" value="Limpiar">
		</td>
	</tr>
</form>
</table>
</center>
<?php
}else{
	$nombrecomp = $_POST['nombre'];
	$edad = $_POST['edad'];
	$nota = $_POST['nota'];
	
	if (isset($_POST['cib'])==true) {
		$beca=0;
		echo "<h2>Se ha seleccionado Ciberseguridad</h2>";
		$nombre = substr($nombrecomp, 0, strpos($nombrecomp, " "));
		$apellido = substr($nombrecomp, strpos($nombrecomp, " "));
		echo "Nombre: $nombre<br>";
		echo "Apellido: $apellido<br>";
		echo "Edad: $edad <br>";
		echo "Mail: $nombre@fundacionmontessori.com <br>";
		
		if ($_POST['grado']=="ASIR") {
			$beca = 1;
			for ($i=1; $i <= $nota ; $i++) { 
				$beca = $beca * $i;
			}
		}elseif ($_POST['grado']=="DAM") {
			for ($i=1; $i <= 10 ; $i++) { 
				$tabla=$i *$nota;
				$beca = $beca + $tabla;
			}
		}
		echo "beca: $beca";
	}
	if (isset($_POST['IA'])==true) {
		$beca=0;
		echo "<h2>Se ha seleccionado Inteligencia Artificial</h2>";
		$nombre = substr($nombrecomp, 0, strpos($nombrecomp, " "));
		$apellido = substr($nombrecomp, strpos($nombrecomp, " "));
		echo "Nombre: $nombre<br>";
		echo "Apellido: $apellido<br>";
		echo "Edad: $edad <br>";
		echo "Mail:";
		$leng =strlen($apellido);
		for ($i=$leng; $i > 0 ; $i--) { 
			echo substr($apellido, $i, 1);
		}
		echo "@fundacionmontessori.com <br>";
		$min=min($nota, $edad);
		$max=max($nota, $edad);
		if ($_POST['grado']=="ASIR") {
			for ($i=$min; $i <= $max ; $i++) { 
				if($i%2==0){
					$beca = $beca + $i;
				}
			}
		}elseif ($_POST['grado']=="DAM") {
				for ($e=1; $e <= 10 ; $e++) { 
					if ($e%2==0) {
						$tabla = $e * $nota;
						$beca = $beca + $tabla;
					}
				}
		}
		echo "beca: $beca";
	}









?>
<form method="POST" action="">
<input type="submit" name="boton2" value="Volver">
</form>
<?php
}
?>
</body>
</html>