<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST" action="">
		<label>Peso en Kilos</label>
		<input type="number" name="Peso"><br>
		<label>Altura en centimetros</label>
		<input type="number" name="Altura"><br>
		<input type="submit" name="boton" value="Enviar">
	</form>
	<?php 
		if (isset($_POST['boton'])==false) {
		}
		else{
			$peso = $_POST['Peso'];
			$altura = $_POST['Altura'];
			$alturaM = $altura / 100 ;
			$IMC = $peso / ($alturaM * $alturaM);
			echo "El imc $IMC <br>";
			switch ($IMC) {
				case ($IMC < 16 ):
					echo "Ingresar";
					break;
				case ($IMC >= 16 && $IMC <17 ):
					echo "Infrapeso";
					break;
				case ($IMC >= 17 && $IMC <18 ):
					echo "Bajo peso";
					break;
				case ($IMC >= 18 && $IMC <25):
					echo "Peso Normal";
					break;
				case ($IMC >= 25 && $IMC <30):
					echo "sobrepeso";
					break;
				case ($IMC >= 30 && $IMC <35):
					echo "sobrepeso Crónico";
					break;
				case ($IMC >= 35 && $IMC <40):
					echo "Obesidad premórbida";
					break;
				case ($IMC >= 40):
					echo "Obesidad mórbida";
					break;
				default:
					// code...
					break;
			}
		}
	?>
</body>
</html>