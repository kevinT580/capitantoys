<?php
include 'conexion.php'; // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numguia = $_POST["numguia"];
    $opcionp = $_POST["opcionp"];

    $sql = "INSERT INTO ingresarguiaenvio (guiaPaquete, Paqueteria) VALUES ('$numguia', '$opcionp')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Cliente registrado exitosamente."); window.location.href = "https://ctoys.000webhostapp.com/ingreso_guia.php";</script>';
    } else {
        echo "Error al registrar al cliente: " . $conn->error;
    }

    $conn->close(); // Cierra la conexión a la base de datos
}
?>