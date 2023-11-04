<?php
session_start();

if (isset($_SESSION["nombre"])) {
    // La sesión está iniciada y el usuario está autenticado, muestra el contenido del formulario
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuarios</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="welcome-container">
        <h2>Registrar Usuario de Sistema</h2>
        <form action="ConexionBD/insertar_usuario.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
            <br><br>

            <label for="rol">Rol:</label>
            <select id="rol" name="rol">
                <option value="administrador">Administrador</option>
                <option value="empleado">Empleado</option>
            </select>
            <br><br>

            <button class="button" type="submit">Registrar</button>
        
        <br><br>
      <button class="button" onclick="regresarAIndex()">Regresar</button>
<a class="button" href="http://localhost/capitantoys/capitantoys/reporte_usuarios.php">Ver Usuarios</a>
    <script>
        function regresarAIndex() {
            // Redireccionar a index.php
            window.location.href = "http://localhost/capitantoys/capitantoys/dashboard.php";
        }
    </script>
        
        
        </form>
        
        
    </div>
    
</body>
</html>
<?php
} else {
    // La sesión no está iniciada o el usuario no está autenticado, redirige al inicio de sesión
        echo "NO PUEDE ACCEDER A ESTE SITIO.";
    exit();
}
?>
