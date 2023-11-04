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
    <title>Buscar Guía</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    
    
    
    <div class="welcome-container">
        <p class="welcome-text">¡Bienvenido!</p>
        <div class="button-container">
            <form action="ConexionBD/insertar_cliente.php" method="POST">
          
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                <br><br>
                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" name="telefono" required>
                <br><br>
                <label for="direccioncliente">Dirección:</label>
                <input type="text" id="direccioncliente" name="direccioncliente" required>
                <br><br>
                <input type="submit" value="Registrar Cliente" class="button">
                <br><br>
                <a class="button" href="http://localhost/capitantoys/capitantoys/reporte_clientes.php">Ver Clientes Registrados</a>
            </form>
        </div>
    </div>
            
                <br><br>
      <button class="button" onclick="regresarAIndex()">Regresar</button>

    <script>
        function regresarAIndex() {
            // Redireccionar a index.php
            window.location.href = "http://localhost/capitantoys/capitantoys/dashboard.php";
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