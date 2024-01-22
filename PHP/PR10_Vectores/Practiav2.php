<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<center>
<h2>CALCULO DE SALARIOS</h2>
<?php
$archivo = file('medias.txt');
$count = count($archivo);
$min=50000;
$max=0;
$suma = 0;
if ($count > 0) {
?>

<table border="1" style="text-align:center;">
	<tr>
		<th>Nombre</th>
		<th>Salario</th>
	</tr>
<?php
$mostrar ="";
	for ($i=0; $i < $count ; $i++) { 
		if ($i % 2 == 0) {
			$nombre = trim($archivo[$i]);
			echo "<tr><td>". $nombre."</td>";
			if (isset($_POST['boton'])==true) {
				$empleado = trim($_POST['empleado']);
				if (strcasecmp($nombre, $empleado) ==0) {
					$mostrar = $nombre;
				}	
			}
		}else{
			$salario = floatval($archivo[$i]);
			
			if ($max==$salario) {
				$nombremax = $nombremax ." y ". $nombre;
			}
			if ($max<$salario) {
				$max=$salario;
				$nombremax = $nombre;
			}
			if ($min==$salario) {
				$nombremin = $nombremin ." y ". $nombre;
			}
			if ($min>$salario) {
				$min=$salario;
				$nombremin = $nombre;
			}
			if (isset($_POST['boton'])==true) {
				$empleado = trim($_POST['empleado']);
				if (strcasecmp($nombre, $empleado) ==0) {
					$mostrarS = $salario;
				}
			}
			
			echo "<td>".$salario."€</td></tr>";
			$suma = $suma + $salario;
		}	
	}
?>
</table>
<br>
<table border="1" style="text-align:center;">
	<tr>
		<th>Operacion</th>
		<th>Resultado</th>
		<th>Pertenece A</th>
	</tr>
<?php
	echo "<tr><td>El salario maximo</td><td>$max €</td><td> $nombremax </td></tr>";
	echo "<tr><td>El salario minimo</td><td>$min €</td><td> $nombremin </td></tr>";
	echo "<tr><td>El salario medio</td><td>".round(($suma/($count/2)),2)."€"."</td><td> N/A</td></tr>";
	
?>
</table>
<br>
<form method="POST" action="">
	<input type="text" name="empleado" placeholder="<?php echo $mostrar ?>">
	<input type="submit" name="boton" value="Comprobar" >
</form>
<?php
if (isset($_POST['boton'])==true) {
			if($mostrar){
				echo "Se ha seleccionado el usuario $mostrar con salario $mostrarS";
			}
	}
?>

<br><br><br>

<table border="1" style="text-align: center;">
	<tr>
		<th>Nombre</th>
		<th>Salario con Incremento</th>
	</tr>
<?php

	for ($i=0; $i < $count ; $i++) { 
		if ($i%2==0) {
			$nombre = $archivo[$i];
		}
		elseif($i%2!=0){
			$salario = $archivo[$i];
		
			if ($salario >2000) {
							$salFin = $salario * 1.20;
						}
						elseif ($salario >= 1000 && $salario <= 2000) {
							$salFin = $salario * 1.30;
						}
						elseif($salario <1000){
							$salFin = $salario * 1.40;
						}
		echo "<tr><td>$nombre</td>";
		echo "<td>$salFin €</td></tr>";
		}	
		
	}
?>

</table>

<?php
}
else
{
	echo "FALTAN DATOS";
}
?>
</center>
</body>
</html>