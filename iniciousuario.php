<?php
  $nombre_usuario = $_COOKIE["nombre_usuario"];
  $documento = $_COOKIE["numero_documento"]
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Página con barra de navegación</title>
    <link rel="stylesheet" type="text/css" href="style_iniciouser.css">
  </head>
  <body>
    <nav>
      <div class="nav-container">
        <div class="nav-left">
          <span>Bienvenido, <?php echo $nombre_usuario; ?> </span>
        </div>
        <div class="nav-right">
          <a href="solicitudesactuales.php">Solicitudes Actuales</a>
          <a href="solicitud.php">Nueva Solicitud</a>
          <form action="index.php" method="Post">
            <input type="submit" value="Logout" />
          </form>
        </div>
      </div>
    </nav>
    <video autoplay muted loop id="video-background">
      <source src="fondousuario.mp4" type="video/mp4">
    </video>
  </body>
</html>