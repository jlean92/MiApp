<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
if (isset($_POST['boton'])==false) {
	// code...

?>
<form method="POST" action="">
	<label>Nota de Seguridad</label>
	<input type="checkbox" name="sad"><br>
	<label>Nota de PHP</label>
	<input type="checkbox" name="iaw"><br>
	<input type="submit" name="boton" value="Ver Notas">
</form>
<?php
}else{
		$matriz = array(
		'al1'=>array(
				'nombre'=> "Ana",
				'apellido'=> "Perez", 
				'NotaIAW'=>9,
				'NotaSAD'=>10),
		'al2'=>array(
				'nombre'=> "Sara",
				'apellido'=> "Lopez", 
				'NotaIAW'=>5,
				'NotaSAD'=>6),
		'al3'=>array(
				'nombre'=> "Angel",
				'apellido'=> "Torres", 
				'NotaIAW'=>6,
				'NotaSAD'=>6),
		'al4'=>array(
				'nombre'=> "Jorge",
				'apellido'=> "Sistac", 
				'NotaIAW'=>5,
				'NotaSAD'=>4)
	);
?>
<table border="1">
	<tr>
<?php
		foreach ($matriz['al1'] as $nAlumno => $vector) {
			if ($nAlumno == 'NotaIAW') {
					if (isset($_POST["iaw"])==true) {
						echo "<td>$nAlumno</td>";
					}
				}
				elseif ($nAlumno == 'NotaSAD') {
					if (isset($_POST["sad"])==true) {
						echo "<td>$nAlumno</td>";
					}
				}
				else {
					echo "<td>$nAlumno</td>";
				}
		}
?>
	</tr>
<?php
		foreach ($matriz as $nAlumno => $vector) {
			echo "<tr>";
			foreach ($vector as $columna => $dato) {
				if ($columna == 'NotaIAW') {
					if (isset($_POST["iaw"])==true) {
						echo "<td>$dato</td>";
					}
				}
				elseif ($columna == 'NotaSAD') {
					if (isset($_POST["sad"])==true) {
						echo "<td>$dato</td>";
					}
				}
				else {
					echo "<td>$dato</td>";
				}
			}
			echo "</tr>";
		}

}
?>
</table>
</body>
</html>