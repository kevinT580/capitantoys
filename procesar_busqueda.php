<?php
session_start();
include 'ConexionBD/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $telefono = $_POST["telefono"];
  
    // Conexión a la base de datos (debes configurar la conexión)
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para verificar si el número de teléfono está registrado
    $sql = "SELECT * FROM ingresarguiaenvio WHERE telefono = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $telefono);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // El número de teléfono está registrado, muestra la información de guíaPaquete y paquetería
            echo "<div class='welcome-container'>";
            echo "<table class='styled-table'>";
            echo "<tr>";
            echo "<th>Guía de paquete</th>";
            echo "<th>Paquetería</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["guiaPaquete"] . "</td>";
                echo "<td>" . $row["Paqueteria"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";
        } else {
            // Número de teléfono no registrado, muestra un mensaje de error
            echo "El número de teléfono no está registrado.";
        }

        $stmt->close();
    } else {
        // Error en la consulta SQL
        echo "Error en la consulta SQL.";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUIA</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <br><br>
    <button class="button" onclick="regresarAIndex()">Regresar</button>
</body>
<script>
    function regresarAIndex() {
        // Redireccionar a la página principal
        window.location.href = "https://ctoys.000webhostapp.com/guia";
    }
</script>
</html>
