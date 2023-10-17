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
    $sql = "SELECT * FROM registroclientes WHERE telefono = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $telefono);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // El número de teléfono está registrado, muestra la información de guiaPaquete y paqueteria
            $row = $result->fetch_assoc();
            $IDG = $row["IDCliente"]; // Asumiendo que hay un campo 'id' en la tabla registroclientes

            $sql = "SELECT guiaPaquete, paqueteria FROM ingresarguiaenvio WHERE IDG = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("i", $IDG);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Mostrar la información encontrada
                    echo "<h2>Información de guía:</h2>";
                    while ($row = $result->fetch_assoc()) {
                        echo "Guía de paquete: " . $row["guiaPaquete"] . "<br>";
                        echo "Paquetería: " . $row["paqueteria"] . "<br>";
                    }
                } else {
                    echo "No se encontró información de guía para este cliente.";
                }
            } else {
                // Error en la consulta SQL
                echo "Error en la consulta SQL de guías.";
            }
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
