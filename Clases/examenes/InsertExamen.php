<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
      
</head>
 
<body>
    <center>

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
        $DATABASE_HOST = '192.168.1.15';
        $DATABASE_USER = 'App';
        $DATABASE_PASS = 'Jlean92@yo';
        $DATABASE_NAME = 'miapp';
        $link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$AsigId = mysqli_real_escape_string($link, $_REQUEST['AsigId']);
$Tarea = mysqli_real_escape_string($link, $_REQUEST['Tarea']);
$Fecha = mysqli_real_escape_string($link, $_REQUEST['Fecha']);
$Nota = mysqli_real_escape_string($link, $_REQUEST['Nota']);
if ($Nota){
    $sql = "INSERT INTO examenes (Descripcion, AsigID, fecha,Nota ) VALUES ( '$Tarea', '$AsigId', '$Fecha', '$Nota')";
} else {
    $sql = "INSERT INTO examenes (Descripcion, AsigID, fecha ) VALUES ( '$Tarea', '$AsigId', '$Fecha')";
}
 


if(mysqli_query($link, $sql)){
    echo "Records added successfully. $sql.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
header('Location: examenes.php');
?>
    </center>
</body>
 
</html>