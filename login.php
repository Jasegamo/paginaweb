<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'prestamo_escenarios';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
  die("La conexión ha fallado: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM `usuarios` WHERE (`numero_documento`='$username') AND `password`='$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  
  $row = mysqli_fetch_assoc($result);
  if ($row['tipo_usuario'] == 'usuario') {
    //setcookie("codigo", $row['codigo'], time() + (86400 * 30), "/");
    setcookie("numero_documento", $row['numero_documento'], time() + (86400 * 30), "/");
    setcookie("nombre_usuario", $row['nombre_usuario'], time() + (86400 * 30), "/");
  
    echo 'usuario';
  } else if ($row['tipo_usuario'] == 'administrativo') {
    echo 'administrativo';
  }
} else {
  echo 'error';
}

$conn->close();
?>