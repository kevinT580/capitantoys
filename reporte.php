<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Ventas por Cliente</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body >
    <div class="welcome-container">
        <h1>Informe de Ventas por Cliente</h1>
        <div class="button-container">
        <form action="" method="POST">
            <label class="form-label" for="IDCliente">Ingrese código de cliente</label>
            <input class="form-input" type="text" name="IDCliente" id="IDCliente" required>
            <label class="form-label" for="FechaVenta">Fecha de Venta</label>
            <input class="form-input" type="date" name="FechaVenta" id="FechaVenta">
            <button class="button" type="submit">Generar Informe</button>
            <a class="button" href="?clear=false">Limpiar Informe</a>
     

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cliente_id = $_POST["IDCliente"];
        $fecha_venta = $_POST["FechaVenta"];
        

        if (!empty($cliente_id)) {
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

            // Paso 2: Construir la consulta SQL
            $sql = "SELECT rv.FechaVenta, rv.NombreArticulo, rv.Precio, rc.Nombre, rc.Telefono 
                    FROM registroventas rv 
                    INNER JOIN registroclientes rc ON rv.IDCliente = rc.IDCliente 
                    WHERE rc.IDCliente= $cliente_id";

            // Agregar el filtro por fecha si se proporciona
            if (!empty($fecha_venta)) {
                $sql .= " AND rv.FechaVenta = '$fecha_venta'";
            }

            // Paso 3: Ejecutar la consulta
            $result = $conn->query($sql);
        }
    }

    if (isset($_GET['clear']) && $_GET['clear'] == 'true') {
        $cliente_id = null;
        $result = null;
    }
    ?>

    
<?php if (!empty($cliente_id)) { ?>
    <h1>Informe de Ventas del Cliente con Código <?php echo $cliente_id; ?></h1>
    <?php if ($result->num_rows > 0) { ?>
        <!-- Agregar botón de impresión -->

        <table class="styled-table" id="informe-ventas">
            <tr>
<tr>
<td colspan='5'>Listado de la compra </td>
</tr>
                <th>FechaVenta</th>
                <th>NombreArticulo</th>
                <th>Precio</th>
                <th>Nombre</th>
                <th>Telefono</th>
            </tr>
           
            <?php
            // Paso 4: Generar HTML para el informe
         
            while ($row = $result->fetch_assoc()) {
                
   
                echo "<tr>";
                echo "<td>" . $row["FechaVenta"] . "</td>";
                echo "<td>" . $row["NombreArticulo"] . "</td>";
                echo "<td>" . $row["Precio"] . "</td>";
                echo "<td>" . $row["Nombre"] . "</td>";
                echo "<td>" . $row["Telefono"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>

    <?php }  else { ?>
        <p>No se encontraron ventas para el cliente con Código <?php echo $cliente_id; ?></p>

    <?php } ?>
<?php } ?>


           <br><br>
      <button class="button" onclick="regresarAIndex()">Regresar</button>

    <script>
    function regresarAIndex() {
            // Redireccionar a index.php
            window.location.href = "https://ctoys.000webhostapp.com";
        }
    </script>

</body>
</html>
