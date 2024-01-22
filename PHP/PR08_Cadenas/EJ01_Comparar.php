<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="">
	<label><h2>Comparar dos cadenas</h2></label>
	<table>
		<tr>
			<td><label>Introduce una cadena</label></td>
			<td><input type="text" name="Cad1"></td>
		</tr>
		<tr>
			<td><label>Introduce otra cadena</label></td>
			<td><input type="text" name="Cad2"></td>
		
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="Boton" value="Enviar"></td>
		</tr>
	</table>
<?php
	if (isset($_POST['Boton'])==false) {
		
	}
	else{
		$Cad1 = $_POST['Cad1'];
		$Cad2 = $_POST['Cad2'];
		$valor = strcmp($Cad1, $Cad2);
		if ($valor == 0) {
			echo "Las cadenas son iguales";
		}
		elseif ($valor>0){
			echo "El nombre $Cad1 es mayor que $Cad2";
		}
		elseif ($valor<0){
			echo "El nombre $Cad1 es menor que $Cad2";
		}

	}
?>
</form>
</body>
</html>