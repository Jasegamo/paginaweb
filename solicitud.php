<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Solicitud de prestamo de espacios publicos de SAN BERNARDO</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery-3.6.4.min.js"></script>
  </head>
  <body>
    <h1>Solicitud de prestamo de espacios publicos de SAN BERNARDO</h1>
    <form id="solicitud-form">
      <label for="escenario">Escenario Municipal:</label>
      <select id="escenario" name="escenario">
        <option value="capilla">Capilla Municipal</option>
        <option value="cementerio">Servicio Excequial</option>
        <option value="polideportivo">Polideportivo</option>
        <option value="salon">Salon Comunal</option>
        <option value="parque">Parque Principal</option>>
      </select>
      <br>

      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha" name="fecha">
      <br>

      <label for="hora_inicio">Hora de inicio:</label>
      <input type="time" id="hora_inicio" name="hora_inicio">
      <br>

      <label for="hora_fin">Hora de fin:</label>
      <input type="time" id="hora_fin" name="hora_fin">
      <br>

      <label for="nombre">Nombre completo:</label>
      <input type="text" id="nombre" name="nombre" value="<?php echo $_COOKIE['nombre_usuario']; ?>" readonly>
      <br>

      <label for="cedula">Cedula o Numero de identificacion:</label>
      <input type="text" id="cedula" name="cedula" value="<?php echo $_COOKIE["numero_documento"]; ?>" readonly>
      <br>

      <label for="cantidad_personas">Cantidad de personas que haran uso del escenario:</label>
      <input type="number" id="cantidad_personas" name="cantidad_personas" min="1" required>
      <br>

      <label for="descripcion">Descripcion o explicacion del motivo o razon por el que desean hacer uso del espacio:</label>
      <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea>
      <br>

      <button type="submit" id="submit-btn">Enviar solicitud</button>
    </form>

    <script src="script.js"></script>
    
    <a href="iniciousuario.php"><button class="button-back">Volver</button></a>
  </body>
</html>
