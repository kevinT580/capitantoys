<?php
include 'conexion.php'; // Incluye el archivo de conexión

// Verificar si el formulario se envió mediante POST (después de la búsqueda)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID de cliente o nombre ingresado por el usuario
    $cliente_id = $_POST["cliente_id"];
   $FechaVenta = $_POST["FechaVenta"];  // Obtener la fecha actual en el formato AAAA:MM:DD
   $FechaVenta = date("Y:m:d");
   $NombreArticulo = $_POST["NombreArticulo"];
   $Precio = $_POST["Precio"];
    
    // Consulta SQL para buscar al cliente por ID o nombre
 //  $sql = "SELECT * FROM RegistroClientes WHERE IDCliente = '$cliente_id_o_nombre' or Nombre = '$cliente_id_o_nombre'";
  // $sql = "INSERT INTO registroclientes (Nombre, Telefono) VALUES ('$nombre', '$telefono')";
   $sql ="INSERT INTO registroventas(FechaVenta, NombreArticulo, Precio, IDCliente) VALUES ('$FechaVenta','$NombreArticulo','$Precio','$cliente_id')";
   if ($conn->query($sql) === TRUE) {
    echo '<script>alert("COMPRA registrado exitosamente."); window.location.href = "https://ctoys.000webhostapp.com/registrar_venta";</script>';
} else {
    echo "Error al registrar al cliente: " . $conn->error;
}

$conn->close(); // Cierra la conexión a la base de datos
}

?>

