<?php
// confirmar sesion
session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
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
        .Enlaces {
            color: black;
            text-decoration: none;
        }
        .Button {
            font-size: 10px;
        }        
    </style>
</head>
<body class="loggedin">
    
    <header >
        <center><span id="Titulo">Bienvenido <?php echo $_SESSION['FirstName']; ?> a su aplicacion de vida</span></center>
        <span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span></header>
    <center>

    <div class="content">
        <h2>Página de Inicio</h2>
    </div>
    
    <div class="picture"><a class="Enlaces" href="Clases/clase.php"><img src="images/libros.ico" width="250px" height="250px"><br/>Clases</a></div>
    <div class="picture"><a class="Enlaces" href="InProgress.html"><img src="images/ejercicio.ico" width="250px" height="250px"><br/>Ejercicio</div>
    <div class="picture"><a class="Enlaces" href="InProgress.html"><img src="images/Limpieza.ico" wicdth="250px" height="250px"><br/>Tareas</a></div>
    <div class="picture"><a class="Enlaces" href="Dieta/Dieta.php"><img src="images/comida.ico" width="250px" height="250px"><br/>Dieta</a></div>
    <div class="picture"><a class="Enlaces" href="InProgress.html"><img src="images/trabajo.ico" width="250px" height="250px"><br/>Trabajo</a></div>
    <br/><br/>
    <button id="menu" onclick = "window.location.href='cerrar-sesion.php';">Volver a Inicio</button>
</center>

</body>

</html>