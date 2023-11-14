<!DOCTYPE html>
<html>
<head>
	<title>Solicitudes actuales</title>
    <link rel="stylesheet" type="text/css" href="style_solicitudesactuales.css">
</head>
<body>
	<h1>Solicitudes actuales</h1>

	<table>
		<tr>
			<th>ID</th>
			<th>Escenario</th>
			<th>Fecha</th>
			<th>Hora inicio</th>
			<th>Hora fin</th>
			<th>Nombre</th>
			<th>Cantidad de personas</th>
			<th>Descripción</th>
			<th>Estado</th>
		</tr>

		<?php
			// Datos de conexión a la base de datos
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "prestamo_escenarios";

			// Conexión a la base de datos
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Verificar si la conexión fue exitosa
			if (!$conn) {
				die("Conexión fallida: " . mysqli_connect_error());
			}

			// Consulta SQL para obtener las solicitudes actuales
			$user_id = $_COOKIE["numero_documento"];
			$sql = "SELECT * FROM solicitudes WHERE (cedula = '$user_id')";

			$result = mysqli_query($conn, $sql);

			// Mostrar cada fila de la tabla de solicitudes
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr data-estado='" . $row["estado"] . "'>";
				echo "<td>" . $row["id"] . "</td>";
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

			// Cerrar la conexión a la base de datos
			mysqli_close($conn);
		?>
	</table>
	<a href="iniciousuario.php"><button class="button-back">Volver</button></a>
</body>
</html>
