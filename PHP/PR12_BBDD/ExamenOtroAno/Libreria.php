<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body style="background-color:#FFF000;">
	<center>
		<?php
			if (!isset($_POST['aceptar'])) {
				
			
		?>
	<form method="POST" action="">
		<h2>LIBRERIA - JORGE LEÓN</h2>
		<label>Titulo :</label>
		<input type="text" name="title"><br>
		<label>Autor :</label>
		<input type="text" name="author"><br>
		<label>Cantidad ejemplares :</label>
		<input type="text" name="cantity"><br>
		<label>Precio ejemplar :</label>
		<input type="text" name="price"><br>
		<h2>Genero:</h2>
		<input type="radio" name="radio" value="Novela" checked>
		<label>Novela</label><br>
		<input type="radio" name="radio" value="Cuento">
		<label>Cuento</label><br>
		<input type="radio" name="radio" value="Poesia">
		<label>Poesia</label><br>
		<h2>OPERACIONES:</h2>
		<input type="checkbox" name="save">
		<label>Guardar datos en la base de datos</label><br>
		<input type="checkbox" name="mostrar">
		<label>Mostrar libros del genero seleccionado junto con el precio Total</label><br>
		<input type="checkbox" name="contar">
		<label>Cantidad de libros de cada genero junto con el promedio del precio total</label><br>

		<input type="submit" name="aceptar" value="Aceptar">
		<input type="reset" name="limpiar" value="Limpiar formulario">
	</form>
	
		<?php
		}
		else{
			$Opcion = $_POST['radio'];
			$title = $_POST['title'];
			$author = $_POST['author'];
			$cantidad = $_POST['cantity'];
			$price = $_POST['price'];


			require("Conexion.php");
			$conexion = new mysqli($Servidor.":".$Puerto, $Usuario, $Contraseña, $BaseDeDatos);

			if (isset($_POST['save'])) {
				$SQL = "Insert INTO libros VALUES ( '$title' , '$author' , $cantidad , $price , '$Opcion' )";
				$resultado = $conexion -> query($SQL);
				if ($resultado) {
					echo "Se ha insertado correctamente";
				}else{
					echo "No se ha insertado correctamente.";
				}
			}
			if (isset($_POST['mostrar'])) {
				$SQL = "SELECT * FROM libros";
				$resultado = $conexion -> query($SQL);
				$contador = 0;
				echo "<h2>LIBRERIA - JORGE LEÓN</h2>";
				echo "<table border style='text-align: center;'";
				echo "<tr>";
				foreach ($resultado as $key => $fila) {
					if ($contador == 0) {
					foreach ($fila as $key => $value) {
							echo "<th>$key</th>";
						}
						echo "<th>Precio Total</th>";
						$contador++;
					}
				}
				echo "</tr>";

				foreach ($resultado as $key => $fila) {
					if (strcmp($fila['Genero'],"$Opcion") == 0) {					
					echo "<tr>";
					foreach ($fila as $key => $value) {
						echo "<td>$value</td>";
					}
					$media = $fila['Cantidad'] * $fila['Precio'];
					echo "<td>$media</td>";
					echo "</tr>";
					}
				}

				echo "</table>";
			}
			if (isset($_POST['contar'])) {
				$SQL = "SELECT * FROM libros";
				$resultado = $conexion -> query($SQL);
				$contadorNovela = 0;
				$promedioNovela = 0;
				$contadorPoesia = 0;
				$promedioPoesia = 0;
				$contadorCuento = 0;
				$promedioCuento = 0;
				foreach ($resultado as $key => $fila) {	
					if (strcmp($fila['Genero'],"Novela") == 0) {
						$contadorNovela++;
						$total = $fila['Cantidad'] * $fila['Precio'];
						$promedioNovela = $promedioNovela + $total;
					}
					if (strcmp($fila['Genero'],"Poesia") == 0) {
						$contadorPoesia++;
						$total = $fila['Cantidad'] * $fila['Precio'];
						$promedioPoesia = $promedioPoesia + $total;
					}
					if (strcmp($fila['Genero'],"Cuento") == 0) {
						$contadorCuento++;
						$total = $fila['Cantidad'] * $fila['Precio'];
						$promedioCuento = $promedioCuento + $total;
					}

				}
				
					$mediaNovela = $promedioNovela / $contadorNovela;
					
					$mediaCuento = $promedioCuento / $contadorCuento;
					
					$mediaPoesia = $promedioPoesia / $contadorPoesia;
			
			
			?>
			<h2>LIBROS POR GENERO</h2>
				<table border="2" style="text-align: center;">
					<tr>
						<th>Genero</th>
						<th>Unidades</th>
						<th>Promedio Precio Total</th>
					</tr>
					<tr>
						<td>Novela</td>
						<td><?php echo "$contadorNovela"; ?></td>
						<td><?php echo "$mediaNovela"; ?></td>
					</tr>
					<tr>
						<td>Poesía</td>
						<td><?php echo "$contadorPoesia"; ?></td>
						<td><?php echo "$mediaCuento"; ?></td>
					</tr>
					<tr>
						<td>Cuento</td>
						<td><?php echo "$contadorCuento"; ?></td>
						<td><?php echo "$mediaPoesia"; ?></td>
					</tr>
				</table>
				<?php
			}

		}
		?>
	</center>
</body>
</html>