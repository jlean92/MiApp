<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="">
	<label><h2>Calculando el factorial</h2></label>
	<label>Introduce un numero: </label>
	<input type="number" min="1" max="10" name="num"><br>
	<label>Introduce un numero: </label>
	<input type="number" min="1" max="10" name="num2"><br>
	<input type="submit" name="boton" value="Enviar">
</form>

<?php 
	if (isset($_POST["boton"])==false) {
		// code...
	}
	else{
		$num1 = $_POST['num'];
		$num2 = $_POST['num2'];
				
		$min = min($num1, $num2);
		$max = max($num1, $num2);

		for ($i= $min ; $i <= $max ; $i++) { 
			$factoriales = 1;

			for ($n=1; $n <= $i ; $n++) { 
				$factoriales = $n * $factoriales;
			}

			echo "El factorial de $i es $factoriales<br>";

		}

		
	}
?>
</body>
</html>