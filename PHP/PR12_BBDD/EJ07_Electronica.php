<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda Electronica</title>
</head>

<body>
	<center>
<?php
	if (!isset($_POST['boton'])) {
		// code...
	
?>
	<h2>Mostrar Ordenadores</h2>
	<form method="POST" action="">
		<label>Marca</label>
		<input type="text" name="marca"><br>
		<input type="radio" name="radio" value="1" checked>
		<label>Toda la tabla</label><br>
		<input type="radio" name="radio" value="2">
		<label>Toda la tabla mas media</label><br>
		<input type="submit" name="boton" value="Enviar">
	</form>

<?php
	}
	else{
		REQUIRE("conexion6.php");
		$conexion = new mysqli($servidor,$usuario,$password,$BaseDatos);
		if (!$conexion) {
			echo "No hay conexion<br>";
		}
		else{
			//echo "Se ha realizado la conexion<br>";
		}
		$SQL = "SELECT * FROM ORDENADORES";
		$resultado = $conexion -> query($SQL);
		if (!$resultado) {
			echo "No hay resultado<br>";
		}
		else{
			//echo "Se ha realizado la consulta y hay resultado<br>";
		}
		$radio = $_POST['radio'];
		$marca = $_POST['marca'];
		$contador = 0;
		if ($radio == 1) {
		echo "<h2>Listado de Ordenadores</h2>";
			echo "<table border=2>";
			echo "<tr>";
			foreach ($resultado as $key => $fila) {
				foreach ($fila as $columna => $value) {
					if ($contador == 0) {
						echo "<th>$columna</th>";
					}
				}
				$contador++;
			}
			$contador=0;
			$Buscar = 0;
			echo "</tr>";
			foreach ($resultado as $key => $fila) {
				echo "<tr>";
				if (strcmp($marca, $fila['Marca'])==0) {
					foreach ($fila as $columna => $value) {
						echo "<td>$value</td>";
						$Buscar = $Buscar +1;
					}
					
				}
				$contador++;
				echo "</tr>";
			}
			echo "</table>";
		echo "Hay $Buscar ordenadores de la Marca $marca de un total de $contador Ordenadores";
		}
		elseif ($radio == 2) {
			echo "<h2>Listado de Ordenadores</h2>";
			echo "<table border=2>";
			echo "<tr>";
			foreach ($resultado as $key => $fila) {
				foreach ($fila as $columna => $value) {
					if ($contador == 0) {
						echo "<th>$columna</th>";
					}
				}
				$contador++;
			}
			$contador=0;
			$mediaPrecio = 0;
			$mediaPVP = 0;
			echo "</tr>";
			foreach ($resultado as $key => $fila) {
				echo "<tr>";
				$mediaPrecio =$mediaPrecio + $fila['PrecioCompra'];
				$mediaPVP =$mediaPVP + $fila['PVP'];
				foreach ($fila as $columna => $value) {
					echo "<td>$value</td>";
				}
				$contador++;
				echo "</tr>";
			}
			$mediaPrecio = $mediaPrecio/$contador;
			$mediaPVP = $mediaPVP/$contador;
			echo "<tr>";
					echo "<td colspan=2>Media de precio</td>";
					echo "<td>$mediaPrecio</td>";
					echo "<td>$mediaPVP</td>";
				echo "<tr>";
			echo "</table>";
		}
			
	}
?>
</center>
</body>
</html>