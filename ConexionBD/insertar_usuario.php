<?php
include 'conexion.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT); // Hashea la contraseña
    $rol = $_POST["rol"];

    // Consulta para insertar el usuario en la tabla 'usuarios'
    $sql = "INSERT INTO usuarios (nombre, contrasena, rol) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $nombre, $contrasena, $rol);
        if ($stmt->execute()) {
            // Registro exitoso, redirige a la página de registro de usuarios
            header("Location: https://ctoys.000webhostapp.com/registrar_usuarios");
            exit();
        } else {
            // Error al insertar el usuario, muestra un mensaje de error
            echo "Error al registrar el usuario. <a https://ctoys.000webhostapp.com/registrar_usuarios'>Volver a intentar</a>";
        }

        $stmt->close();
    } else {
        // Error en la consulta SQL
        echo "Error en la consulta SQL.";
    }
}

$conn->close();
?>
