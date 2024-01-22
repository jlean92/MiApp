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
    $sql = "SELECT menu.DiaSemana,menu.Momento,menu.Tipo, platos.Plato FROM miapp.menu, miapp.platos WHERE menu.plato = platos.ID_Plato;";
    $result = $conn->query($sql);

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

        while($row = $result->fetch_assoc()) {
            if ($dia > ) {
            echo "<tr>
                    <td><font face='Arial'>" . $row["DiaSemana"] . "</font></td>
                    <td><font face='Arial'>" . $row["Momento"] . "</font></td>
                    <td><font face='Arial'>" . $row["Tipo"] . "</font></td>
                    <td><font face='Arial'>" . $row["Plato"] . "</font></td>
                  </tr>";
            }
        }
        echo "</table>";
    }

?>


    </section>
</div>
</body>

</html>