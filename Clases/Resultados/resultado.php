<html>

<head>
    <meta charset="UTF-8">
    <title>Asignaturas</title>
    <!-- https://www.w3schools.com/php/php_includes.asp-->
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
    <form action="CheckAll.php" method="post">
            <label>Asignatura:</label><select name="AsigId"><br/>
            <option value="0">--Please choose an option--</option>
<?php 
    $DATABASE_HOST = '192.168.1.15';
    $DATABASE_USER = 'App';
    $DATABASE_PASS = 'Jlean92@yo';
    $DATABASE_NAME = 'miapp';
    
    $mysqli = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); 
    $query = "SELECT Nombre,AsigId  FROM asignaturas";
    
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
            <button type="submit">Comprobar resultados</button><br/><br/>
        </form>

</div>


</div>
</section>
</body>
</html>