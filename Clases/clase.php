<?php
// confirmar sesion
session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.html');
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt;>
    <title>Clases</title>
    <style type="text/css">
    	body {
        }
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
        div {
            display: inline-block;
        }
        .content {
            display: block;
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
<div class="CasiBody">
	<header >
        <center><span id="Titulo">Bienvenido <?php echo $_SESSION['FirstName']; ?> a su aplicacion de vida</span></center>
        <span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span>
    </header>
    <center>
	<div class="picture"><a href="Horario.php"><img src="images/Horario.ico" width="250px" height="250px"><br/>Horario</a></div>
    <div class="picture "><a href="Asignaturas.php"><img src="images/Asignaturas.ico" width="250px" height="250px"><br/>Asignaturas</a></div>
    <div class="picture"><a href="examenes.php" target="_blank"><img src="images/examenes.ico" width="250px" height="250px"><br/>Examenes</a></div>
    <div class="picture"><a href="Tareas/tareas.php"><img src="images/tareas.ico" width="250px" height="250px"><br/>Tareas</a></div>
    <div class="picture"><a href="Resultados/resultado.php"><img src="images/Resultados.png" width="250px" height="250px"><br/>Resultados</a></div>
    <br/><br/>
    <article>
            <button onclick = "window.location.href='../inicio.php';">Inicio</button>
        </article>
    </center>
</div>
</body>
</html>