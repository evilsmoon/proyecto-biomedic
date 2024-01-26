<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
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
                            <a class="btn btn-app" type="button" id="btn-usuario">
                                <i class="fas fa-user-plus "></i> Crear Usuario
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-xl">
                                <table id="usuarios" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($usuarios as $usuario) : ?>
                                            <tr>
                                                <td><?php echo $usuario->id; ?></td>
                                                <td><?php echo $usuario->nombre; ?></td>
                                                <td><?php echo $usuario->apellido; ?></td>
                                                <td><?php echo $usuario->email; ?></td>
                                                <td><?php echo $usuario->perfil; ?></td>
                                                <td class="d-flex justify-content-around align-items-center">
                                                    <!-- Aquí puedes agregar botones para editar, eliminar, etc. -->
                                                </td>
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