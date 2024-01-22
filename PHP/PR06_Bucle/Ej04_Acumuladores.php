<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
if (isset($_POST['Enviar'])==false) {

?>
<form method="POST" action="">
	<label>Numero: </label>
	<input type="number" name="veces"><br>
	<input type="submit" name="Enviar" value="Enviar">
	<input type="reset" name="Vaciar" value="Vaciar">
	<br>
	
</form>
<?php
	
		
	}else{
		$veces=$_POST['veces'];
		$contador=0;
		$pares=0;
		$impares=0;
		while ($contador < $veces) {
			$contador ++;
			$aleat = rand(1,100);
			if(($aleat%2)==0){
				$pares++;
			}else{
				$impares++;
			}
			echo "El numero es $aleat <br>";
		}
		echo "<br>Se han mostrado $contador numeros <br><br> ";
		echo "Se han generado $pares pares <br>";
		echo "Se han generado $impares impares <br>";
	}
?>
</body>
</html>