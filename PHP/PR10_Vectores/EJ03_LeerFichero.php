<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<?php
	$palabras = file("ficheroaLeer.txt");
	echo "<h2>Hecho con for</h2>";
	for ($i=0; $i <count($palabras) ; $i++) { 
		echo $palabras[$i]."<br>";
	}
	echo "<h2>Hecho con foreach</h2>";
	foreach ($palabras as $num_linea => $value) {
		echo $value."<br>";
	}
?>
</body>
</html>