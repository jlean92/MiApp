<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
	//1. Crear Matriz Asociativa
/*		nombre 	apellido	notalAW		NotaSAD
al1		ana		 perez 		 	9			10
a12 	Sara	 Lopez			5			6
a13 
a14 

$matriz
	al1						al2						al3					al4
|ana 	perez	9	10 |sara 	lopez	5	6|Angel  Torres	6	6|Jorge 	Sistac	5	6

*/ 
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
	//2.visualizar el contenido de la matriz asociativa
	echo "<h2>Datos de la clase</h2>";
	
	foreach ($matriz as $nomAlumno => $vector) {
		echo "<br>$nomAlumno";
		foreach ($vector as $columna => $valor) {
			echo "<br>$columna = $valor";
		}
	}

	//2.5 visualizar el contenido de la matriz asociativa en tabla
	echo "<h2>Datos en tabla</h2>";
	?>

	<table border>
		<tr>
			<th>Alumno</th>
			<?php 
				foreach ($matriz['al1'] as $nombreColumna => $vector){
					echo "<th>$nombreColumna</th>";
				}

			?>
				
			
		</tr>
		
			<?php 
				foreach ($matriz as $nomAlumno => $vector) {
					echo "<tr>";
					echo "<td>$nomAlumno</td>";
					
					foreach ($vector as $columna => $valor) {
						echo "<td>$valor</td>";
					}
					echo "</tr>";
				}

			?>
<table>

<?php
	//3. Visualizar la media de las notas por alumno

	echo "<h2>Media De los alumnos</h2>";
	
	foreach ($matriz as $nomAlumno => $vector) {
		echo "<br>$nomAlumno: ";
		$suma = 0;
		foreach ($vector as $columna => $valor) {
			
			if ($columna== "NotaIAW" || $columna== "NotaSAD") {
				$suma = $suma + $valor;
			}
			else{
				echo "$valor ";	
			}
		}
		echo "tiene de media = ".($suma/2); 	 
		$suma = 0;
	}

	//4. sumar las columnas
?>
</body>
</html>