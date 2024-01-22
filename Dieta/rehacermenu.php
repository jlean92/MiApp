<?php
ini_set('display_errors', 1);
// Configuración de la conexión a la base de datos
    $DATABASE_HOST = '127.0.0.1';
    $DATABASE_USER = 'App';
    $DATABASE_PASS = 'Jlean92@yo';
    $DATABASE_NAME = 'miapp';
// Crear conexión
$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Llamar al procedimiento almacenado (sustituye 'nombre_del_procedimiento' por el nombre real)
$sql = "CALL Menu ('Solido','Solido','Solido','Solido','Solido','Solido','Solido','Legumbres','Carne Roja','Pescado Azul','Carne Blanca','Pescado Blanco','Legumbres','Pescado Azul','Pescado Azul','Huevo','Queso','Pescado Blanco','Huevo','Carne Blanca','Huevo');";

if ($conn->query($sql) === TRUE) {
    // Éxito en la ejecución del procedimiento
    header('Location: menu.php');
} else {
    // Error en la ejecución del procedimiento

    echo "Error: " . $sql . "<br>" . $conn->error;
    // Maneja el error según tus necesidades

    // Devuelve un código de error (por ejemplo, 500 para errores internos del servidor)
}

// Cierra la conexión
$conn->close();
?>