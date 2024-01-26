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

<script type="text/javascript" src="<?php echo base_url('assets/js/buttons.print.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/pdfmake.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/vfs_fonts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/buttons.html5.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- Adminlte core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('assets/js/adminlte.min.js'); ?>"></script>

<script>
  $('#btn-modal').on('click', function(e) {
    if (table.row('.selected').data()) {

      $('#modal-solicitud').modal('show');
      $('#solicitadoPor').text('<?php echo $this->session->userdata('user'); ?>')
      $('#id_equipo').val(table.row('.selected').data()[0])
      $('#solicitado_por').val(<?php echo $this->session->userdata('id'); ?>)
    } else {
      alert("selecione un equipo")
    }

  })


  var table = $('#inventario').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    columnDefs: [{
      data: null,
      defaultContent: "<a class='fas text-primary fa-clipboard formulario-equipo'></a>",
      targets: -1
    }]
  });

  table.on('click', 'tbody tr', (e) => {
    let classList = e.currentTarget.classList;

    if (classList.contains('selected')) {
      classList.remove('selected');
    } else {
      table.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
      classList.add('selected');
    }
  });


  table.on('click', '.formulario-equipo', function(e) {

    let dataTable = table.row(e.target.closest('tr')).data();

    $.ajax({
      type: 'GET',
      url: '/Enfermera/detallesFormulario',
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
          preguntasCrear.forEach(function(e) {
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

  var tableSolicitudes = $('#solicitudes').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
        "select": true,
    "dom": 'Bfrtip',
    "buttons": ["pdf", "print"]
  });

  tableSolicitudes.on('click', 'tbody tr', (e) => {
    let classList = e.currentTarget.classList;

    if (classList.contains('selected')) {
      classList.remove('selected');
    } else {
      tableSolicitudes.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
      classList.add('selected');
    }
  });

  $('#btn-modal-calificar').on('click', function(e) {
    if (tableSolicitudes.row('.selected').data()) {

      $('#modal-calificar').modal('show');
      $('#id_orden').val(tableSolicitudes.row('.selected').data()[0])
    } else {
      alert("selecione un equipo")
    }

  })
</script>
</body>

</html>