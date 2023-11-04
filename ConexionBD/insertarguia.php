<?php
include 'conexion.php'; // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numguia = $_POST["numguia"];
    $opcionp = $_POST["opcionp"];
    $telefono = $_POST["telefono"];
     
    $sql = "INSERT INTO ingresarguiaenvio (guiaPaquete, Paqueteria, telefono) VALUES ('$numguia', '$opcionp', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Cliente registrado exitosamente."); window.location.href = "http://localhost/capitantoys/capitantoys/ingreso_guia.php";</script>';
    } else {
        echo "Error al registrar al cliente: " . $conn->error;
    }

    $conn->close(); // Cierra la conexión a la base de datos
}
?>