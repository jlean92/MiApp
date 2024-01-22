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
		<label>DNI</label>
		<input type="text" name="DNI"><br>
		<label>NOMBRE</label>
		<input type="text" name="Nombre"><br>
		<label>Apellidos</label>
		<input type="Apellido" name="Apellido"><br>
		<input type="submit" name="Crear" value="Crear">
		<input type="submit" name="Eliminar" value="Eliminar">
		<input type="submit" name="Mostrar" value="Mostrar tabla">
	</form>
	<?php
	


	if (isset($_POST["Crear"])||isset($_POST["Eliminar"])||isset($_POST["Mostrar"])) {
		REQUIRE('conexion2.php');
		$conexion = new mysqli($servidor, $usuario, $password,$BaseDatos);
		$DNI=$_POST['DNI'];
		$Nombre=$_POST['Nombre'];
		$Apellidos=$_POST['Apellido'];
	
		if (isset($_POST["Crear"])){
			echo "Vamos a crear el registro en la tabla";
			//1. Conectar con la base de datos
			$SQL = "INSERT INTO alumnos (DNI, Nombre, Apellidos) VALUES ('$DNI','$Nombre','$Apellidos')";
			echo "<br>$SQL";
			//2. Ejecutar la consulta
			$valor = $conexion -> query($SQL);
			
			if ($valor == true) {
				echo "<br>Se han insertado los datos correctamente";
			}
			else{
				echo "<br>Se ha producido un error los datos no se han insertado";
			}
		}
	
		if (isset($_POST["Eliminar"])){
			echo "Vamos a eliminar por dni el registro";
			$SQL = "DELETE FROM alumnos where dni='$DNI'";
			echo "<br>$SQL";
			//2. Ejecutar la consulta
			$valor = $conexion -> query($SQL);
			
			if ($valor == true) {
				echo "<br>Se han borrado los datos correctamente";
			}
			else{
				echo "<br>Se ha producido un error los datos no se han insertado";
			}
		}
		if (isset($_POST["Mostrar"])) {
	
			echo "Mostrar la tabla";
			$SQL = "SELECT * FROM alumnos";
			//2. Ejecutar la consulta
			$resultado = $conexion -> query($SQL);
			echo "<table border=2>";
			foreach ($resultado as $key => $fila) {
				echo "<tr>";
				foreach ($fila as $key => $value) {
					echo "<td>$value</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}
	}


	?>
</body>
</html>