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
    <form action="InsertAsig.php" method="post">
        <label>Nombre de la asignatura:</label><input type="text" name="Nombre"><br/><br/>
        <label>Nombre del profesor:</label><input type="text" name="Profesor"><br/><br/>
        <label>Horas de la asignatura:</label><input type="number" name="Horas"><br/><br/>
        <label>¿Llevas alguna falta?:</label><input type="number" name="Faltas"><br/><br/>

        <button>Insertar asignatura</button>
    </form>
</div>

<div>
<?php 
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'app';
    $DATABASE_PASS = 'Jlean92@yo';
    $DATABASE_NAME = 'miapp';
    
    $mysqli = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); 
    $mysqli -> set_charset("utf8");

    $query = "SELECT Nombre,Profesor,Horas,faltas,AsigId  FROM asignaturas";
    
    echo '<table border="1" cellspacing="2" cellpadding="2"> 
          <tr> 
              <td> <font face="Arial">Nombre de la asignatura</font> </td> 
              <td> <font face="Arial">Profesor</font> </td> 
              <td> <font face="Arial">Horas</font> </td> 
              <td> <font face="Arial">Faltas</font> </td> 
              <td> <font face="Arial">Posibles</font></td>
              <td> <font face="Arial">Falta</font></td>
              <td> <font face="Arial">Elim Asignatura</font></td>
          </tr>';
    
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["Nombre"];
            $field2name = $row["Profesor"];
            $field3name = $row["Horas"];
            $field4name = $row["faltas"]; 
            $field5name = $row["AsigId"]; 
            $percent = (round(($field3name /100)*10)-$field4name);

            echo '<tr> 
                      <td>'.$field1name.'</td> 
                      <td>'.$field2name.'</td> 
                      <td>'.$field3name.'</td> 
                      <td>'.$field4name.'</td> 
                      <td>'.$percent.'</td>
                      <td> 
                        <form action="AddFalta.php" method="post">
                            <button>Añadir 1</button>
                            <input type="hidden" name="ID" value="'.$field5name.'">
                        </form>
                      </td>
                      <td> 
                        <form action="DelAsignatura.php" method="post">
                            <button>Eliminar</button>
                            <input type="hidden" name="ID" value="'.$field5name.'">
                        </form>
                      </td>
                  </tr>';
        }
        $result->free();
    } 
?>


</div>


</div>
</section>
</body>
</html>
