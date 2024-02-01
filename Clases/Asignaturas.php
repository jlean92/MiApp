<?php
// confirmar sesion
session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.html');
        exit;
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Asignaturas</title>
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

<body>

<div class="casiBody">
    <header >
        <center><span id="Titulo">Asignaturas de <?php echo $_SESSION['FirstName']; ?> </span></center>
        <span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span>
    </header>
    <section>
        
<div>
    <form action="" method="post">
    <table style="text-align: right;">
        <tr><td><label>Nombre de la asignatura:</label></td><td><input type="text" name="Nombre"></td></tr>
        <tr><td><label>Nombre del profesor:</label></td><td><input type="text" name="Profesor"></td></tr>
        <tr><td><label>Horas de la asignatura:</label></td><td><input type="number" name="Horas"></td></tr>
        <tr><td><label>¿Llevas alguna falta?:</label></td><td><input type="number" name="Faltas"></td></tr>
    </table><br>
    <table>
        <tr><td colspan="2"><input type="submit" name="boton" value="Insertar Asignatura"></td></tr>
    </table>
    </form>
</div>

<div>
<?php 
    require("../Contrasenas.php");
    
    $mysqli = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); 
    $mysqli -> set_charset("utf8");

    if (isset($_POST['boton'])) {
        if (isset($_POST['Nombre'], $_POST['Profesor'],$_POST['Horas'])) {
            $Nombre = $_POST['Nombre'];
            $Profesor = $_POST['Profesor'];
            $Horas = $_POST['Horas'];
            if ($_POST['Faltas']) {
                $Faltas = $_POST['Faltas'];
            }
            else{
                $Faltas = 0;
            }
            
            $SQL = "INSERT INTO asignaturas(Nombre,Profesor,Horas,Faltas) VALUES ('$Nombre','$Profesor',$Horas,$Faltas)";
            $mysqli ->query($SQL);
        }
    }
    if (isset($_POST['anadir'])) {
        $ID = $_POST['ID'];
// Attempt insert query execution
        $sql = "UPDATE asignaturas SET faltas = faltas+1  Where Asigid = '$ID'";
        $mysqli -> query($sql);
        header('Location: Asignaturas.php');
    }
    if (isset($_POST['eliminar'])) {
        $ID = $_POST['ID'];
        $sql = "DELETE FROM asignaturas Where AsigId = '$ID'";
        $mysqli -> query($sql);
        header('Location: Asignaturas.php');
    }
?>
    <table border="1" cellspacing="2" cellpadding="2"> 
<?php
    $query = "SELECT Nombre,Profesor,Horas,faltas,AsigId  FROM asignaturas";
    $result = $mysqli->query($query);
    $contador = 0;
    foreach ($result as $key => $fila) {
        if ($contador == 0) {
        echo "<tr>";
            foreach ($fila as $key => $value) {
                if (strcmp($key,"AsigId")==0) {
                }else{
                    echo "<th>$key</th>";
                }
                
            }
        $contador++;
        echo "<th>+ Falta</th>";
        echo "<th>Borrar</th>";
        echo "</tr>";
        }
    }

    foreach ($result as $key => $fila) {
        echo "<tr>";
        foreach ($fila as $key => $value) {
            if (strcmp($key,"AsigId")==0) {
                echo "<td> ";
                    echo "<form action='' method='post'>";
                        echo "<input type='submit' name='anadir' value='Añadir 1'>";
                        echo "<input type='hidden' name='ID' value='$value'>";
                    echo "</form>";
                echo "</td>";
                echo "<td> ";
                    echo "<form action='' method='POST'>";
                        echo "<input type='submit' value='Eliminar' name='eliminar'>";
                        echo "<input type='hidden' name='ID' value='$value'>";
                    echo "</form>";
                echo "</td>";
            }else{
                echo "<td>$value</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
?>
                    
    <?php
?>
<article>
            <button onclick = "window.location.href='clase.php';">Clases</button>
            <button onclick = "window.location.href='../inicio.php';">Inicio</button>
        </article>

</div>


</div>
</section>
</body>
</html>
