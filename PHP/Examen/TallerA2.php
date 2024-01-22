<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color:#FF0000">
	<?php
		if (isset($_POST['aceptar'])==false) {
		?>
			<center>
			<h1>INSCRIPCION A LOS GRADOS DE ESPECIALIZACION</h1>
			<h1>COLEGIO MONTESSORI ALEJANDRO YAGÜE</h1>
			<form method="POST" action="">
				<table border="1">
					<tr>
						<td>
							<label>Nombre completo (Nombre Apellido):</label>
							<input type="text" name="nombre" placeholder="nombre apellido"><br>
							<label>Edad:</label>
							<input type="number" name="edad" min="18" max="60"><br>
							<label>Nota fin de grado:</label>
							<input type="number" name="nota" min="1" max="10">
						</td>
					</tr>
					<tr>
						<td>
							<label>Grado</label><br>
							<input type="radio" name="grado" value="1" checked="">
							<label>ASIR</label><br>
							<input type="radio" name="grado" value="2">
							<label>DAM</label><br>
						</td>
					</tr>
					<tr>
						<td>
							<label>ELEGIR ESPECIALIZACION</label><br>
							<input type="checkbox" name="ciber">
							<label>Ciberseguridad</label><br>
							<input type="checkbox" name="int">
							<label>Inteligencia Artificial</label><br>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="aceptar" value="aceptar">
							<input type="reset" name="borrar" value="Borrar">
						</td>
					</tr>
				</table>
			</form>
	
	<?php		
		}else{
	?>
			<h1>Colegio Montessori</h1><br><br>
	<?php
			$completo=$_POST['nombre'];
			$espacio=strpos($completo, " ");
			$nombre=substr($completo,0,$espacio);
			$apellido=substr($completo, $espacio+1);
			$nota=$_POST['nota'];
			$edad=$_POST['edad'];
			$long=strlen($apellido);
			if (isset($_POST['ciber'])) {
				echo "<h1>DATOS DE LA MATRICULA DEL CURSO DE CIBERSEGURIDAD</h1><br>";
				echo "Nombre: $nombre<br>";
				echo "Apellido: $apellido<br>";
				$mail=$nombre . $apellido . "@fundacionmontessori.com<br>";
				echo "Mail: $mail";

				if ($_POST['grado']==1) {
					$beca=1;
					for ($i=$nota; $i>=1; $i--) { 
						$beca=$beca*$i;
					}
					echo "Beca: $beca";
				}else{
					$beca=0;
					for ($i=1; $i<=10 ; $i++) { 
						$tabla=$i*$nota;
						$beca=$beca+$tabla;
					}
					echo "Beca: $beca";
				}
			}
			if (isset($_POST['int'])) {
				echo "<H1>DATOS DE LA MATRICULA DEL CURSO DE INTELIGENCIA ARTIFICIAL</H1><BR>";
				echo "Nombre: $nombre<br>";
				echo "Apellido: $apellido<br>";
				$mail="";
				for ($i=$long; $i>=0 ; $i--) { 
					$mail=$mail . substr($apellido, $i, 1);
				}
				$mail=$mail . "@fundacionmontessori.com";
				echo "Mail: $mail<br>";
				if ($_POST['grado']==1) {
					$beca=0;
					$min=min($nota, $edad); 
					$max=max($nota, $edad); 
					for ($i=$min; $i<=$max; $i++) { 
						if ($i%2==0) {
							$beca=$beca+$i;
						}
					}
					echo "Beca: $beca";
				}else{
					$beca=0;
					/*
                          $nota=5; 
						  5*2=10
						  5*4=20
						  5*6=30

						  $suma=10+20+30+...

					*/
					for ($i=1; $i <=10 ; $i++) { 
						if ($i%2==0) {
							$resultado=$i*$nota;
							$beca=$beca+$resultado;
						}
					}
					echo "Beca: $beca";
				}
			}

		}
	?>
</body>
</html>