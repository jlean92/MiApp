<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 


?>
<form method="POST" action="">
	<label><h2>ALEATORIOS</h2></label>
	<label>Numero1= </label>
	<input type="number" min="1" max="100" name="num1"><br>
	<label>Numero2= </label>
	<input type="number" min="1" max="100" name="num2"><br>
	<input type="radio" name="visualizar" value="all" checked>
	<label>Visualizar los numeros entre los dos valores</label><br>
	<input type="radio" name="visualizar" value="pares">
	<label>Visualizar los numeros pares entre los dos valores en orden creciente</label><br>
	<input type="radio" name="visualizar" value="impares">
	<label>Visualizar los numeros impares entre los dos valores en orden decreciente</label><br>
	<input type="submit" name="boton" value="Mostrar informacion">
</form>
<?php 
if (isset($_POST['boton'])==false) {
	// code...
}
else{

	$num1 = $_POST['num1'];
	$num2 = $_POST['num2'];
	$visualizar = $_POST['visualizar'];
	$menor = min($num1,$num2);
	$mayor = max($num1,$num2);
	
	switch ($visualizar) {
		case 'all':
			for ($contador = $menor; $contador <= $mayor ; $contador++) { 
				echo "$contador<br>";
			}
			break;
		case 'pares':
			for ($contador = $menor; $menor <= $mayor ; $menor++) { 
				if (($contador%2)==0) {
					echo "$contador <br>";
				}
			}
			break;
		case 'impares':
			for ($contador =$mayor; $contador >= $menor ; $contador--) { 
				if (($contador%2)!=0) {
					echo "$contador <br>";
				}
			}
			break;
		default:
			echo "No se ha seleccionado ningun numero";
			break;
	}

}
?>
</body>
</html>