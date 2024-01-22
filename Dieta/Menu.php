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
            margin-top: 0%;
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
        
        article{
            margin-top: 2% ;
        }

        div {
            margin-top: 2%;
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
        .resaltado {
            background-color: #8cff66; /* Fondo verde */
        }
        .ahora {
            background-color: #FFE3AA; /* Fondo verde */
        }
    </style>
</head>

<body class="loggedin">
<div class="CasiBody">
    <header ><span id="Titulo">Menu Semanal</span><span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span></header>

    <section>
            <article >
            <button onclick = "window.location.href='Dieta.php';">Dieta</button>
            <button onclick = "window.location.href='../inicio.php';">Inicio</button>
        </article>
    

    <div>
    <?php
    // Conexión a la base de datos
    $DATABASE_HOST = '127.0.0.1';
    $DATABASE_USER = 'App';
    $DATABASE_PASS = 'Jlean92@yo';
    $DATABASE_NAME = 'miapp';

    $conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Realizar la consulta
    $sql = "SELECT Menu.DiaSemana , Menu.Momento, Menu.Tipo, Platos.Plato  FROM Menu, Platos WHERE Menu.Plato = Platos.ID_Plato";
    $result = $conn->query($sql);

    $dia=date("l");

    switch ($dia) {
        case 'Monday':
            $dia = "1";
            break;
        case 'Tuesday':
            $dia = "2";
            break;
        case 'Wednesday':
            $dia = "3";
            break;
        case 'Thursday':
            $dia = "4";
            break;
        case 'Friday':
            $dia = "5";
            break;
        case 'Sunday':
            $dia = "6";
            break;
        case 'Saturday':
            $dia = "7";
            break;
    }
    date_default_timezone_set('Europe/Madrid');
    $horaActual = date("H:i");
    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Imprimir los datos en la tabla
        echo "<table  border=1 cellspacing=2 cellpadding=2>
                <tr>
                    <th><font face='Arial'>Día</font></th>
                    <th><font face='Arial'>Momento</font></th>
                    <th><font face='Arial'>Tipo</font></th>
                    <th><font face='Arial'>Plato</font></th>
                </tr>";
        $resaltado = "resaltado";

        while($row = $result->fetch_assoc()) {
            
            $DiaSemana=$row["DiaSemana"];
            switch ($row["DiaSemana"]) {
                case 'Lunes':
                    $diaSemana = "1";
                    break;
                case 'Martes':
                    $diaSemana = "2";
                    break;
                case 'Miercoles':
                    $diaSemana = "3";
                    break;
                case 'Jueves':
                    $diaSemana = "4";
                    break;
                case 'Viernes':
                    $diaSemana = "5";
                    break;
                case 'Sabado':
                    $diaSemana = "6";
                    break;
                case 'Domingo':
                    $diaSemana = "7";
                    break;
    }
      

            if($diaSemana == $dia && $horaActual > "08:30"&& $horaActual < "14:30" && $row['Momento'] == "Comida"){
                 $resaltado = "ahora";  
            }
            elseif ($diaSemana == $dia && $horaActual > "14:30" && $horaActual < "23:30" && $row['Momento'] == "Cena") {
                $resaltado = "ahora"; 
            }
            elseif ($diaSemana == $dia && $horaActual > "23:30" && $row['Momento'] == "Comida") {
                $resaltado = "ahora";
            }


            echo "<tr class=".$resaltado.">
                    <td><font face='Arial'>" . $row["DiaSemana"] . "</font></td>
                    <td><font face='Arial'>" . $row["Momento"] . "</font></td>
                    <td><font face='Arial'>" . $row["Tipo"] . "</font></td>
                    <td><font face='Arial'>" . $row["Plato"] . "</font></td>
                  </tr>";
            if (strcmp($resaltado, "ahora")==0) {
                $resaltado = "Nada";
            }
        }

        echo "</table>";
    }

    // Cerrar conexión
    
    ?>
<br>
<form method="POST" action="rehacermenu.php">
    <input type="submit" name="Boton" value="Rehacer Menu">
</form>

    </section>
</div>
</body>

</html>