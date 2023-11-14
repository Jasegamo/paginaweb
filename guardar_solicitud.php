<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prestamo_escenarios";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

$escenario = $_POST['escenario'] ?? '';
$fecha = $_POST['fecha'] ?? '';
$horaInicio = $_POST['horaInicio'] ?? '';
$horaFin = $_POST['horaFin'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$cedula = $_POST['cedula'] ?? '';
$cantidadPersonas = $_POST['cantidadPersonas'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';

// Preparación de la consulta preparada
$sql = "INSERT INTO solicitudes (escenario, fecha, horaInicio, horaFin, nombre, cedula, cantidadPersonas, descripcion, estado)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pendiente')";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssssis", $escenario, $fecha, $horaInicio, $horaFin, $nombre, $cedula, $cantidadPersonas, $descripcion);

if (mysqli_stmt_execute($stmt)) {
    alert("Solicitud enviada con éxito.");
} else {
    alert("Error al enviar la solicitud: ") . mysqli_error($conn);
}

echo $response;

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
