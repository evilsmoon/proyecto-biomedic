<div class="modal fade" id="modal-asignar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-formulario-usuario">Asignar Trabajo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form-asignar" action="<?php echo base_url('Admin/asignar_trabajo'); ?>">
                    <div class="row">
                    <input type="text" id="id_orden" name="id_orden" hidden>
                        
                        <div class="col-md">
                        <div class="form-group">
                                <label for="tecnicos">Tecnicos :</label>
                                <select class="form-control" id="personal_asignado" name="personal_asignado" required>
                                    <option value="">Asignar trabajo</option>
                                    <?php foreach ($tecnicos as $tecnico) : ?>
                                        <option value="<?php echo $tecnico->id;?>"><?php echo $tecnico->nombre.' '.$tecnico->apellido; ?></option>
                                    <?php endforeach; ?>
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