<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>	</title>
</head>
<body>
<?php
if (!isset($_POST['Enviar'])) {
?>
<h2>Que nota quieres saber</h2>
<form method="POST" action="">
	<input type="radio" name="Min" value="IAW" checked>
	<label>Nota mas alta en IAW</label><br>
	<input type="radio" name="Min" value="SAD">
	<label>Nota mas alta en SAD</label><br>
	<input type="submit" name="Enviar" value="Enviar">
</form>

<?php
}
else{
	REQUIRE('conexion5.php');
	$conexion = new mysqli($servidor.":".$puerto, $usuario, $password,$BaseDatos);
	$SQL= "SELECT * FROM alumnos";
	$resultado = $conexion -> query($SQL);
	$AlumnoMaxIAW="";
	$NotaMaxIAW=0;
	$AlumnoMaxSAD="";
	$NotaMaxSAD=0;
	$opcion=$_POST['Min'];
	foreach ($resultado as $key => $fila) {
			if ($NotaMaxIAW < $fila['NotaIAW']){
				$NotaMaxIAW = $fila['NotaIAW'];
				$AlumnoMaxIAW = $fila['Nombre']." ".$fila['Apellido'];
			}
			if ($NotaMaxSAD < $fila['NotaSAD']){
				$NotaMaxSAD = $fila['NotaSAD'];
				$AlumnoMaxSAD = $fila['Nombre']." ".$fila['Apellido'];
			}
		}
	if ($opcion=="IAW") {
		
		echo "El alumno con la nota mas alta es $AlumnoMaxIAW con la nota $NotaMaxIAW<br>";
	}
	elseif ($opcion=="SAD") {
		echo "El alumno con la nota mas alta es $AlumnoMaxSAD con la nota $NotaMaxSAD<br>";
	}
	else {
		echo "Me has roto la pagina";
	}
}
?>
</body>
</html>