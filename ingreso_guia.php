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
    <title>Ingreso guia</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="welcome-container">
        <p class="welcome-text">¡Bienvenido!</p>
        <div class="button-container">
        <form action="ConexionBD/insertarguia" method="POST">
    <label for="numguia">GUÍA:</label>
    <input type="text" id="numguia" name="numguia" required>
    <br><br>
     <label for="telefono">Teléfono:</label>
    <input type="number" id="telefono" name="telefono" required>
    <br><br>
    <label for="opcionp">Nombre:</label>
    <select id="opcionp" name="opcionp" required>
        <option value="">Selecciona una opción</option>
        <option value="FedEx">FedEx</option>
        <option value="EnvaGT">EnviaGT</option>
        <option value="CargoExpreso">CargoExpreso</option>
        <option value="Forza">Forza</option>
        <option value="CPX">CPX</option>
    </select>
    <br><br>
    <input  type="submit" value="Registrar Guia" class="button" >
</form>
        </div>
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
