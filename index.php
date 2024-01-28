<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style type="text/css">
        * {
            font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
            font-size: 16px;
        }
        body {
            background-color:#ffffff;
        }
        
        h1 {
            text-align: center;
            background-color:#7690db;
            font-size: 30px;
            margin-top: 0px;
            margin-bottom: 4%;
            border-bottom: 1px solid
        }
        div {
            margin-top:6%;
            display: inline-block   ;
            padding:5%;
        }
        form input[type="password"], form input[type="text"] {
            border: 1px solid #dee0e4;;
        }
        img {
            background-color:#ffffff;
        }
        .campo {
            background-color:#ffffff;
        }

        input[type="submit"] {
            width: 100%;
            padding: 6%;
            margin-top: 2%;
            background-color:  #7690db;
            border: 0;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.2s;
        }
        form input[type="submit"]:hover {
            background-color: #7690db;
            transition: background-color 0.2s;
        }
    </style>
</head>
<body>
    <?php
        if (isset($_POST['boton'])==false) {
            // code...
    ?>
    <center>
    <div>
        <h1>Iniciar Sesion</h1>
    <table style="border-color:#ffffff;">
        <form action="" method="post">
            <tr class="campo"><td><label for="username"><img src="images/login.ico" width="40em"></label></td>
            <td><input type="text" name="username" placeholder="Usuario" id="username" required></td></tr>
            <tr class="campo"><td><label for="password"><img src="images/password.ico" width="40em"></label></td>
            <td><input type="password" name="password" placeholder="Contraseña" id="password" required></td></tr>
            <tr><td colspan="3"><input type="submit" name="boton" value="Acceder"></td></tr>
        </form>
    </table>
    </div>
    </center>
    <?php
    }
    else{
        require("Contrasenas.php");
        $conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
        $conexion -> set_charset("utf8");
        
    // Se valida si se ha enviado información, con la función isset()
        if (!isset($_POST['username'], $_POST['password'])) {
            // si no hay datos muestra error y re direccionar
            header('Location: index.php');
        }
    // evitar inyección sql
    if ($stmt = $conexion->prepare('SELECT Userid,contrasena,FirstName FROM users WHERE username = ?')) {
        // parámetros de enlace de la cadena s
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
    }
    // acá se valida si lo ingresado coincide con la base de datos

    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password,$FirstName);
        $stmt->fetch();

        // se confirma que la cuenta existe ahora validamos la contraseña
        if ($_POST['password'] === $password) {
            // la conexion sería exitosa, se crea la sesión
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            $_SESSION['FirstName'] = $FirstName;
            header('Location: inicio.php');
        }
    } else {
        // usuario incorrecto
        header('Location: index.php');
    }
    $stmt->close();
    }
    ?>
</body>
</html>