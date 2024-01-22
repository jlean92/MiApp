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
			<label><H2>Consulta tu tarifa</H2></label><br>
			<input type="radio" name="tipo" value="1" checked>
			<label>Por pasos</label><br>
			<input type="radio" name="tipo" value="2">
			<label>Por minutos</label><br><br>
			<label>Cuantos minutos ha durado la llamada </label>
			<input type="text" name="valor"><br><br>
			<input type="submit" name="boton" value="Aceptar">
		</form>
	<?php
		if(isset($_POST['boton'])==false){
		}
		else{
			//Codigo PHP
			echo "Consultando tu tarifa <br><br>";
			$valor = $_POST['valor'];
			if ($_POST['tipo'] == "2" ) {
				if ($valor<3) {
					echo "Tu tarifa es 0,10";
				}
				else{
					echo "Tu tarifa es ". (0.10 + ($valor-3)*0.05);
				}
			}
			if ($_POST['tipo'] == "1"){
				
				if ($valor<5) {
					echo "Tu tarifa es 0,10";
				}
				else{
					echo "Tu tarifa es ". (0.10 + ($valor-5)*0.05);
				}
			}


			



		}
	?>
</body>
</html>