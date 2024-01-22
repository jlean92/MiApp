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
    	body {background-color: black;}

    	.CasiBody {width: 70%; background-color: white; margin-left: 10%; padding-bottom: 10%;}

    	header { background-color: #849cea ; text-align: center; align-items: center;}

        #Titulo {font-size: 150%; margin-left: 10%;}

    	section {text-align: center;margin-top: 5%;}

        section div {margin-right: 2%; margin-left: 2%;margin-bottom:2%; }

    	h1 {text-align: center;}

        div {display: inline-block;
        }
        .content {display: block;}

        .picture {background-color: #F9F9F9;  border: 1px solid #CCCCCC; padding: 3px; font: 11px/1.4em Arial, sans-serif;}

        img {border: 1px solid #CCCCCC; vertical-align:middle; margin-bottom: 3px;}

        #menu { margin-right: 8%; margin-left: 5%;}
        
        #logoff {font-size: 60%; float: right;margin-right:5% ; margin-top: 0.5%;}

    </style>
</head>
<body>
<div class="CasiBody">
	<header>
		<span id="Titulo">Toda la informacion sobre sus clases</span><span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span>
	</header>
	<section>
	<div class="picture"><a href="Menu.php"><img src="images/Menu.ico" width="150px" height="150px"></a><br/>Menu</div>
    <div class="picture"><a href="MenuHoy.php"><img src="images/Menu.ico" width="150px" height="150px"></a><br/>Hoy</div>
    <div class="picture "><a href="ListaCompra.php"><img src="images/ListaCompra.ico" width="150px" height="150px"></a><br/>Lista de la Compra</div>
    <br/><br/>
    <br/><br/>
    <article>
            <button onclick = "window.location.href='../inicio.php';">Inicio</button>
        </article>
    </section>
</div>
</body>
</html>