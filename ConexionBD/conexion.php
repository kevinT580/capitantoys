<?php
$servername = "localhost"; // Cambia esto si tu servidor MySQL no se encuentra en localhost
$username = "root"; // Cambia esto por tu nombre de usuario MySQL
$password = "123"; // Cambia esto por tu contraseña MySQL
$database = "id21397617_prueba2023_1"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>