  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Inventario</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Admin</a></li>
                          <li class="breadcrumb-item active">Inventario</li>
                      </ol>
                  </div>
              </div>
          </div>
      </section>

      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <div class="row">
                                  <a class="btn btn-app" type="button" id="btn-modal">
                                      <i class="fas fa-plus"></i> Nuevo
                                  </a>
                                  <a class="btn btn-app" type="button" id="btn-upload">
                                      <i class="fas fa-upload"></i> Subir inventario
                                  </a>
                              </div>
                          </div>
                          <div class="card-body">
                          <div class="table-responsive-xl">
                              <table id="inventario" class="table table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Número de Inventario</th>
                                          <th>Area</th>
                                          <th>Ubicación</th>
                                          <th>Nombre del Equipo</th>
                                          <th>Marca</th>
                                          <th>Modelo</th>
                                          <th>Serie</th>
                                          <th>Funcionalidad</th>
                                          <th>Acciones</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($equipos as $equipo) : ?>
                                          <tr>
                                              <td><?php echo $equipo->id; ?></td>
                                              <td><?php echo $equipo->numero_inventario; ?></td>
                                              <td><?php echo $equipo->area; ?></td>
                                              <td><?php echo $equipo->ubicacion; ?></td>
                                              <td><?php echo $equipo->nombre_equipo; ?></td>
                                              <td><?php echo $equipo->marca; ?></td>
                                              <td><?php echo $equipo->modelo; ?></td>
                                              <td><?php echo $equipo->serie; ?></td>
                                              <td><?php echo $equipo->funcionalidad; ?></td>
                                              <td class="d-flex justify-content-around align-items-center"></td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      </div>
                     
                  </div>
              </div>
          </div>
      </section>
  </div>