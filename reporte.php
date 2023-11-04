<?php
session_start();

if (isset($_SESSION["nombre"])) {
    // La sesión está iniciada y el usuario está autenticado, muestra el contenido del formulario
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Ventas por Cliente</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="welcome-container">
        <h1>Informe de Ventas por Cliente</h1>
        <div class="button-container">
            <form action="" method="POST">
                <label class="form-label" for="IDCliente">Seleccione un cliente</label>
                <select class="form-input" name="IDCliente" id="IDCliente" required>
                    <option value="">Selecciona una opción</option>
                    <?php
                    // Paso 1: Conexión a la base de datos
                    $servername = "localhost";
                    $username = "id21397617_root";
                    $password = "Three365Meda53*";
                    $dbname = "id21397617_prueba2023_1";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verificar la conexión
                    if ($conn->connect_error) {
                        die("Error de conexión a la base de datos: " . $conn->connect_error);
                    }

                    // Paso 2: Consulta SQL para obtener el listado de clientes
                    $sql_clientes = "SELECT IDCliente, Nombre FROM registroclientes";
                    $result_clientes = $conn->query($sql_clientes);

                    if ($result_clientes->num_rows > 0) {
                        while ($row_cliente = $result_clientes->fetch_assoc()) {
                            $cliente_id = $row_cliente["IDCliente"];
                            $nombre_cliente = $row_cliente["Nombre"];
                            echo "<option value='$cliente_id'>$cliente_id - $nombre_cliente</option>";
                        }
                    } else {
                        echo "<option value='' disabled>No se encontraron clientes</option>";
                    }

                    $conn->close();
                    ?>
                  </select>

    <label class="form-label" for="FechaInicio">Fecha de Inicio</label>
    <input class="form-input" type="date" name="FechaInicio" id="FechaInicio" required>
    
    <label class="form-label" for="FechaFin">Fecha de Fin</label>
    <input class="form-input" type="date" name="FechaFin" id="FechaFin" required>

    <button class="button" type="submit">Generar Informe</button>
    <a class="button" href="?clear=false">Limpiar Informe</a>

          
<?php
$result = null; // Inicializar $result
$cliente_id = null;
$fecha_inicio = null;
$fecha_fin = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST["IDCliente"];
    $fecha_inicio = $_POST["FechaInicio"];
    $fecha_fin = $_POST["FechaFin"];

    if (!empty($cliente_id)) {
        // Paso 3: Conexión a la base de datos nuevamente
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

        // Paso 4: Construir la consulta SQL para obtener las ventas del cliente seleccionado y dentro del rango de fechas
        $sql = "SELECT rv.FechaVenta, rv.NombreArticulo, rv.Precio
            FROM registroventas rv
            WHERE rv.IDCliente = $cliente_id";

        if (!empty($fecha_inicio) && !empty($fecha_fin)) {
            $sql .= " AND rv.FechaVenta BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        }

        // Paso 5: Ejecutar la consulta
        $result = $conn->query($sql);
    }
}

if (isset($_GET['clear']) && $_GET['clear'] == 'true') {
    $cliente_id = null;
    $fecha_inicio = null;
    $fecha_fin = null;
    $result = null;
}
?>

<br/>
<br>
 <div class="welcome-container">
        <h2>Informe de Ventas</h2>
        <table class="styled-table">
            <tr>
                <th>Fecha de Venta</th>
                <th>Nombre del Artículo</th>
                <th>Precio</th>
            </tr>
            <?php
            if ($result !== null && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["FechaVenta"] . "</td>";
                    echo "<td>" . $row["NombreArticulo"] . "</td>";
                    echo "<td>" . $row["Precio"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No se encontraron ventas para el reporte.</td></tr>";
            }
            ?>
        </table>

        <br><br>
        <button class="button" onclick="regresarAIndex()">Regresar</button>
        
        
<script>
function regresarAIndex() {
    // Redireccionar a la página principal
    window.location.href = "https://ctoys.000webhostapp.com/dashboard";
}

</script>
</div>
</div>
</form>
</body>
</html>
<?php
} else {
    // La sesión no está iniciada o el usuario no está autenticado, redirige al inicio de sesión
        echo "NO PUEDE ACCEDER A ESTE SITIO.";
    exit();
}
?>
