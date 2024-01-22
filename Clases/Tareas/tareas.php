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
    </style>
</head>

<body class="loggedin">
<div class="CasiBody">
    <header ><span id="Titulo">Tareas del grado</span><span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span></header>

    <section>
            <article >
            <button onclick = "window.location.href='../clase.php';">Clases</button>
            <button onclick = "window.location.href='../../inicio.php';">Inicio</button>
        </article>
    

    <div>
    <form action="InsertTarea.php" method="post">
            <label>Asignatura:</label><select name="AsigId">
            <option value="0">--Please choose an option--</option>
<?php 
    $DATABASE_HOST = '192.168.1.15';
    $DATABASE_USER = 'App';
    $DATABASE_PASS = 'Jlean92@yo';
    $DATABASE_NAME = 'miapp';
    
    $mysqli = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); 
    $query = "SELECT Nombre,AsigId  FROM asignaturas ";
    
    echo '
        
    ';
    
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["Nombre"];
            $field5name = $row["AsigId"]; 
            echo '<option value="'.$field5name.'">'.$field1name.'</option>';
        }
        $result->free();
    } 

?>
</select><br/><br/>
            <label>Descripcion de la tarea:</label><input type="text" name="Tarea"><br/><br/>
            <label>Fecha a realizar:</label><input type="Date" name="Fecha"><br/><br/>
            <label>Nota</label><input type="number" name="Nota"><br/><br/>
            <button type="submit">Insertar asignatura</button><br/><br/>
        </form>
<table border="1" cellspacing="2" cellpadding="2"> 
          <tr> 
              <td> <font face="Arial">Descripcion</font> </td> 
              <td> <font face="Arial">Fecha</font> </td> 
              <td> <font face="Arial">Hecho</font> </td> 
              <td> <font face="Arial">Nota</font> </td> 
              <td> <font face="Arial">nombre</font></td>
              <td> <font face="Arial">Ocultar</font></td>
              <td><font face="Arial">Marcar Hecho</font></td>
              <td><font face="Arial">Modificar Nota</font></td>
            </tr>
<?php 
    $query = "SELECT tareas.TareasID, tareas.Descripcion,tareas.fecha,tareas.Hecho,tareas.Nota,tareas.Mostrar,asignaturas.nombre,asignaturas.asigId  FROM tareas, asignaturas WHERE tareas.asigID = asignaturas.asigID AND tareas.Mostrar = 1 Order BY tareas.fecha";
    
    echo '';
    
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {

            $Descripcion = $row["Descripcion"];
            $fecha = $row["fecha"];
            $Hecho = $row["Hecho"];
            $Nota = $row["Nota"]; 
            $Mostrar = $row["Mostrar"]; 
            $nombre = $row["nombre"]; 
            $asigId = $row["TareasID"]; 
            if ($Nota) {
            }else{
                $Nota = "Sin Nota";
            }
            if ($Hecho == 1) {
                $resultado= "Hecho";
            }else{
                $resultado= "Pendiente";
            }
            echo '<tr> 
               <td>'.$Descripcion.'</td> 
               <td>'.$fecha.'</td> 
               <td>Hecho</td> 
               <td>'.$Nota.'</td> 
               <td>'.$nombre.'</td>
               <td> 
                 <form action="mostrar.php" method="post">
                     <button>Ocultar</button>
                     <input type="hidden" name="ID" value="'.$asigId.'">
                 </form>
               <td> 
                 <form action="hecho.php" method="post">
                     <button>Pendiente</button>
                     <input type="hidden" name="ID" value="'.$asigId.'">
                 </form>
               </td>
               <td> 
                 <form action="Nota.php" method="post">
                     <button>Añadir Nota</button>
                     <input type="hidden" name="ID" value="'.$asigId.'">
                 </form>
               </td>
               
                </tr>';
            
        }
        $result->free();
    }
?>
    </section>
</div>
</body>

</html>