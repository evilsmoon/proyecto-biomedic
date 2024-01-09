
<div class="modal fade" id="modal-usuario">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-formulario-usuario">Agregar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form-usuario" action="<?php echo base_url('Admin/crear_usuario'); ?>">
                <input type="text" id="id" name="id" hidden>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clave">Clave</label>
                                <input type="password" class="form-control" id="clave" name="clave" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="perfil">Perfil</label>
                                <select class="form-control" id="perfil" name="perfil" required>
                                    <option value="">Selecciona un perfil</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Tecnico</option>
                                    <option value="3">Enfermera</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>