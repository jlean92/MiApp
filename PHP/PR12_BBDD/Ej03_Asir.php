<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
if (isset($_POST['Enviar'])==false) {
?>
	<h2>Mostrar tabla</h2>
	<form method="POST" action="">
		<input type="checkbox" name="Tabla">
		<label>Muestra la tabla</label><br>
		<input type="checkbox" name="alumnos">
		<label>Muestra la tabla y la media por alumno</label><br>
		<input type="checkbox" name="modulo">
		<label>Muestra la tabla y la media por modulo</label><br>
		<input type="submit" name="Enviar" value="Mostrar">
		<input type="reset" name="limpiar" value="Limpiar">
	</form>
<?php
}

else{
		require("conexion3.php");
		$conexion = new mysqli($servidor,$usuario,$password,$BaseDatos);
		if (!$conexion) {
			echo "Conexxion Erronea";
		}
		else{
			//echo "Usted ha conectado a la base de datos<br>";
		}
		
		echo "<table border=2>";

	if (isset($_POST['Tabla'])) {
		$SQL = "SELECT * FROM ALUMNOS";
		$resultado = $conexion -> query($SQL);
		if (!$resultado) {
			echo "$SQL , Ha dado error.";
		}
		else{
		echo "Mostrar todos los datos de los alumnos<br>";
		
		$contador = 0;
			echo "<tr>";
			foreach ($resultado as $key => $fila) {
				foreach ($fila as $key => $value) {
					if ($contador == 0) {
						echo "<th>$key</th>";
					}
				}
				$contador++;
			}
			if (isset($_POST['alumnos'])) {
				echo "<th>Media Alumnos </th>";
			}
			echo "</tr>";
			foreach ($resultado as $key => $fila) {
				echo "<tr>";
				$nota=0;
				$contador=0;
				foreach ($fila as $key => $value) {
					echo "<td>$value</td>";
					if (isset($_POST['alumnos'])) {
						if (is_numeric($value)) {
							$nota = $nota + $value;
							$contador++;
						}
					}
				}
				if (isset($_POST['alumnos'])) {
					$media = $nota / $contador;
					echo "<td>$media</td>";
				}

				echo "</tr>";
			}
		
		}

	}
	
	if (isset($_POST['modulo'])) {
		echo "Mostrar media Modulo<br>";
		echo "<tr>";
		foreach ($resultado as $key => $fila) {
			foreach ($fila as $key => $value) {
				if (is_numeric($value)) {
					$nota = $nota + $value;
					$contador++;
				}
			}
		}

		echo "</tr>";

	}
	echo "</table>";
}
?>
</body>
</html>