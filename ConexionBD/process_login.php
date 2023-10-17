<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];

    // Conexión a la base de datos (debes configurar la conexión)
    $conn = new mysqli("localhost", "id21397617_root", "Three365Meda53*", "id21397617_prueba2023_1");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para verificar las credenciales del usuario en la tabla 'usuarios'
    $sql = "SELECT * FROM usuarios WHERE nombre = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row && password_verify($contrasena, $row["contrasena"])) {
            // Credenciales correctas, inicia la sesión
            $_SESSION["nombre"] = $nombre;
            header("Location: https://ctoys.000webhostapp.com/dashboard.php");
            exit();
        } else {
            // Credenciales incorrectas, muestra un mensaje de error
            echo "Credenciales incorrectas. <a href='https://ctoys.000webhostapp.com/'>Volver a intentar</a>";
        }

        $stmt->close();
    } else {
        // Error en la consulta SQL
        echo "Error en la consulta SQL.";
    }

    $conn->close();
}
?>
