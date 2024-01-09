<div class="modal fade" id="modal-inventario">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-formulario">Agregar Equipo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form-inventario" action="<?php echo base_url('Admin/agregar'); ?>">
                    <div class="row">
                        <input type="text" id="id" name="id" hidden>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="numero_inventario">Número de Inventario:</label>
                                <input type="text" class="form-control" id="numero_inventario" name="numero_inventario" required>
                            </div>
                            <div class="form-group">
                                <label for="ubicacion">Ubicación:</label>
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
                            </div>

                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <input type="text" class="form-control" id="marca" name="marca" required>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo:</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="numero_inventario">Area:</label>
                                <input type="text" class="form-control" id="area" name="area" required>
                            </div>
                            <div class="form-group">
                                <label for="numero_inventario">Nombre del Equipo:</label>
                                <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" required>
                            </div>
                            <div class="form-group">
                                <label for="serie">Serie:</label>
                                <input type="text" class="form-control" id="serie" name="serie" required>
                            </div>
                            <div class="form-group">
                                <label for="perfil">Funcionalidad</label>
                                <select class="form-control" id="funcionalidad" name="funcionalidad" required>
                                    <option value="">Selecciona Funcionalidad</option>
                                    <option value="OPERATIVO">OPERATIVO</option>
                                    <option value="SEMI OPERATIVO">SEMI OPERATIVO</option>
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