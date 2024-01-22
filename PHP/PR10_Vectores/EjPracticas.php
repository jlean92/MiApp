<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
$archivo = file('medias.txt');
$count = count($archivo);
if ($count > 0) {
	for ($i=0; $i < $count ; $i++) { 
		if ($i % 2 == 0) {
			$posicion = strpos($archivo[$i], " ");
			$nombre = substr($archivo[$i], 0, $posicion);
			$apellido = substr($archivo[$i], $posicion);
			$nombres[$i]=$nombre ." " . $apellido;
			echo "Nombre:". $nombre."<br>";
			echo "apellido: $apellido<br>";
		}else{
			$numero[$i] = floatval($archivo[$i]);
			echo "Salario:".floatval($archivo[$i])."<br>";
		}	
	}
	$cuentaS = (count($numero)*2);
	
	$max = max($numero); 
	$min = min($numero); 
	$suma = 0;
	for ($i=1; $i < $cuentaS ; $i++) { 
		if ($numero[$i] == $max) {
			echo "El mayor Salario es ".$numero[$i]." y pertenece a :". $nombres[($i-1)]."<br>"; 
		}
		if ($numero[$i] == $min) {
			echo "El menor Salario es ".$numero[$i]." y pertenece a :". $nombres[($i-1)]."<br>"; 
		}
	$suma = $suma + $numero[$i];
	$i++;
	}
	echo "La media es: ". ($suma/($cuentaS/2));
}
else
{
	echo "FALTAN DATOS";
}
?>
</body>
</html>