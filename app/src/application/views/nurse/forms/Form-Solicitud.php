<div class="modal fade" id="modal-solicitud">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulario Equipo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id='form-solicitud' action="<?php echo base_url('Enfermera/insertar_orden_trabajo')?>">
                    <div class="row">
                    <input type="text" id="id_equipo" name="id_equipo" hidden>
                    <input type="text" id="solicitado_por" name="solicitado_por" hidden>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prioridad">Prioridad:</label>
                                <select class="form-control" id="prioridad" name="prioridad">
                                    <option value="alta">Alta</option>
                                    <option value="media">Media</option>
                                    <option value="baja">Baja</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="servicioMedico">Servicio médico:</label>
                                <input type="text" class="form-control" id="servicio_medico" name="servicio_medico">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="asunto">Asunto:</label>
                                <textarea type="text" class="form-control" id="asunto" name="asunto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="solicitadoPor">Solicitado por:</label>
                                <label id="solicitadoPor"></label>
                            </div>
                        </div>
                    </div>
          
                    <div class="d-flex justify-content-start gap-3">
                        <button type="button" class="btn btn-danger mx-2" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary mx-2">Enviar Solicitud</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>