<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios de sistema</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
     <div class="welcome-container">
        <h2>Lista de Usuarios de Sistema</h2>
        <table class="style-table">
           
    <?php
    // Conexión a la base de datos (ajusta las credenciales según tu configuración)
    $servername = "localhost";
    $username = "id21397617_root";
    $password = "Three365Meda53*";
    $dbname = "id21397617_prueba2023_1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión a la base de datos
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Procesar la eliminación del cliente
    if (isset($_GET['eliminar'])) {
        $idUsuario = $_GET['eliminar'];
        $sqlEliminar = "DELETE FROM usuarios WHERE idUsuario = $idUsuario";

        if ($conn->query($sqlEliminar) === TRUE) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar el usuario: " . $conn->error;
        }
    }

    // Consulta para obtener los usuarios
    $sql = "SELECT idUsuario, nombre, contrasena, rol FROM usuarios";
    $result = $conn->query($sql);
    ?>

 

    <?php
    if ($result->num_rows > 0) {
        echo "<table class='style-table'>";
        echo "<tr><th>Nombre</th><th>Rol</th><th>Acción</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["nombre"] . "</td><td>" . $row["rol"] . "</td>";
            echo "<td><a href='?eliminar=" . $row["idUsuario"] . "'>Eliminar</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No hay Usuarios registrados.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
    
    <br><br>
      <button class="button" onclick="regresarAIndex()">Regresar</button>

    <script>
        function regresarAIndex() {
            // Redireccionar a registro_clientes
            window.location.href = "http://localhost/capitantoys/capitantoys/registrar_usuarios.php";
        }
    </script>
        </table>
    </div>
</body>
</html>
