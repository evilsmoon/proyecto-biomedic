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
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.table2excel.min.js'); ?>"></script>1
<!-- overlayScrollbars -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- Adminlte core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('assets/js/adminlte.min.js'); ?>"></script>


<!-- Autenticacion -->
<script type="text/javascript" src="<?php echo base_url('assets/js/autenticacion.js'); ?>"></script>


<script>
  // var pdfFonts = require('pdfmake/build/vfs_fonts.js');
  // pdfMake.vfs = pdfFonts.pdfMake.vfs;
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
    info: false,
    autoWidth: true,
    responsive: false,
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
        var role = '<?php echo $this->session->userdata('Role'); ?>';
        console.log(role);

        if (role == 'Administrador') {
          window.location.href = 'Admin';
        } else {
          window.location.href = 'Doctor';
        }




        // $('#formEditarEquipo').html(data);
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
    info: false,
    autoWidth: true,
    responsive: false,
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
        $('#modal-usuario').modal('show');
        $('#form-usuario').attr('action', '<?php echo base_url('Admin/editar_usuario'); ?>');
        $('#title-formulario-usuario').html("Editar Equipo")
        // Llenar el formulario con los datos obtenidos

        $('#id').val(data.id)
        $('#nombre').val(data.nombre)
        $('#apellido').val(data.apellido)
        $('#email').val(data.email)
        $('#clave').val(data.clave)
        $('#perfil').val(data.id_perfil)

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
      type: 'POST',
      url: '/Admin/eliminarUsuario',
      data: {
        id: dataTable[0]
      },
      success: function(data) {
        console.log(data);

        window.location.href = "usuarios";

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
    "dom": 'Bfrtip',
    "lengthChange": false,
    "autoWidth": false,
    "responsive": true,
    'scrollX': true,
    "select": true,
    "buttons": [
      'print'
    ],
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

    $('#modal-asignar').modal('show');
    if (tableAsignar.row('.selected').data()) {
      $('#id_orden').val(tableAsignar.row('.selected').data()[0]);
      $('#modal-asignar').modal('show');

    } else {
      alert("Selecione un equipo")
    }

  });

  $('#btn-upload').click(function() {
    $('#modal-upload').modal('show');
  });

  $('#btn-modal-descargar').click(function() {
    $('#modal-descarga').modal('show');
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
    let dataTable = tablaFichas.row(e.target.closest('tr')).data();


    $('#url_ficha').attr('src', '<?php echo base_url(); ?>' + dataTable[2]);
    $('#modal-ficha').modal('show');

  });

  let tableCronograma = $('#cronograma').DataTable({
    "paging": true,
    "lengthChange": false,
    "autoWidth": true,
    "responsive": false,
    'scrollX': true,
  });

  $('#preventivo').DataTable({
    paging: true,
    lengthChange: false,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
    responsive: true,

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
      alert("Selecione un equipo")
    }

  });

  $('#btn-print-cronograma').on('click', function(e) {
    $('#cronograma').table2excel({
      filename: "Cronograma",
      fileext: ".xlsx",
    });
    // wnd.print();
  })
  $('#btn-print-orden-trabajo').on('click', function(e) {

    // playground requires you to assign document definition to a variable called dd
    if (tableAsignar.row('.selected').data()) {
      var docDefinition = {
        pageSize: 'A4',
        pageMargins: [40, 60, 40, 60],

        content: [

          {
            text: [{
                text: 'Biomed',
                fontSize: 40,
                bold: true,
                color: '#7DBAE5'
              },
              {
                text: 'Soft\n\n',
                fontSize: 34
              },
            ],
            alignment: 'center'
          },
          {
            text: 'Orden de trabajo',
            alignment: 'center'
          },
          {
            text: `ID Orden:            ${tableAsignar.row('.selected').data()[0]} \n\n`,
            alignment: 'right'
          },
          {
            table: {
              widths: ['*'],
              body: [
                [{
                  text: 'Información Necesaria',
                  alignment: 'center',
                  border: [false, true, false, true],
                }],
              ],
            }
          },
          {
            text: '\n\n'
          },
          {
            table: {
              widths: [150, '*'],
              body: [
                [{
                    text: 'Solicitado por:',
                    alignment: 'left',
                    border: [false, true, true, true],
                  },
                  {
                    text: `${tableAsignar.row('.selected').data()[7]}`,
                    alignment: 'left',
                    border: [false, true, false, true],
                  }
                ],
                [{
                    text: 'Fecha:',
                    alignment: 'left',
                    border: [false, true, true, true],
                  },
                  {
                    text: `${tableAsignar.row('.selected').data()[4]}`,
                    alignment: 'left',
                    border: [false, true, false, true],
                  }
                ],
                [{
                    text: 'Servicio Medico:',
                    alignment: 'left',
                    border: [false, true, true, true],
                  },
                  {
                    text: `${tableAsignar.row('.selected').data()[3]}`,
                    alignment: 'left',
                    border: [false, true, false, true],
                  }
                ],
                [{
                    text: 'Prioridad:',
                    alignment: 'left',
                    border: [false, true, true, true],
                  },
                  {
                    text: `${tableAsignar.row('.selected').data()[2]}`,
                    alignment: 'left',
                    border: [false, true, false, true],
                  }
                ],
                [{
                    text: ' ',
                    alignment: 'left',
                    border: [false, true, false, true],
                  },
                  {
                    text: ' ',
                    alignment: 'left',
                    border: [false, true, false, true],
                  }
                ],
                [{
                    text: `Nombre del equipo:`,
                    alignment: 'left',
                    border: [false, true, false, true],
                  },
                  {
                    text: `Asunto: `,
                    alignment: 'center',
                    border: [false, true, false, true],
                  }
                ],
                [{
                    text: ' ',
                    alignment: 'left',
                    border: [false, false, false, false],
                  },
                  {
                    text: ' ',
                    alignment: 'left',
                    border: [false, false, false, false],
                  }
                ],


              ],

            }

          },
          {

            columnGap: 50,
            columns: [{
                table: {
                  widths: ['*'],
                  body: [
                    [{
                      text: `${tableAsignar.row('.selected').data()[1]}`,
                      alignment: 'left',
                      border: [false, true, false, false],
                    }, ],
                  ]
                }
              },
              {

                table: {
                  widths: ['*'],
                  body: [
                    [{
                      text: `${tableAsignar.row('.selected').data()[6]}`,
                      alignment: 'center',
                      border: [false, true, false, false],
                    }, ],
                  ]
                }
              }
            ]
          },
          {
            margin: [0, 60],
            columnGap: 50,
            columns: [
              [

                {
                  table: {
                    widths: ['*'],
                    body: [
                      [{
                        text: ' ',
                        alignment: 'left',
                        border: [false, true, false, true],
                      }, ],
                    ]
                  }
                },
                {
                  table: {
                    widths: [100, '*'],
                    heights: [50, 50],
                    body: [
                      [{
                          text: 'Nombre del personal asignado: ',
                          alignment: 'left',
                          border: [false, false, true, true],
                        },
                        {
                          text: `${tableAsignar.row('.selected').data()[5]}`,
                          alignment: 'center',
                          border: [false, false, false, true],
                        },
                      ],
                    ]
                  }
                },
                {
                  margin: [0, 60],
                  table: {
                    widths: ['*'],
                    heights: [80],
                    body: [
                      [{
                        text: ' ',
                        alignment: 'left',
                        border: [true, true, true, true],
                      }, ],
                      [{
                        text: 'Firma',
                        alignment: 'center',
                        border: [false, false, false, false],
                      }, ]
                    ]
                  }
                }
              ],
              [

                {
                  table: {
                    widths: ['*'],
                    body: [
                      [{
                        text: ' ',
                        alignment: 'right',
                        border: [false, true, false, true],
                      }, ],
                    ],
                    alignment: 'right',
                  }
                },
                {
                  table: {
                    widths: [100, "*"],
                    heights: [50, 50],
                    body: [
                      [{
                          text: 'Estado de la solicitud: ',
                          alignment: 'left',
                          border: [false, false, true, true],
                        },
                        {
                          text: `${tableAsignar.row('.selected').data()[8]}`,
                          alignment: 'left',
                          border: [false, false, false, true],
                        },
                      ],
                    ]
                  }
                },
                {
                  margin: [0, 60],
                  table: {
                    widths: ['*'],
                    heights: [80],
                    body: [
                      [{
                        text: ' ',
                        alignment: 'left',
                        border: [true, true, true, true],
                      }, ],
                      [{
                        text: 'Firma',
                        alignment: 'center',
                        border: [false, false, false, false],
                      }, ]
                    ]
                  }
                },

              ]
            ]
          }
        ],

      }
      pdfMake.createPdf(docDefinition).open();
    }
  });
</script>
</body>

</html>