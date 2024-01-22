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
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'App';
        $DATABASE_PASS = 'Jlean92@yo';
        $DATABASE_NAME = 'miapp';
        $link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$Name = mysqli_real_escape_string($link, $_REQUEST['Nombre']);
$profesor = mysqli_real_escape_string($link, $_REQUEST['Profesor']);
$Horas = mysqli_real_escape_string($link, $_REQUEST['Horas']);
$Faltas = mysqli_real_escape_string($link, $_REQUEST['Faltas']);

 
// Attempt insert query execution
$sql = "INSERT INTO asignaturas (Nombre, Profesor, Horas, Faltas) VALUES ('$Name', '$profesor', '$Horas',$Faltas)";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
header('Location: Asignaturas.php');
?>
    </center>
</body>
 
</html>