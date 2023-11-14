      $(document).ready(function() {
        $('#solicitud-form').submit(function(event) {
          event.preventDefault();

          var escenario = $('#escenario').val();
          var fecha = $('#fecha').val();
          var horaInicio = $('#hora_inicio').val() + ':00';
          var horaFin = $('#hora_fin').val() + ':00';
          var nombre = $('#nombre').val();
          var cedula = $('#cedula').val();
          var cantidadPersonas = $('#cantidad_personas').val();
          var descripcion = $('#descripcion').val();

          $.ajax({
            url: 'guardar_solicitud.php',
            type: 'POST',
            data: {
              'escenario': escenario,
              'fecha': fecha,
              'horaInicio': horaInicio,
              'horaFin': horaFin,
              'nombre': nombre,
              'cedula': cedula,
              'cantidadPersonas': cantidadPersonas,
              'descripcion': descripcion
            },
            success: function() {
              alert("Solicitud enviada");
              }
            ,
            error: function() {
              alert('Error al enviar la solicitud.');
            }
          });
        });
      });