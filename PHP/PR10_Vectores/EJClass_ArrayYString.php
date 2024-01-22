<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body style="background-color:#76c9e1;">
	<center>
	<h1>Notas Alumnos</h1>
	<table border="1" style="text-align:center;">
		<tr>
			<th style="font-size: 170%;">Nº </th>
			<th style="font-size: 170%;">Nombre </th>
			<th style="font-size: 170%;">Nota </th>
		</tr>
<?php
	$alumnos = file('Alumnos.txt');
	$cuenta = count($alumnos);
	$suma = 0;
	for ($i=0; $i < $cuenta ; $i++) { 
		echo "<tr>";
		echo "<td style='font-size: 170%;'>".($i +1)."</td>";
		echo "<td style='font-size: 170%;'>".trim(substr($alumnos[$i], 0, strpos($alumnos[$i], " ")))."</td>";
		$nota[$i] = intval(trim(substr($alumnos[$i], strpos($alumnos[$i], " "))));
		echo "<td style='font-size: 170%;'>".$nota[$i]."</td>";
		$suma = $suma + $nota[$i];
		echo "</tr>";
	}
?>
</table>
<br>
<table border="1" style="text-align:center;">
	<tr>
		<th style='font-size: 170%;'>Operacion</th>
		<th style='font-size: 170%;'>Resultado</th>
	</tr>
<?php
	echo "<tr>";
	echo "<td style='font-size: 170%;'>Media</td>";
	echo "<td style='font-size: 170%;'>".($suma/$cuenta)."</td>";
	echo "</tr>";
	$notaBaja = min($nota);
	$notaAlta = max($nota);
	$cuentaA = count($nota);
	for ($i=0; $i <$cuentaA ; $i++) { 
		$nota = intval(trim(substr($alumnos[$i], strpos($alumnos[$i], " "))));
		if ($nota  == $notaBaja){
			
			$nombre = trim(substr($alumnos[$i], 0, strpos($alumnos[$i], " ")));
			echo "<tr>";
			echo "<td style='font-size: 170%;'>Mas Baja</td>";
			echo "<td style='font-size: 170%;'>$nombre : $nota</td>";
			echo "</tr>";
		}
		if ($nota  == $notaAlta){
			$nombre = trim(substr($alumnos[$i], 0, strpos($alumnos[$i], " ")));
			echo "<tr>";
			echo "<td style='font-size: 170%;'>Mas Alta</td>";
			echo "<td style='font-size: 170%;'>$nombre : $nota</td>";

			echo "</tr>";

		}
	}

?>
</table>
</center>
</body>
</html>
