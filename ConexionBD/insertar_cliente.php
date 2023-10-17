<?php
include 'conexion.php'; // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];

    $sql = "INSERT INTO registroclientes (Nombre, Telefono) VALUES ('$nombre', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Cliente registrado exitosamente."); window.location.href = "https://ctoys.000webhostapp.com/registro_clientes.php";</script>';
    } else {
        echo "Error al registrar al cliente: " . $conn->error;
    }

    $conn->close(); // Cierra la conexión a la base de datos
}
?>