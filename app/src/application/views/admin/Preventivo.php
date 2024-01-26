<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mantenimiento Preventivo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Mantenimiento Preventivo</li>
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
                        <div class="card-body">
                            <div class="table-responsive-xl">
                                <table id="preventivo" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Equipo</th>
                                            <th>Número de Inventario</th>
                                            <th>Frecuencia de Mantenimiento</th>
                                            <th>Nombre del Equipo</th>
                                            <th>Servicio Médico</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($mantenimientos as $mantenimiento) : ?>
                                            <tr>
                                                <td><?php echo $mantenimiento->id_equipo; ?></td>
                                                <td><?php echo $mantenimiento->numero_inventario; ?></td>
                                                <td><?php echo $mantenimiento->frecuencia_mantenimiento; ?></td>
                                                <td><?php echo $mantenimiento->nombre_equipo; ?></td>
                                                <td><?php echo $mantenimiento->servicio_medico; ?></td>
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