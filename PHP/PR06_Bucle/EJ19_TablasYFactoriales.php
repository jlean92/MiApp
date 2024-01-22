<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST" action="">
		<label><h2>Tablas y Factoriales</h2></label>
		<input type="submit" name="boton" value="Enviar">
	</form>
<?php
	if (isset($_POST['boton'])==false) {
		
	}
	else{
		$numero1=rand(1,10);
		$numero2=rand(1,10);

		if ($numero1 != $numero2 ) {

			$min = min($numero1, $numero2);
			$max = max($numero1, $numero2);

			
			for ($i=$min; $i < $max ; $i++) { 
				if ($i%2==0) {
					for ($n=1; $n <= 10 ; $n++) { 
						$multiplicar = $n * $i;
						echo "$n * $i = $multiplicar<br>";
					}
				}
				else{
					$factorial = 1;
					for ($n=1; $n <= $i ; $n++) { 
						$factorial = $factorial * $n;
					}
					echo "El factorial de $i = $factorial<br>";
				}
			}
		}
		else{
			
		}
	}
?>
</body>
</html>