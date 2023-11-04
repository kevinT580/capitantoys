<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
     <div class="welcome-container">
        <h2>Lista de Clientes</h2>
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
        $idCliente = $_GET['eliminar'];
        $sqlEliminar = "DELETE FROM registroclientes WHERE IDCliente = $idCliente";

        if ($conn->query($sqlEliminar) === TRUE) {
            echo "Cliente eliminado con éxito.";
        } else {
            echo "Error al eliminar el cliente: " . $conn->error;
        }
    }

    // Consulta para obtener los clientes
    $sql = "SELECT IDCliente, Nombre, Telefono, direccioncliente FROM registroclientes";
    $result = $conn->query($sql);
    ?>

 

    <?php
    if ($result->num_rows > 0) {
        echo "<table class='style-table'>";
        echo "<tr><th>ID Cliente</th><th>Nombre</th><th>Teléfono</th><th>Dirección</th><th>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["IDCliente"] . "</td><td>" . $row["Nombre"] . "</td><td>" . $row["Telefono"] . "</td><td>" . $row["direccioncliente"] . "</td>";
         
        }
        echo "</table>";
    } else {
        echo "No hay clientes registrados.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
    
    <br><br>
      <button class="button" onclick="regresarAIndex()">Regresar</button>

    <script>
        function regresarAIndex() {
            // Redireccionar a registro_clientes
            window.location.href = "https://ctoys.000webhostapp.com/registro_clientes";
        }
    </script>
        </table>
    </div>
</body>
</html>
