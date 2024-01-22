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
    <header ><span id="Titulo">Añadir Nota</span><span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span></header>
    
    <a id="menu" href="inicio.php">Volver a Inicio</a>

    <section>
    
    

    <div>
    
<?php
    $DATABASE_HOST = '192.168.1.15';
    $DATABASE_USER = 'App';
    $DATABASE_PASS = 'Jlean92@yo';
    $DATABASE_NAME = 'miapp';
    $link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
        
    $query = "SELECT examenes.ExamenID, examenes.Descripcion,examenes.fecha,examenes.Hecho,examenes.Nota,examenes.Mostrar,asignaturas.nombre,asignaturas.asigId FROM examenes, asignaturas WHERE examenes.asigID = asignaturas.asigID";
    $ID = mysqli_real_escape_string($link, $_REQUEST['ID']);

// Check connection
if($link === false){die("ERROR: Could not connect. " . mysqli_connect_error());}
        echo '<form action="InsertNota.php" method="post">
                    <label>Nota</label><input type="text" name="Nota"><br/><br/>
                    <input type="hidden" name="ID" value="'.$ID.'"></input>
                    <button type="submit">Insertar Nota</button><br/><br/>
                </form>
                <p>Este es el ID: '.$ID.'</p>
                ';
    
// Escape user inputs for security

?>

<?php 
    $DATABASE_HOST = '192.168.1.15';
    $DATABASE_USER = 'App';
    $DATABASE_PASS = 'Jlean92@yo';
    $DATABASE_NAME = 'miapp';
    
    $ID = mysqli_real_escape_string($link, $_REQUEST['ID']);
    
    $mysqli = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    $query = "SELECT examenes.ExamenID, examenes.Descripcion,examenes.fecha,examenes.Hecho,examenes.Nota,examenes.Mostrar,asignaturas.nombre,asignaturas.asigId FROM examenes, asignaturas WHERE examenes.asigID = asignaturas.asigID AND examenes.ExamenID = '$ID'";
    
        echo '<table border="1" cellspacing="2" cellpadding="2"> 
          <tr> 
              <td> <font face="Arial">Descripcion</font> </td> 
              <td> <font face="Arial">Fecha</font> </td> 
              <td> <font face="Arial">Hecho</font> </td> 
              <td> <font face="Arial">Nota</font> </td> 
              <td> <font face="Arial">nombre</font></td>
            </tr>';
    
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {

            $Descripcion = $row["Descripcion"];
            $fecha = $row["fecha"];
            $Hecho = $row["Hecho"];
            $Nota = $row["Nota"]; 
            $Mostrar = $row["Mostrar"]; 
            $nombre = $row["nombre"]; 
            $asigId = $row["ExamenID"]; 
            
            if($Mostrar == "1"){
                if($Nota){
                    if($Hecho == "1") {
                        echo '<tr> 
                          <td>'.$Descripcion.'</td> 
                          <td>'.$fecha.'</td> 
                          <td>Hecho</td> 
                          <td>'.$Nota.'</td> 
                          <td>'.$nombre.'</td>
                          
                      </tr>';
                    }else{
                       echo '
                        <tr>
                          <td>'.$Descripcion.'</td> 
                          <td>'.$fecha.'</td> 
                          <td>Pendiente</td> 
                          <td>'.$Nota.'</td>
                          <td>'.$nombre.'</td>
                          
                      </tr>';
                
                    }
                }else{ 
                    if($Hecho == "1") {
                        echo '<tr> 
                          <td>'.$Descripcion.'</td> 
                          <td>'.$fecha.'</td> 
                          <td>Hecho</td> 
                          <td>Sin Nota</td> 
                          <td>'.$nombre.'</td>
                          
                      </tr>';
                    }else{
                       echo '
                        <tr>
                          <td>'.$Descripcion.'</td> 
                          <td>'.$fecha.'</td> 
                          <td>Pendiente</td> 
                          <td>Sin Nota</td>
                          <td>'.$nombre.'</td>
                          
                      </tr>';
                
                    }
                }
            }
        }
        $result->free();
    }
?>
    </section>
</div>
</body>

</html>