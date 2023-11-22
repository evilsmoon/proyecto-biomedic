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
  $('#btn-modal').on('click',function(e){
    $('#modal-inventario').modal('show');
    $('#title-formulario').html("Agregar Equipo")
    $('#formulario').attr('action', '<?php echo base_url('Admin/agregar'); ?>');
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
    columnDefs: [
      {
        data: null,
        defaultContent: "<a class='fas text-primary fa-edit editar-equipo'></a><a class='fas text-primary fa-trash eliminar-equipo'></a><a class='fas text-primary fa-file formulario-equipo'></a>",
        targets: -1
      }
    ]
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
        $('#formulario').attr('action', '<?php echo base_url('Admin/editar'); ?>');
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
    console.log(dataTable);
  });
</script>

</body>

</html>