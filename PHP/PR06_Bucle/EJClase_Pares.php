<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<center>
<form method="POST" action="">
	<label><h2>Ejercicio De clase</h2></label>
	<table style="">
		<tr>
			<td>
				<label>Introduce un numero</label>
			</td>
			<td>
				<input type="number" name="numero1"><br>
			</td>
		</tr>
		<tr>
			<td>
				<label>Introduce un numero</label>
			</td>
			<td>
				<input type="number" name="numero2"><br>
			</td>
		</tr>
	</table>
	<br><input type="submit" name="boton" value="Enviar"><br><br>
</form>

<?php
	if (isset($_POST['boton'])==false) {
	}
	else{
		$numero1 = $_POST['numero1'];
		$numero2 = $_POST['numero2'];

		$min = min($numero1, $numero2);
		$max = max($numero1, $numero2);
?>


<?php
		for ($i=$max; $i > $min ; $i--) { 
			if ($i%2==0) {
				for ($n=1; $n <= 10; $n++) { 
					if ($n%2 == 0 ){
					$resultado = $i * $n ;
					echo "<td>$i * $n = $resultado </td></tr>";
					}
				}
			}
			else{
				for ($n=1; $n <= 10; $n++) { 
					if ($n % 2 != 0 ){
					$resultado = $i * $n ;
					echo "<td>$i * $n = $resultado </td></tr>";
					}
				}
			}
		}

	}

?>
</table>
</center>
</body>
</html>