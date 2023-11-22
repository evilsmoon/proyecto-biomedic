</div>
<!-- ./wrapper -->
<!-- JQuery -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- DataTables -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dataTables.responsive.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/responsive.bootstrap4.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dataTables.buttons.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/buttons.bootstrap4.min.js'); ?>"></script>
<!-- Adminlte core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('assets/js/adminlte.min.js'); ?>"></script>
<!-- Autenticacion -->
<script type="text/javascript" src="<?php echo base_url('assets/js/autenticacion.js'); ?>"></script>


<script>
  const preguntas = ['#1-1-1', '#1-1-2', '#1-1-3', '#1-2-1', '#1-2-2', '#1-3-1', '#1-3-2', '#1-3-3', '#1-4-1', '#2-1', '#2-2', '#2-3', '#2-4', '#2-5'];

  preguntas.forEach(function(e) {
    $(e).on('input', function() {
      var valor = $(this).val();
      if (valor < 1 || valor > 10) {
        $(this).removeClass('is-valid').addClass('is-invalid');
      } else {
        $(this).removeClass('is-invalid').addClass('is-valid');
      }
    });
  })

  $('#btn-modal').on('click', function(e) {
    $('#modal-inventario').modal('show');
    $('#title-formulario').html("Agregar Equipo")
    $('#form-inventario').attr('action', '<?php echo base_url('Admin/agregar'); ?>');
    $('#ubicacion').val('')
    $('#numero_inventario').val('')
    $('#marca').val('')
    $('#modelo').val('')
    $('#serie').val('')
    $('#datos_fabricante').val('')
    $('#datos_proveedor').val('')
    $('#anio_fabricacion').val('')
  })

  var table = $('#inventario').DataTable({
    paging: true,
    lengthChange: false,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,
    select: true,
    columnDefs: [{
      data: null,
      defaultContent: "<a class='fas text-primary fa-edit editar-equipo'></a><a class='fas text-primary fa-trash eliminar-equipo'></a><a class='fas text-primary fa-file formulario-equipo'></a>",
      targets: -1
    }]
  });

  table.on('click', '.editar-equipo', function(e) {
    let dataTable = table.row(e.target.closest('tr')).data();
    $.ajax({
      type: 'GET',
      url: '/Admin/obtenerEquipo',
      data: {
        id: dataTable[0]
      },
      success: function(data) {
        $('#modal-inventario').modal('show');
        $('#form-inventario').attr('action', '<?php echo base_url('Admin/editar'); ?>');
        $('#title-formulario').html("Editar Equipo")
        // Llenar el formulario con los datos obtenidos
        $('#id').val(data.id)
        $('#ubicacion').val(data.ubicacion)
        $('#numero_inventario').val(data.numero_inventario)
        $('#marca').val(data.marca)
        $('#modelo').val(data.modelo)
        $('#serie').val(data.serie)
        $('#datos_fabricante').val(data.datos_fabricante)
        $('#datos_proveedor').val(data.datos_proveedor)
        $('#anio_fabricacion').val(data.anio_fabricacion)

        // $('#formEditarEquipo').html(data);
      },
      error: function(error) {
        console.log('Error al obtener datos del equipo:', error);
      }
    });
  });

  table.on('click', '.eliminar-equipo', function(e) {
    let dataTable = table.row(e.target.closest('tr')).data();

    $.ajax({
      type: 'GET',
      url: '/Admin/eliminar',
      data: {
        id: dataTable[0]
      },
      success: function(data) {
        console.log(data);

        // $('#formEditarEquipo').html(data);
      },
      error: function(error) {
        console.log('Error al obtener datos del equipo:', error);
      }
    });
  });

  table.on('click', '.formulario-equipo', function(e) {

    let dataTable = table.row(e.target.closest('tr')).data();

    $.ajax({
      type: 'GET',
      url: '/Admin/detallesFormulario',
      data: {
        id: dataTable[0]
      },
      success: function(data) {

        $('#idEquipo').val(dataTable[0]);
        if (data.length !== 0) {
          data.forEach(function(detallesFormulario) {
            // Obtenemos los datos del JSON
            var id_padre = detallesFormulario.id_padre;
            var id_categoria = detallesFormulario.id_categoria;
            var id_subcategoria = detallesFormulario.id_subcategoria;
            var puntuacion = detallesFormulario.puntuacion;
            // Construimos el selector para encontrar el campo de puntuación correspondiente
            var selector = '';
            if (id_subcategoria) {
              selector = `#${id_padre}-${id_categoria}-${id_subcategoria}`;
            } else {
              selector = `#${id_padre}-${id_categoria}`;
            }
            // Actualizamos el valor del campo de puntuación con el valor recibido
            $(selector).val(puntuacion).removeClass('is-invalid').addClass('is-valid');

          });
        } else {
          let preguntasCrear = ['#1-1-1', '#1-1-2', '#1-1-3', '#1-2-1', '#1-2-2', '#1-3-1', '#1-3-2', '#1-3-3', '#1-4-1', '#2-1', '#2-2', '#2-3', '#2-4', '#2-5']
          preguntasCrear .forEach(function(e) {
            $(e).val('').removeClass('is-valid').addClass('is-invalid');
          })

        }

        $('#modal-formulario').modal('show');

      },
      error: function(error) {
        console.log('Error al obtener datos del equipo:', error);
      }
    });

  });
</script>

</body>

</html>