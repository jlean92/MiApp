<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<center>
<h2>Lista Desordenados</h2>
<table border="1" style="text-align:center;">
	<tr>
		<th>Nombres</th>
	</tr>
<?php
	// 1 Leer archivo y guardarlo en array
	$alumnos = file('EJ04_FicheroaLeer.txt');

	//2. Recorrer el array
	for ($i=0; $i < count($alumnos) ; $i++) { 
		echo "<tr><td>".trim($alumnos[$i])."</td></tr>";
	}
	
?>
</table>
<h2>Lista Ordenados</h2>
<table border="2" style="text-align:center;">
<tr>
		<th>Nombres</th>
	</tr>
<?php
	sort($alumnos);
	for ($i=0; $i < count($alumnos) ; $i++) { 
		echo "<tr><td>".trim($alumnos[$i])."</td></tr>";
	}
?>
</table>
</center>
</body>
</html>