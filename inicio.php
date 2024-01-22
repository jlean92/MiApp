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
    <title>Inicio</title>
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
        h2 {
            text-align: center;
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

        #user {
            font-style: italic;
            font-weight: 700
        }
        section {
            text-align: center;
        }
        section a {
            margin: 11px;
        }
        div {
            display: inline-block;
        }
        .content {
            display: block;
        }
        .picture {
            background-color: #F9F9F9;
            border: 1px solid #CCCCCC; padding: 3px;
            font: 11px/1.4em Arial, sans-serif;
        }
        img {
            border: 1px solid #CCCCCC;
            vertical-align:middle;
            margin-bottom: 3px;
        }
        #menu {
            margin-right: 8%;
            margin-left: 5%;
        }
        #logoff {
            font-size: 60%;
            float: right;
            margin-right:5% ;
            align-self: center;
        }
    </style>
</head>

<body class="loggedin">
<div class="CasiBody">
    <header ><span id="Titulo">Bienvenido  <span id="user"><?= $_SESSION['FirstName'] ?></span> a su aplicacion de vida</span><span><a class="Button" id="logoff" href="cerrar-sesion.php"> cerrar sesion</a></span></header>
    <nav class="navtop">
        
    </nav>

    <div class="content">
        <h2>Página de Inicio</h2>
    </div>
    <section>
    <div class="picture"><a href="/Clases/clase.php"><img src="images/libros.ico" width="150px" height="150px"></a><br/>Clases</div>
    <div class="picture"><a href="InProgress.html" ><img src="images/ejercicio.ico" width="150px" height="150px"></a><br/>Ejercicio</div>
    <div class="picture"><a href="InProgress.html" ><img src="images/Limpieza.ico" wicdth="150px" height="150px"></a><br/>Tareas</div>
    <br><br>
    <div class="picture"><a href="Dieta/Dieta.php" ><img src="images/comida.ico" width="150px" height="150px"></a><br/>Dieta</div>
    <div class="picture"><a href="InProgress.html" ><img src="images/trabajo.ico" width="150px" height="150px"></a><br/>Trabajo</div>
    <br/><br/>
    <a id="menu" href="inicio.php">Volver a Inicio</a>
    </section>
</div>
</body>

</html>