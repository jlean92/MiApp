<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
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
		<input type="radio" name="radio" value="Novela">
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
				$SQL = "Insert INTO libros ( $title , $author , $cantidad , $precio , $Opcion )";
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
				echo "<tr>";
				foreach ($resultado as $key => $fila) {
					foreach ($fila as $key => $value) {
						if ($contador == 0) {
							echo "<td>$key</td>";
						}
						$contador++;
					}
				}
				echo "</tr>";

				foreach ($resultado as $key => $fila) {
					echo "<tr>";
					foreach ($fila as $key => $value) {
						echo "$value";
					}
					echo "</tr>";
				}
			}
			if (isset($_POST['contar'])) {
				$SQL = "SELECT * FROM libros";
			}
		}
		?>
	</center>
</body>
</html>