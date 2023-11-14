<!DOCTYPE html>
<html>

<head>
  <title>Administración de solicitudes</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style_admin.css">
  <script src="jquery-3.6.4.min.js"></script>
</head>

<body>
<a href="index.php"><button class="button-logout">Cerrar Sesion</button></a>
  <h1>Administración de solicitudes</h1>
  <table>
    <thead>
      <tr>
        <th>Escenario</th>
        <th>Fecha</th>
        <th>Hora de inicio</th>
        <th>Hora de fin</th>
        <th>Nombre completo</th>
        <th>Cédula o número de identificación</th>
        <th>Cantidad de personas</th>
        <th>Descripción</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
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

      // Obtener las solicitudes pendientes de la base de datos
      $sql1 = "SELECT * FROM solicitudes WHERE estado='pendiente'";
      $resultado1 = $conn->query($sql1);

      // Obtener los horarios ya aprobados
      $horariosAprobados = array();
      $sql2 = "SELECT fecha,escenario,horaInicio,horaFin FROM solicitudes WHERE estado='aprobada'";
      $resultado2 = $conn->query($sql2);
      if ($resultado2->num_rows > 0) {
        while ($fila = $resultado2->fetch_assoc()) {
          $horariosAprobados[] = $fila;
        }
      }

      if ($resultado1->num_rows > 0) {
        while ($fila = $resultado1->fetch_assoc()) {
          $aprobado = true;
          foreach ($horariosAprobados as $horario) {
            if (

              $horario["escenario"] == $fila["escenario"] &&
              $horario["fecha"] == $fila["fecha"] && (
                ($fila["horaInicio"] >= $horario["horaInicio"] && $fila["horaInicio"] < $horario["horaFin"]) ||
                ($fila["horaFin"] > $horario["horaInicio"] && $fila["horaFin"] <= $horario["horaFin"])
              )
            ) {
              $aprobado = false;
              break;
            }
          }

          echo "<tr data-id='" . $fila["id"] . "'>";
          echo "<td>" . $fila["escenario"] . "</td>";
          echo "<td>" . $fila["fecha"] . "</td>";
          echo "<td>" . $fila["horaInicio"] . "</td>";
          echo "<td>" . $fila["horaFin"] . "</td>";
          echo "<td>" . $fila["nombre"] . "</td>";
          echo "<td>" . $fila["cedula"] . "</td>";
          echo "<td>" . $fila["cantidadPersonas"] . "</td>";
          echo "<td>" . $fila["descripcion"] . "</td>";
          echo "<td>";
          if ($aprobado) {
            echo "<button class='aprobado'  onclick='aprobarSolicitud(" . $fila["id"] . ")'>Aprobar</button>";
          }
          echo "<button class='rechazado'  onclick='rechazarSolicitud(" . $fila["id"] . ")'>Rechazar</button>";
          echo "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='10'>No hay solicitudes pendientes</td></tr>";
      }


      ?>

      <table>
        <br>
        <div class="container-calendar">
          <h1 class="soltitle">Solicitudes aprobadas</h1>

          <form method="POST">

          <div class="calendar">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha">
          </div>

          <div class="codetext">
            <label for="cedula">Documento usuario:</label>
            <input type="text" id="cedula" name="cedula">
            <br>
          </div>
          <div class="btn_search">
            <button type="submit" id="search-btn">Buscar</button>
          </div>
          </div>
          </form>
        <thead>
          <tr>
            <th>Escenario</th>
            <th>Fecha</th>
            <th>Hora de inicio</th>
            <th>Hora de fin</th>
            <th>Nombre completo</th>
            <th>Cantidad de personas</th>
            <th>Descripción</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="tabla-solicitudes">
        </tbody>
        <?php

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
              die("La conexión ha fallado: " . mysqli_connect_error());
            }
            if(isset($_POST["fecha"]) && isset($_POST["cedula"])){
            $fechabusqueda = $_POST["fecha"];
            $codebusqueda = $_POST["cedula"];

            $sql3 = "SELECT * FROM `solicitudes` WHERE `fecha`= '$fechabusqueda' OR `cedula`= '$codebusqueda' AND `estado`='aprobada'";
            $resultado3 = mysqli_query($conn, $sql3);

            while ($row = mysqli_fetch_assoc($resultado3)) {
              echo "<tr data-estado='" . $row["estado"] . "'>";
              echo "<td>" . $row["escenario"] . "</td>";
              echo "<td>" . $row["fecha"] . "</td>";
              echo "<td>" . $row["horaInicio"] . "</td>";
              echo "<td>" . $row["horaFin"] . "</td>";
              echo "<td>" . $row["nombre"] . "</td>";
              echo "<td>" . $row["cantidadPersonas"] . "</td>";
              echo "<td>" . $row["descripcion"] . "</td>";
              echo "<td>" . $row["estado"] . "</td>";
              echo "</tr>";
            }
            }  
            ?>

      </table>
      
      <script>
        function aprobarSolicitud(id) {
          $.ajax({
            url: "aprobar_solicitud.php",
            type: "POST",
            data: { id: id },
            success: function () {
              // La solicitud se ha aprobado correctamente, actualizar la tabla
              location.reload();
            },
            error: function () {
              alert("Error al aprobar la solicitud");
            }
          });
        }

        function rechazarSolicitud(id) {
          $.ajax({
            url: "rechazar_solicitud.php",
            type: "POST",
            data: { id: id },
            success: function () {
              // La solicitud se ha rechazado correctamente, actualizar la tabla
              location.reload();
            },
            error: function () {
              alert("Error al rechazar la solicitud");
            }
          });
        }
      </script>

    </tbody>
  </table>
  
</body>

</html>