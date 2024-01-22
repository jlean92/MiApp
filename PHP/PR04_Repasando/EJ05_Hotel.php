<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="">
<table>
	<tr>
		<td><input type="radio" name="habitacion" value="1"></td>	
		<td><label>Habitacion Simple</label></td>
	</tr>
	<tr>
		<td><input type="radio" name="habitacion" value="2" checked></td>	
		<td><label>Habitacion Doble</label></td>
	</tr>
	<tr>
		<td><input type="checkbox" name="Desayuno" value="1"></td>
		<td><label>Desayuno</label></td>
	</tr>
	
	<tr>
		<td><input type="checkbox" name="Jacuzzi" value="1"></td>
		<td><label>Jacuzzi</label></td>	
	</tr>
	<tr>
		<td><input type="checkbox" name="Climatizador" value="1"s></td>
		<td><label>Climatizador</label></td>
	</tr>
	<tr>
		<td><input type="submit" name="Enviar" value="Enviar"></td>
		<td><input type="reset" name="Vaciar" value="Borrar"></td>
	</tr>
</table>
</form>
<?php
if(isset($_POST['Enviar'])==false){

}else{
	echo "El precio es X";
}

?>
</body>
</html>