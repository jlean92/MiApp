<?php
// confirmar sesion
session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.html');
        exit;
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
	<title>Horario</title>
	<style type="text/css">
		
        h2 {
            text-align: center;
        }
        header {
            position: relative;
            background-color: #849cea;
            padding: 1%;
        }
        #Titulo {
            font-size: 120%;
        }
        table {
        	margin-top: 5%;
        	margin-bottom:5%;
        	background-color: white;
        	text-align: center;
        }
        a {
            color: black;
            text-decoration: none;
        }
        .Button {
            font-size: 10px;
        }
	</style>
</head>
<body>
	<div>
	<header >
        <center><span id="Titulo">Bienvenido <?php echo $_SESSION['FirstName']; ?> a su aplicacion de vida</span></center>
        <span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span>
    </header>
	
	<center>
		<table border="1">
			<tr>
				<th>Horario</th>
				<th>Lunes</th>
				<th>Martes</th>
				<th>Miercoles</th>
				<th>Jueves</th>
				<th>Viernes</th>
			</tr>
			<tr>
				<th>15:00-15:55</th>
				<td rowspan="3" bgcolor="#f5b0b0">Sistemas</td>
				<td rowspan="2" bgcolor="#f2f1b8">Servicios en red</td>
				<td bgcolor="#97a1f7">Bases de datos</td>
				<td bgcolor="#f5b0b0">Sistemas</td>
				<td rowspan="3" bgcolor="#f2f1b8"> Servicios en red</td>
			</tr>
			<tr>
				<th>15:55-16:50</th>
				<td bgcolor="#9262d1">Seguridad</td>
				<td rowspan="2" bgcolor="#aff797">Implantacion Web</td>
			</tr>
			<tr>
				<th>16:50-17:45</th>
				<td bgcolor="#faae57">Empresa</td>
				<td bgcolor="#f2f1b8">Servicios en Red</td>
			</tr>
			<tr>
				<th>17:45-18:15</th>
				<td bgcolor="#abadaa" colspan="5">Recreo</td>
			</tr>
			<tr>
				<th>18:15-19:10</th>
				<td bgcolor="#aff797">Implantacion web</td>
				<td bgcolor="#e35f5f">Ingles</td>
				<td bgcolor="#9262d1">Seguridad</td>
				<td bgcolor="#9262d1">Seguridad</td>
				<td bgcolor="#e35f5f">Ingles</td>
			</tr>
			<tr>
				<th>19:10-20:05</th>
				<td rowspan="2" bgcolor="#faae57">Empresa</td>
				<td rowspan="2" bgcolor="#9262d1">Seguridad</td>
				<td rowspan="2"  bgcolor="#aff797">Implantacion web</td>
				<td rowspan="2" bgcolor="#97a1f7">Bases de Datos</td>
				<td rowspan="2" bgcolor="#f5b0b0">Sistemas</td>
			</tr>
			<tr>
				<th>20:05-21:00</th>
			</tr>
		</table>	

		<article>
            <button onclick = "window.location.href='clase.php';">Clases</button>
            <button onclick = "window.location.href='../inicio.php';">Inicio</button>
        </article>
	</center>

	</div>
</body>
</html>