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

		$notas={5,6,7,8,9};

	//2. Recorrerlo y pintarlo
		echo "<h2>Notas del curso</h2>";
		for ($i=0; $i < count($notas) ; $i++) { 
			echo "Nota = $notas[$i]";
		}
		
?>
</body>
</html>