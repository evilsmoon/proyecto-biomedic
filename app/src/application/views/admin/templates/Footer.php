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
<!-- overlayScrollbars -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.overlayScrollbars.min.js'); ?>"></script>
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
        $('#numero_inventario').val(data.numero_inventario);
        $('#ubicacion').val(data.ubicacion);
        $('#marca').val(data.marca);
        $('#modelo').val(data.modelo);
        $('#area').val(data.area);
        $('#nombre_equipo').val(data.nombre_equipo);
        $('#serie').val(data.serie);
        $('#funcionaliad').val(data.funcionaliad);

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
        var role = '<?php echo $this->session->userdata('Role'); ?>';
        if (role == 'Administrador') {
          window.location.href = 'Admin';
        } else {
          window.location.href = 'Doctor';
        }

      },
      error: function(error) {
        console.log('Error al obtener datos del equipo:', error);
      }
    });
  });

  table.on('click', '.formulario-equipo', function(e) {

    let dataTable = table.row(e.target.closest('tr')).data();
    $('#idEquipo').val(dataTable[0]);
    $('#modal-formulario').modal('show');
    $.ajax({
      type: 'GET',
      url: '/Admin/obtener_formulario_equipo',
      data: {
        id: dataTable[0]
      },
      success: function(data) {
        console.log(data);
        var resp = JSON.parse(data);
        console.log(resp);
        if (resp) {
          $('#nivel_riesgpo').val(resp.indice_pre_RF);
          $('#funcion_equipo').val(resp.indice_pre_FE);
          $('#requisitos_mantenimiento').val(resp.indice_pre_RM);
          $('#tipo_desgaste').val(resp.indice_pre_DM);
          $('#frecuencia_uso').val(resp.indice_pre_FU);
          $('#averias_equipo').val(resp.indice_pre_AE);
        } else {
          $('#nivel_riesgpo').val('');
          $('#funcion_equipo').val('');
          $('#requisitos_mantenimiento').val('');
          $('#tipo_desgaste').val('');
          $('#frecuencia_uso').val('');
          $('#averias_equipo').val('');
        }

      },
      error: function(error) {
        console.log('Error al obtener datos del equipo:', error);
      }
    });

  });

  /* 
    ! Usuarios 
  */
  var tablaUsuarios = $('#usuarios').DataTable({
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
      defaultContent: "<a class='fas text-primary fa-edit editar-usuario'></a><a class='fas text-primary fa-trash eliminar-usuario'>",
      targets: -1
    }]
  });

  tablaUsuarios.on('click', '.editar-usuario', function(e) {
    let dataTable = tablaUsuarios.row(e.target.closest('tr')).data();
    console.log(dataTable);
    $.ajax({
      type: 'GET',
      url: '/Admin/obtenerUsuario',
      data: {
        id: dataTable[0]
      },
      success: function(data) {
        console.log(data);
        if (data) {
          var jsonObj = JSON.parse(data);
          $('#id').val(jsonObj.id)

          $('#nombre').val(jsonObj.nombre)
          $('#apellido').val(jsonObj.apellido)
          $('#email').val(jsonObj.email)
          $('#clave').val(jsonObj.clave)
          $('#perfil').val(jsonObj.id_perfil)
          $('#modal-usuario').modal('show');
          $('#form-usuario').attr('action', '<?php echo base_url('Admin/editar_usuario'); ?>');
          $('#title-formulario-usuario').html("Editar Equipo")
        }


      },
      error: function(error) {
        console.log('Error al obtener datos del equipo:', error);
      }
    });

  });

  tablaUsuarios.on('click', '.eliminar-usuario', function(e) {
    let dataTable = tablaUsuarios.row(e.target.closest('tr')).data();
    console.log(dataTable);
    $.ajax({
      type: 'GET',
      url: '/Admin/eliminar_usuario',
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

  $('#btn-usuario').on('click', function(e) {
    $('#modal-usuario').modal('show');
    $('#title-formulario-usuario').html("Agregar Usuario")
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

  /* 
  ? Asignacion de trabajo 
  */

  var tableAsignar = $('#solicitudes').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
  tableAsignar.on('click', 'tbody tr', (e) => {
    let classList = e.currentTarget.classList;

    if (classList.contains('selected')) {
      classList.remove('selected');
    } else {
      table.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
      classList.add('selected');
    }
  });

  $('#btn-modal-asignar').on('click', function(e) {
    if (tableAsignar.row('.selected').data()) {
      $('#id_orden').val(tableAsignar.row('.selected').data()[0]);
      $('#modal-asignar').modal('show');

    } else {
      alert("selecione un equipo")
    }

  });

  let tableCronograma =   $('#cronograma').DataTable({
    "paging": true,
    "lengthChange": false,
    "autoWidth": true,
    "responsive": false,
    'scrollX': true
  });

  tableCronograma.on('click', 'tbody tr', (e) => {
    let classList = e.currentTarget.classList;

    if (classList.contains('selected')) {
      classList.remove('selected');
    } else {
      table.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
      classList.add('selected');
    }
  });

  $('#btn-modal-asignar-tecnico').on('click', function(e) {
    if (tableCronograma.row('.selected').data()) {
      $('#id_cronograma').val(tableCronograma.row('.selected').data()[0]);
      $('#modal-asignar-tecnico').modal('show');

    } else {
      alert("selecione un equipo")
    }

  });

  

  $('#btn-upload').click(function() {
    $('#modal-upload').modal('show');
  });


  var tablaFichas = $('#fichas').DataTable({
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
      defaultContent: "<a class='fas text-primary fa-edit view-pdf'></a>",
      targets: -1
    }]
  });

  tablaFichas.on('click', '.view-pdf', function(e) {
    $('#url_ficha').attr('src', '');
    let dataTable = tablaFichas.row(e.target.closest('tr')).data();
    console.log(`<?php echo base_url(); ?>${dataTable[2]}`);

    $('#url_ficha').attr('src', '<?php echo base_url(); ?>' + dataTable[2]);
    $('#modal-ficha').modal('show');

  });
</script>
</body>

</html>