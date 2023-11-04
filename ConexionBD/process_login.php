<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];

    // Conexión a la base de datos (debes configurar la conexión)
    include 'conexion.php';

    // Consulta para verificar las credenciales del usuario en la tabla 'usuarios'
    $sql = "SELECT nombre, rol, contrasena FROM usuarios WHERE nombre = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row && password_verify($contrasena, $row["contrasena"])) {
            // Credenciales correctas, inicia la sesión
            $_SESSION["nombre"] = $nombre;
            
            if ($row["rol"] === "administrador") {
                header("Location: http://localhost/capitantoys/capitantoys/dashboard.php");
            } elseif ($row["rol"] === "empleado") {
                header("Location: http://localhost/capitantoys/capitantoys/dashboard_em.php");
            } else {
                // Tipo de usuario desconocido, muestra un mensaje de error
                echo "Tipo de usuario desconocido.";
            }
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
