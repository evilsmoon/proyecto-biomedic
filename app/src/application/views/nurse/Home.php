<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inventario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Enfermera</a></li>
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
                            <a class="btn btn-app" type="button" id="btn-modal">
                                <i class="fas fa-file-alt"></i>Solicitud orden de trabajo
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="inventario" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ubicación</th>
                                        <th>Número de Inventario</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Serie</th>
                                        <th>Datos de Fabricante</th>
                                        <th>Datos de Proveedor</th>
                                        <th>Año de Fabricación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($equipos as $equipo) : ?>
                                        <tr>
                                            <td><?php echo $equipo->id; ?></td>
                                            <td><?php echo $equipo->ubicacion; ?></td>
                                            <td><?php echo $equipo->numero_inventario; ?></td>
                                            <td><?php echo $equipo->marca; ?></td>
                                            <td><?php echo $equipo->modelo; ?></td>
                                            <td><?php echo $equipo->serie; ?></td>
                                            <td><?php echo $equipo->datos_fabricante; ?></td>
                                            <td><?php echo $equipo->datos_proveedor; ?></td>
                                            <td><?php echo $equipo->anio_fabricacion; ?></td>
                                            <td class="text-center"> </td>
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