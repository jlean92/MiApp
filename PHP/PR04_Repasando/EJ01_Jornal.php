<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
		
		if(isset($_POST['boton'])==false){
	?>
		<form method="POST" action="">
			<label><h2>Calcular Jornal</h2></label>
			<table>
				<tr>
					<td><label>Horas:</label></td>
					<td><input type="number" min="1" max="8" name="Horas"></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="radio" name="Horario" value="1" checked>
						<label>Diurno</label><br>
						<input type="radio" name="Horario" value="2">
						<label>Nocturno</label>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="checkbox" name="Domingo"value="Domingo">
						<label>Es domingo</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="boton" value="Aceptar">			
					</td>
					<td>
						<input type="reset" name="borrar" value="Cancelar">			
					</td>
				</tr>
			</table>
		</form>
	<?php
	
		}
		else{
			$horas = $_POST['Horas'];
			if(isset($_POST['Domingo'])){
				if ($_POST['Horario'] == 1) {
					$sueldo = $horas * 9;
				}
				else if ($_POST['Horario'] == 2) {
					$sueldo = $horas * 16;
				}
			}
			else{
				if ($_POST['Horario'] == 1) {
					$sueldo = $horas * 6;
				}
				else if ($_POST['Horario'] == 2) {
					$sueldo = $horas * 9;
				}
			}
		echo "Vas a cobrar $sueldo";
		}
	?>
</body>
</html>