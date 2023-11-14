<html>
  <head>
    <meta charset="UTF-8">
    <title>Página principal</title>
    <link rel="stylesheet" type="text/css" href="style_principal.css">
  </head>
  <body>
    <main id= "hero">
     <video autoplay muted loop id="video-background">
          <source src="sanbernardofondo.mp4" type="video/mp4">
     </video>
     <div class= "container">
      
    </div>
     <div class="login-container">
        <form id="login-form" method="POST" action="login.php">
          <label for="username">Usuario (Nro. documento):</label>
          <input type="text" id="username" name="username">
          <br>
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password">
          <br>
          <button type="submit" id="login-btn">Iniciar sesión</button>
        </form>
      </div>      
    </main>
    <script src="script_principal.js"></script>
  </body>
</html>