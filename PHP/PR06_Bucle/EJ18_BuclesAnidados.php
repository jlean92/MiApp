<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST" action="">
		<label><h2>Factoriales de pares</h2></label>
		<label>Introduce un numero: </label>
		<input type="number" min="1" max="15" name="numero1"><br>
		<label>Introduce otro numero: </label>
		<input type="number" min="1" max="15" name="numero2"><br>
		<input type="submit" name="boton" value="Enviar">
	</form>
<?php
	if (isset($_POST['boton'])==false) {
		
	}
	else{
		$numero1 = $_POST['numero1'];
		$numero2 = $_POST['numero2'];
		$min=min($numero1, $numero2);
		$max=max($numero1, $numero2);
		for ($i=$max; $i >= $min ; $i--) { 
			if ($i%2==0) {
				$factorial = 1;
				for ($n=1; $n <= $i ; $n++) { 
					$factorial = $factorial * $n;
				}
				echo "El factorial de $i es $factorial <br>";
			}
		}
	}
?>

</body>
</html>