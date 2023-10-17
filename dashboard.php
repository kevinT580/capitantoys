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
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="welcome-container">
        <p class="welcome-text">¡Bienvenido!</p>
        <div class="button-container">
          <a href="registro_clientes" class="button">Registro Clientes</a>
<a href="registrar_venta" class="button">Registro Ventas</a>
<a href="reporte" class="button">Reporte Diario</a>
<a href="ingreso_guia" class="button">Ingresar Guía de Envío</a>
<a href="registrar_usuarios" class="button">Crear Usuarios</a>
<a href="prueba" class="button">Verificar Guía</a>


        </div>
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




