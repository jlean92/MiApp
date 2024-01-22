<html>

<head>
    <meta charset="UTF-8">
    <title>Asignaturas</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style type="text/css">
        body {background-color: black;}
        .CasiBody {
            background-color: white;
            margin-left: 13%;
            width: 70%;
            padding-bottom: 8%;
        }
        header {
            background-color: #849cea ;
            text-align: center;
            align-items: center;
        }
        #user {
            font-style: italic;
            font-weight: 700
        }
        #Titulo {
            font-size: 150%;
            margin-left: 10%;
        }
        section {text-align: center;}
        #logoff {
            display: inline-block;
            font-size: 60%;
            float: right;
            margin-right:5% ;
        }
        table{
            display: inline-block;
            text-align: center;
        }
        form {
            margin-top: 5% ;
        }
        label{
            margin-right: %;
        }
        article{
            margin-top: 5% ;
        }
    </style>
</head>

<body>
    <div class="casiBody">
<header>
        <span id="Titulo">Resultados para la asignatura
<?php
    $DATABASE_HOST = '192.168.1.15';
    $DATABASE_USER = 'App';
    $DATABASE_PASS = 'Jlean92@yo';
    $DATABASE_NAME = 'miapp';
    
    $mysqli = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    $Name =$_REQUEST['AsigId'];
    $query = "SELECT AsigID, nombre FROM asignaturas WHERE asignaturas.asigID = $Name";
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {

            $AsigID = $row["AsigID"];
            $nombre = $row["nombre"];
                
           
                        echo '<span id="user">'.$nombre.'</span>';
                    
           
        
?>

</span> <span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span>
    </header>

    <section>
        <article>
            <button onclick = "window.location.href='../clase.php';">Clases</button>
            <button onclick = "window.location.href='../../inicio.php';">Inicio</button>
            <button onclick = "window.location.href='resultado.php';">Otra Asignatura</button>
        </article>

<div>
    <table border="1" cellspacing="2" cellpadding="2"> 
          <tr>
            <td> <font face="Arial">Tipo</font> </td>  
              <td> <font face="Arial">Descripcion</font> </td> 
              <td> <font face="Arial">Fecha</font> </td> 
              <td> <font face="Arial">Hecho</font> </td> 
              <td> <font face="Arial">Nota</font> </td> 
            </tr>
<?php
        echo "<h2>$nombre</h2>" ;
    }
        $result->free();
    }

    $query = "SELECT examenes.ExamenID, examenes.Descripcion,examenes.fecha,examenes.Hecho,examenes.Nota,examenes.Mostrar FROM examenes WHERE examenes.asigID = $Name";
    
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {

            $Descripcion = $row["Descripcion"];
            $fecha = $row["fecha"];
            $Hecho = $row["Hecho"];
            $Nota = $row["Nota"]; 
            $Mostrar = $row["Mostrar"]; 
            $asigId = $row["ExamenID"]; 
            if ($nota) {
            }else{
                $nota = "Sin Nota";
            }
            if ($Hecho == 1) {
                $resultado= "Hecho";
            }else{
                $resultado= "Pendiente";

            }
            
            echo '<tr> 
                <td>Examen</td> 
                <td>'.$Descripcion.'</td> 
                <td>'.$fecha.'</td> 
                <td>'.$resultado.'</td> 
                <td>'.$Nota.'</td> 
                </tr>';
                
                
            }
        
        $result->free();
    }
?>

<?php 

    $query = "SELECT tareas.tareasID, tareas.Descripcion,tareas.fecha,tareas.Hecho,tareas.Nota,tareas.Mostrar,asignaturas.nombre,asignaturas.asigId  FROM tareas, asignaturas WHERE tareas.asigID = asignaturas.asigID and asignaturas.asigID = $Name";
    
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {

            $Descripcion = $row["Descripcion"];
            $fecha = $row["fecha"];
            $Hecho = $row["Hecho"];
            $Nota = $row["Nota"]; 
            $Mostrar = $row["Mostrar"]; 
            $nombre = $row["nombre"]; 
            $asigId = $row["ExamenID"]; 
            
            
            if ($Nota) {}else{$Nota = "Sin Nota";}
            if ($Hecho == 1) {$resultado= "Hecho";}else{$resultado= "Pendiente";}
            
            echo '<tr> 
                <td>Tareas</td> 
                <td>'.$Descripcion.'</td> 
                <td>'.$fecha.'</td> 
                <td>'.$resultado.'</td> 
                <td>'.$Nota.'</td> 
                </tr>';
        }
        $result->free();
    }
?>


</table>


</div>


</div>
</section>
</body>
</html>