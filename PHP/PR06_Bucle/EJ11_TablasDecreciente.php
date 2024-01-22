<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST" action="">
		<label><h2>Listado de tablas</h2></label>
		<label>Introduce un numero = </label>
		<input type="number" min="1" max="100" name="num1">
		<input type="submit" name="boton" value="enviar">
	</form>
	<table cellpadding="15">
		<tr>
	<?php
		if (isset($_POST['boton'])==false) {
			
		}
		else{
			
			$num1 = $_POST['num1'];

			for ($i=$num1; $i > 0; $i--) {
				if ($i%5 == 0) {
					echo "</tr><tr>";
				}
				
				echo "<td>";
				echo "<h3>La tabla del numero $i</h3>"; 
				echo "<table border='1' >";

				for ($e=1; $e <= 10 ; $e++) { 
					$resultado = $i * $e;
					echo "<tr><td>$i * $e = $resultado</td></tr>"; 
				}
				echo "</table>";
				echo "</td>";
			}
			
		}
	?>
		</tr>
	</table>
</body>
</html>