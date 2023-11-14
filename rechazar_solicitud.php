<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prestamo_escenarios";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("La conexión ha fallado: " . mysqli_connect_error());
}

// Recibir el ID de la solicitud
$id = $_POST["id"];

// Actualizar el estado de la solicitud
$sql = "UPDATE solicitudes SET estado='rechazada' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "La solicitud ha sido rechazada correctamente.";
} else {
  echo "Error al rechazar la solicitud: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
