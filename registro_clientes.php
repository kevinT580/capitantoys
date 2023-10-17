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
                <input type="text" id="telefono" name="telefono" required>
                <br><br>
                <input type="submit" value="Registrar Cliente" class="button">
            </form>
        </div>
    </div>
            
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