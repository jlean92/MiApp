<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form>
		<label>Titulo :</label>
		<input type="text" name="title"><br>
		<label>Autor :</label>
		<input type="text" name="author"><br>
		<label>Cantidad ejemplares :</label>
		<input type="text" name="cantity"><br>
		<label>Precio ejemplar :</label>
		<input type="text" name="price"><br>
		<h2>Genero:</h2>
		<input type="radio" name="radio" value="novela">
		<label>Novela</label><br>
		<input type="radio" name="radio" value="cuento">
		<label>Cuento</label><br>
		<input type="radio" name="radio" value="poesia">
		<label>Poesia</label><br>
		<h2>OPERACIONES:</h2>
		<input type="checkbox" name="save">
		<label>Guardar datos en la base de datos</label><br>
		<input type="checkbox" name="save">
		<label>Mostrar libros del genero seleccionado junto con el precio Total</label><br>
		<input type="checkbox" name="save">
		<label>Cantidad de libros de cada genero junto con el promedio del precio total</label><br>

		<input type="submit" name="aceptar" value="Aceptar">
		<input type="reset" name="limpiar" value="Limpiar formulario">
	</form>
</body>
</html>