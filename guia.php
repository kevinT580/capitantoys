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
        <p class="welcome-text">Buscar Guía</p>
        <div class="form-container">
            <form action="procesar_busqueda.php" method="POST">
                <label for="telefono">Ingrese su número de teléfono de cliente:</label>
                <input type="number" id="telefono" name="telefono" required>
                <br><br>
                <label for="guiaPaquete">Ingrese su guía:</label>
                <input type="text" id="guiaPaquete" name="guiaPaquete" required>
                <br><br>
              
                <button class="button" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</body>
</html>
