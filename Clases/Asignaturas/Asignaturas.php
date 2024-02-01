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
        <span id="Titulo">Toda la informacion sobre sus clases</span> <span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span>
    </header>

    <section>
        <article>
            <button onclick = "window.location.href='../clase.php';">Clases</button>
            <button onclick = "window.location.href='../../inicio.php';">Inicio</button>
        </article>
<div>
    <form action="" method="post">
        <label>Nombre de la asignatura:</label><input type="text" name="Nombre"><br/><br/>
        <label>Nombre del profesor:</label><input type="text" name="Profesor"><br/><br/>
        <label>Horas de la asignatura:</label><input type="number" name="Horas"><br/><br/>
        <label>¿Llevas alguna falta?:</label><input type="number" name="Faltas"><br/><br/>

        <input type="submit" name="boton" value="Insertar Asignatura">
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
?>
                    
    <?php
?>


</div>


</div>
</section>
</body>
</html>
