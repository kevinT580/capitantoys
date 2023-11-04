<?php
include 'conexion.php'; // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $direccioncliente = $_POST["direccioncliente"];

    $sql = "INSERT INTO registroclientes (Nombre, Telefono, direccioncliente) VALUES ('$nombre', '$telefono', '$direccioncliente')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Cliente registrado exitosamente."); window.location.href = "http://localhost/capitantoys/capitantoys/registro_clientes.php";</script>';
    } else {
        echo "Error al registrar al cliente: " . $conn->error;
    }

    $conn->close(); // Cierra la conexión a la base de datos
}



function mostrarClientes() {
 

    // Consulta para obtener todos los clientes
    $sql = "SELECT * FROM clientes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Clientes registrados:</h2>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>Nombre: " . $row["nombre"] . ", Teléfono: " . $row["telefono"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No hay clientes registrados.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}



?>

