<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Solicitudes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Técnico</a></li>
                        <li class="breadcrumb-item active">Solicitudes</li>
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
                            <a class="btn btn-app" type="button" id="btn-modal-descargar">
                                <i class="fas fa-download"></i> Descargar Hoja de Ruta
                            </a>
                            <a class="btn btn-app" type="button" id="btn-print-orden-trabajo">
                                <i class="fas fa-print"></i> Imprimir
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
                                <tbody>
                                <?php foreach ($ordenes as $orden) : ?>
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
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>