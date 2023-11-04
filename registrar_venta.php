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
    <title>Registrar Venta</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
   
  
    <div class="venta-container">
        <h1>Registrar Venta</h1>
        <form action="/ConexionBD/insertar_venta.php" method="POST">
            
 <label class="form-label" for="cliente_id">Nombre Cliente:</label>
  <select class="form-input" name="cliente_id" id="cliente_id" required>
  

   <?php
  

$servername = "localhost"; // Cambia esto si tu servidor MySQL no se encuentra en localhost
$username = "id21397617_root"; // Cambia esto por tu nombre de usuario MySQL
$password = "Three365Meda53*"; // Cambia esto por tu contraseña MySQL
$database = "id21397617_prueba2023_1"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


    // Consulta SQL para obtener la lista de clientes
    $sql_clientes = "SELECT IDCliente, Nombre FROM registroclientes";
    $resultado_clientes = $conn->query($sql_clientes);

    if ($resultado_clientes->num_rows > 0) {
        while ($cliente = $resultado_clientes->fetch_assoc()) {
            $cliente_id = $cliente["IDCliente"];
            $nombre_cliente = $cliente["Nombre"];
            echo "<option value='$cliente_id'>$cliente_id - $nombre_cliente</option>";
        }
    } else {
        echo "<option value='' disabled>No se encontraron clientes</option>";
    }
    ?>
</select>


            <label class="form-label" for="FechaVenta">Fecha de Compra:</label>
            <input class="form-input" type="date" name="FechaVenta" id="FechaVenta" required>

            <label class="form-label" for="NombreArticulo">Nombre del Artículo:</label>
            <input class="form-input" type="text" name="NombreArticulo" id="NombreArticulo" required>

            <label class="form-label" for="Precio">Precio del Artículo:</label>
            <input class="form-input" type="number" step="0.01" name="Precio" id="Precio" required>

            <input class="button" type="submit" value="Guardar Venta">
   

    </form>
</div>
           <br><br>
      <button class="button" onclick="regresarAIndex()">Regresar</button>

    <script>
         function regresarAIndex() {
            // Redireccionar a index.php
            window.location.href = "https://ctoys.000webhostapp.com/dashboard";
        }
    </script>

    </body>
</html>
<?php
} else {
    // La sesión no está iniciada o el usuario no está autenticado, redirige al inicio de sesión
        echo "NO PUEDE ACCEDER A ESTE SITIO.";
    exit();
}
?>