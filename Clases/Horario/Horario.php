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
		body {
            background-color: black;
        }
        .CasiBody {
            background-color: white;
            display: block;
            margin-left: 10%;
            width: 70%;
            padding-bottom: 8%;
        }
        header {
            
            background-color: #849cea ;
            text-align: center;
            align-items: center;
            
        }

        #Titulo {
            font-size: 150%;
            margin-left: 10%;
        }
        #logoff {
            font-size: 60%;
            float: right;
            margin-right:5% ;
        }
        section {

            text-align: center;
        }
        table{
        	margin-top: 3% ;
        	display: inline-block;
        }
        article {
        	margin-top: 3%;
        }
	</style>
</head>
<body>
	<div class="CasiBody">
    	<header ><span id="Titulo">Horario</span><span><button class="Button" id="logoff" onclick = "window.location.href='../../cerrar-sesion.php';">Cerrar Sesion</button></span></header>
	
	<section>
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
            <button onclick = "window.location.href='../clase.php';">Clases</button>
            <button onclick = "window.location.href='../../inicio.php';">Inicio</button>
        </article>
	</section>

	</div>
</body>
</html>