<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Estado de las Solicitudes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Estado de las Solicitudes</li>
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
                            <a class="btn btn-app" type="button" id="btn-modal-calificar">
                                <i class="fas fa-tasks"></i> Calificar
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="solicitudes" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID de Orden:</th>
                                        <th>Nombre del Equipo:</th>
                                        <th>Prioridad:</th>
                                        <th>Servicio Médico:</th>
                                        <th>Fecha:</th>
                                        <th>Nombre del Personal:</th>
                                        <th>Asunto:</th>
                                        <th>Solicitado por:</th>
                                        <th>Estado:</th>
                                    </tr>
                                </thead>
                                <?php foreach ($ordenes as $orden) : ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $orden['id']; ?></td>
                                            <td><?php echo $orden['nombre_equipo']; ?></td>
                                            <td><?php echo $orden['prioridad']; ?></td>
                                            <td><?php echo $orden['servicio_medico']; ?></td>
                                            <td><?php echo $orden['fecha']; ?></td>
                                            <td><?php echo $orden['nombre_personal']; ?></td>
                                            <td><?php echo $orden['asunto']; ?></td>
                                            <td><?php echo $orden['nombre_solicitante']; ?></td>
                                            <td><?php echo $orden['estado']; ?></td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>