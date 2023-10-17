<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="ConexionBD/process_login.php" method="POST">
            <label for="nombre">Nombre de usuario:</label>
            <br><br>
            <input type="text" id="nombre" name="nombre" required>
<br><br>
            <label for="contrasena">Contraseña:</label>
            <br><br>
            <input type="password" id="contrasena" name="contrasena" required>
<br><br>
            <button class = "button" type="submit">Iniciar Sesión</button>
            <br><br>
            <label>Por favor acceder con los datos solicitados</label>
        </form>
    </div>
</body>
</html>