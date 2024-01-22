<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
	//1. Crear vector indexado
		
		$notas=array(5,6,7,8,9);

	//2. Recorrerlo y pintarlo
		echo "<h2>Notas del curso</h2>";
		$length = count($notas);
		for ($i=0; $i < $length ; $i++) { 
			echo "Nota = $notas[$i] <br>";
		}
		
?>
</body>
</html>