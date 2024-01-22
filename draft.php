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
    <!-- <link rel="stylesheet" href="style.css"> -->
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
        section {
            text-align: center;
        }
        

        div {
            display: inline-block;
        }
    
        #menu {
            
            margin-right: 8%;
            margin-left: 5%;
        }
        #logoff {
            font-size: 60%;
            float: right;
            margin-right:5% ;
        }
    </style>
</head>

<body class="loggedin">
<div class="CasiBody">
    <header ><span id="Titulo">Titulo el que quieras</span><span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span></header>
    
    <section>
    
    <a id="menu" href="inicio.php">Volver a Inicio</a>
    </section>
</div>
</body>

</html>