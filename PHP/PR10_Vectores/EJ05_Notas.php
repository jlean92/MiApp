<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
	$notas=file('EJ05_Notas.txt');
	$contar = count($notas);
	for ($i=0; $i < $contar ; $i++) { 
		$notas[$i]=intval($notas[$i]);
	}
	$suma = 0;
	for ($i=0; $i < $contar ; $i++) { 
		$suma = $suma + $notas[$i];
	}
	echo "La media de las notas es ". ($suma/$contar)."<br>";

	$max = max($notas);
	echo "La nota maxima es $max<br>";
	$min = min($notas);
	echo "La nota minima es $min<br>";
?>
</body>
</html>