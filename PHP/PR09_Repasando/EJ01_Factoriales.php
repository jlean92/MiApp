<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST" action="">
		<label>Numero 1 =</label>
		<input type="number" name="Num1"><br>
		<label>Numero 2 =</label>
		<input type="number" name="Num2"><br>
		<p>MENU</p>
		<p>----</p>
		<ol>
			<li>Suma de todos los factoriales comprendidos entre Numero 1 y Numero 2</li>
			<li>Tabla de multiplicar de todos los numeros pares comprendidos entre Numero 1 y Numero 2, en orden decreciente</li>
		</ol>
		<label>Elegir Opcion</label>
		<input type="number" min="1" max="2" name="opcion"><br><br>
		<input type="checkbox" name="Pares" value="Pares"><label>Pares</label><br><br>
		<input type="submit" name="boton" value="Procesar opcion">
	</form>

<?php
	if (isset($_POST['boton'])==false) {
		// code...
	}else{
		$opcion = $_POST['opcion'];
		$num1 = $_POST['Num1'];
		$num2 = $_POST['Num2'];
		$min = min($num1, $num2);
		$max = max($num1, $num2);
		switch ($opcion) {
			case '1':
				if (isset($_POST['Pares'])) {
					$suma = 0;
					for ($i=$min; $i <= $max ; $i++) { 
						if ($i % 2 ==0) {
							// code...
						
							$factorial = 1;
							for ($e=1; $e <= $i ; $e++) { 
								$factorial = $factorial * $e;
							}
							$suma = $suma + $factorial;
							echo "El factorial de $i es $factorial <br>";
						}
					}
					echo "La suma de factoriales es $suma";
				}else{
					$suma = 0;
						for ($i=$min; $i <= $max ; $i++) { 
							$factorial = 1;
							for ($e=1; $e <= $i ; $e++) { 
								$factorial = $factorial * $e;
							}
							$suma = $suma + $factorial;
							echo "El factorial de $i es $factorial <br>";
						}
					echo "La suma de factoriales es $suma";
				}
				break;
			case '2':
				for ($i=$min; $i < $max ; $i++) { 
					if ($i %2 == 0 ) {
						for ($e=1; $e <= 10 ; $e++) {
							if (isset($_POST['Pares'])) {
								if($e%2==0){
									$tabla = $i * $e;
									echo "$i * $e =$tabla  <br>";
								}
							}else{
								$tabla = $i * $e;
								echo "$i * $e =$tabla  <br>";
							}					
						}
					}
				}
				break;
			default:
				echo "No se ha introducido una opcion correcta";
				break;
		}
	}
?>

</body>
</html>