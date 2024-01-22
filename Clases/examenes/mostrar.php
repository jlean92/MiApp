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
$ID = mysqli_real_escape_string($link, $_REQUEST['ID']);
 
// Attempt insert query execution
$sql = "UPDATE examenes SET mostrar = NOT mostrar WHERE ExamenID = '$ID'";


if(mysqli_query($link, $sql)){
    echo "Records added successfully. $ID. $sql.  ";
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