<?php
// confirmar sesion
session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.html');
        exit;
    }

require("../Contrasenas.php");
$mysqli = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style type="text/css">
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
            margin-top: 5%;
        }
        
        article{
            margin-top: 1% ;
        }
    </style>
</head>
<body class="loggedin">
<div class="CasiBody">
    <header >
        <center><span id="Titulo">Asignaturas de <?php echo $_SESSION['FirstName']; ?> </span></center>
        <span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span>
    </header>
    <section>
    
    <form action="" method="post">
    <center>
    <table style="text-align: left;">
        <tr><td><label>Asignatura:</label></td><td><select name="AsigId">
            <option value="0">--Please choose an option--</option>
            <?php
                $query = "SELECT Nombre,AsigID  FROM asignaturas";
                $Resultado = $mysqli -> query("$query");
                foreach ($Resultado as $key => $fila) {
                    $AsigID = $fila['AsigID'];
                    $Nombre = $fila['Nombre'];
                    echo "<option value='$AsigID'>$Nombre</option>";
                }
            ?>
        </select></td></tr>
        <tr><td><label>Descripcion de la tarea:</label></td><td><input type="text" name="Tarea"></td></tr>
        <tr><td><label>Fecha a realizar:</label></td><td><input type="Date" name="Fecha"></td></tr>
        <tr><td><label>Nota</label></td><td><input type="number" name="Nota"></td></tr>
    </table>
    </center>
    <table>
        <tr><td colspan="2"><input type="submit" name="boton" value="Insertar examen"></td></tr>
    </table>
    </form>

    <div>

<?php 
    if (isset($_POST['boton'])) {
        $AsigID = $_POST['AsigId'];
        $Tarea = $_POST['Tarea'];
        $Fecha = $_POST['Fecha'];

        if ($_POST['Nota']) {
            $Nota = $_POST['Nota'];
            $AsigID = $_POST['AsigId'];
            $sql = "INSERT INTO examenes (Descripcion, AsigID, fecha,Nota ) VALUES ( '$Tarea', '$AsigID', '$Fecha', '$Nota')";
        }
        else{
            $sql = "INSERT INTO examenes (Descripcion, AsigID, fecha ) VALUES ( '$Tarea', '$AsigID', '$Fecha')";
        }
        $mysqli -> query($sql);
        
    }
    if (isset($_POST['Ocultar'])) {
        $ID = $_POST['ID'];
        $sql = "UPDATE examenes SET mostrar = NOT mostrar WHERE ExamenID = '$ID'";
        $mysqli -> query("$sql");
        header('Location: examenes.php');
    }
    if (isset($_POST['Pendiente'])) {
        $ID = $_POST['ID'];
        $sql = "UPDATE examenes SET Hecho = NOT Hecho WHERE examenID = '$ID'";
        $mysqli -> query("$sql");
        header('Location: examenes.php');
    }
    if (isset($_POST['nota'])) {
        $ID = $_POST['ID'];
        $Descripcion = $_POST['Descripcion'];
        echo "Agregar Nota del examen '$Descripcion'";
        echo "<form action='' method='post'>
                    <label>Nota</label><input type='text' name='Nota'><br/><br/>
                    <input type='hidden' name='ID' value=$ID></input>
                    <input type='submit' value='Insertar Nota' name='Anadir' ><br/><br/>
                </form>
               ";
    }
    if (isset($_POST['Anadir'])) {
        $ID = $_POST['ID'];
        $Nota = $_POST['Nota'];
        $sql = "UPDATE examenes SET Nota = $Nota WHERE ExamenID = '$ID'";
        $mysqli -> query("$sql");
    }
    $query = "SELECT examenes.ExamenID, examenes.Descripcion,examenes.fecha,examenes.Hecho,examenes.Nota,examenes.Mostrar,asignaturas.nombre,asignaturas.asigId  FROM examenes, asignaturas WHERE examenes.asigID = asignaturas.asigID ORDER BY examenes.fecha";
    
    echo '';
    $result = $mysqli->query($query);
    $contador=0;
    echo "<table border='1' cellspacing='2' cellpadding='2'>";
    foreach ($result as $key => $fila) {
        if ($contador==0) {
        echo "<tr>";
            foreach ($fila as $key => $value) {
                if (strcmp($key, "asigId")==0 || strcmp($key, "ExamenID")==0 || strcmp($key, "Mostrar")==0) {
                    // code...
                }
                else{
                    echo "<th>$key</th>";
                }
            }
            $contador++;
            echo "<th>Ocultar</th>";
            echo "<th>Hecho</th>";
            echo "<th>Nota</th>";
            echo "</tr>";
        }
        foreach ($result as $key => $fila) {
            echo "<tr>";
            if ($fila['Mostrar'] == 1) {
                foreach ($fila as $key => $value) {
                    if (strcmp($key, "asigId")==0) {
                        // code...
                    }
                    elseif (strcmp($key, "Mostrar")==0){
                        if ($value == 1 ) {
                            $accion = "Ocultar";
                        }
                    }
                    elseif(strcmp($key, "Descripcion")==0) {
                        $Descripcion = $value;
                        echo "<td>$value</td>";

                    }
                    elseif(strcmp($key, "ExamenID")==0) {
                        $Examen = $value;
                    }
                    elseif(strcmp($key, "Hecho")==0) {
                        if ($value == 0) {
                            echo "<td>Pendiente</td>";
                        }
                        else{
                            echo "<td>Hecho</td>";
                        }
                    }
                    else{

                        if ($value) {
                            echo "<td>$value</td>";
                        }
                        else{
                            echo "<td>Sin Hacer</td>";
                        }
                        
                    }
                }
            

            echo "<td> ";
                echo "<form action='' method='post'>";
                    echo "<input type='submit' value='Ocultar' name='Ocultar'>";
                    echo "<input type='hidden' name='ID' value='$Examen'>";
                echo "</form>";
              echo "<td> ";
                echo "<form action='' method='post'>";
                    if ($fila['Hecho'] == 1) {
                        echo "<input type='submit' value='Pendiente' name='Pendiente'>";
                    }else{
                        echo "<input type='submit' value='Hecho' name='Pendiente'>";
                    }
                    echo "<input type='hidden' name='ID' value='$Examen'>";
                echo "</form>";
              echo "</td>";
              echo "<td> ";
                echo "<form action='' method='post'>";
                    echo "<input type='submit' value='Añadir Nota' name='nota'>";
                    echo "<input type='hidden' name='ID' value='$Examen'>";
                    echo "<input type='hidden' name='Descripcion' value='$Descripcion'>";
                echo "</form>";
              echo "</td>";
            echo "</tr>";
            }
        }
    }
    echo "</table>"
    
?>

        <article >
            <button onclick = "window.location.href='../clase.php';">Clases</button>
            <button onclick = "window.location.href='../../inicio.php';">Inicio</button>
        </article>
    </section>
</div>
</body>

</html>