<?php
// confirmar sesion
session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.html');
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script type="text/javascript">
        function exportTableToCSV() {
            var csv = [];
            var rows = document.querySelectorAll("table tr");

            for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll("td, th");

                for (var j = 0; j < cols.length; j++)
                    row.push('"' + cols[j].innerText.replace(/"/g, '""') + '"');

                csv.push(row.join(","));
            }

            // Descargar el archivo CSV
            downloadCSV(csv.join("\n"), "exported_table.csv");
        }

        function downloadCSV(csv, filename) {
            var csvFile;
            var downloadLink;

            // Agregar la BOM (Byte Order Mark) para indicar UTF-8
            csv = "\uFEFF" + csv;

            csvFile = new Blob([csv], {type: "text/csv;charset=utf-8"});
            downloadLink = document.createElement("a");

            downloadLink.download = filename;
            downloadLink.href = window.URL.createObjectURL(csvFile);
            downloadLink.style.display = "none";

            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        }
</script>
<script type="text/javascript">
    function sendTableToWhatsApp() {
        var tableText = encodeURIComponent(getTableText());
        var whatsappLink = "https://wa.me/?text=" + tableText;
        window.location.href = whatsappLink;
    }

    function getTableText() {
        var text = "";
        var rows = document.querySelectorAll("table tr");

        for (var i = 0; i < rows.length; i++) {
            var cols = rows[i].querySelectorAll("td, th");
            for (var j = 0; j < cols.length; j++) {
                text += cols[j].innerText + "\t";
            }
            text += "\n";
        }

        return text;
    }
</script>

    <style type="text/css">
        body {
            background-color: black;
        }
        .CasiBody {
            margin-top: 0%;
            background-color: white;
            display: block;
            margin-left: 10%;
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
        section {
            text-align: center;
        }
        
        article{
            margin-top: 2% ;
        }

        div {
            margin-top: 2%;
            display: inline-block;
        }
    
        #menu {
            
            margin-right: 8%;
            margin-left: 5%;
        }
        #logoff {
            font-size: 60%;
            float: right;
            margin-right:5% ;
        }
        .resaltado {
            background-color: #8cff66; /* Fondo verde */
        }
        .ahora {
            background-color: #FFE3AA; /* Fondo verde */
        }
    </style>
</head>

<body class="loggedin">
<div class="CasiBody">
    <header ><span id="Titulo">Menu Semanal</span><span><button class="Button" id="logoff" onclick = "window.location.href='cerrar-sesion.php';">Cerrar Sesion</button></span></header>

    <section>
            <article >
            <button onclick = "window.location.href='Dieta.php';">Dieta</button>
            <button onclick = "window.location.href='../inicio.php';">Inicio</button>
        </article>
    

    <div>
    <button onclick="exportTableToCSV()">Exportar a CSV</button>
    <button onclick="sendTableToWhatsApp()">Enviar por WhatsApp</button>

    <?php
    // Conexión a la base de datos
    $DATABASE_HOST = '127.0.0.1';
    $DATABASE_USER = 'App';
    $DATABASE_PASS = 'Jlean92@yo';
    $DATABASE_NAME = 'miapp';

    $conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Realizar la consulta
    $sql = "SELECT ingredientes.Ingrediente, sum(Ingredientes.cantidad) as Cantidad, ingredientes.Medida FROM Ingredientes, menu
            WHERE menu.plato = Ingredientes.Id_plato
            GROUP BY Ingredientes.Ingrediente,Ingredientes.Medida
            ORDER BY Ingredientes.Ingrediente;";
    $result = $conn->query($sql);

    
    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Imprimir los datos en la tabla
        echo "<table  border=1 cellspacing=2 cellpadding=2>
                <tr>
                    <th><font face='Arial'>Ingrediente</font></th>
                    <th><font face='Arial'>Cantidad</font></th>
                    <th><font face='Arial'>Medida</font></th>
                </tr>";
        $resaltado = "resaltado";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td><font face='Arial'>" . $row["Ingrediente"] . "</font></td>
                    <td><font face='Arial'>" . $row["Cantidad"] . "</font></td>
                    <td><font face='Arial'>" . $row["Medida"] . "</font></td>
                  </tr>";
            
        }
        echo "</table>";
    }

    // Cerrar conexión
    
    ?>
<br>
    </section>
</div>
</body>

</html>