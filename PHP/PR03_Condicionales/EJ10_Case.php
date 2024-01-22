<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
		<form method="POST" action="">
			<label><h2>Que día es </h2></label><br>
			<label>Dia:</label>
			<input type="number" name="Dia">
			<input type="submit" name="boton" value="Aceptar">
		</form>
	<?php
	if(isset($_POST['boton']) == true){
			$dia=$_POST['Dia'];
			switch ($dia) {
				case '1':
					echo "Hoy es Lunes";
					break;
				case '2':
					echo "Hoy es Martes";
					break;
				case '3':
					echo "Hoy es Miercoles";
					break;
				case '4':
					echo "Hoy es Jueves";
					break;
				case '5':
					echo "Hoy es Viernes";
					break;
				case '6':
					echo "Hoy es Sabado";
					break;
				case '7':
					echo "Hoy es Domingo";
					break;
				default:
					echo "Error, opcion no valida";
					break;
			}
	}
	else{

	}
	?>
</body>
</html>