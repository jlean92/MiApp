<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
	$notas = array(
				array("Matematicas",3,10,7),
				array("Lengua",8,5,3),
				array("Fisica",7,2,1),
				array("Latin",4,7,8),
				array("Ingles",6,2,3),
			 );
	$NFila= count($notas);
	echo "<table border='1'>";
	echo "<tr>";
	for ($i=0; $i < count($notas[0]) ; $i++) { 
		if ($i == 0) {
			echo "<th>Asignatura</th>";
		}
		else{
			ec
		}
	}
	echo "<th></th>";
	echo "</tr>";
	for ($filas=0; $filas < $NFila ; $filas++) { 
		$Ncol = count($notas[$filas]);
		for ($columnas=0; $columnas < $Ncol ; $columnas++) { 
			if ($columnas ==0) {
				echo "</tr><tr>";
			}
			echo "<td>".$notas[$filas][$columnas]."</td>";
		}
	}
	echo "</table>";
?>
</body>
</html>