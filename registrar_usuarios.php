<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuarios</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="user-registration-container">
        <h2>Registrar Usuario</h2>
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
        </form>
    </div>
</body>
</html>
