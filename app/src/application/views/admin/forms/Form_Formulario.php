<div class="modal fade" id="modal-formulario">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-formulario">Formulario Equipo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form-formulario" action="<?php echo base_url('Admin/agregarEquipoFormulario'); ?>">
                    <input type="text" id="idEquipo" name="idEquipo" hidden>
                    <div class="row">
                        <div class="col-md">
 
                            <div class="form-group">
                                <label for="tecnicos">Nivel del Riesgo :</label>
                                <select class="form-control" id="nivel_riesgpo" name="nivel_riesgpo" required <?php echo $this->session->userdata('Role') == 'Administrador' ? '' : 'disabled'; ?>>
                                    <option value="" ></option>
                                    <option value="1.1">Riesgo Alto | 4 </option>
                                    <option value="1.2">Riesgo Moderado Alto | 3 </option>
                                    <option value="1.3">Riesgo Moderado Bajo | 2 </option>
                                    <option value="1.4">Riesgo Bajo | 1 </option>
                                </select>
                            </div>
 
                            <div class="form-group">
                                <label for="tecnicos">Funcion del equipo :</label>
                                <select class="form-control" id="funcion_equipo" name="funcion_equipo" required <?php echo $this->session->userdata('Role') == 'Administrador' ? '' : 'disabled'; ?>>
                                    <option value="" ></option>
                                        <optgroup label="Terapéuticos">
                                            <option value="2.1.1">Soporte de vida | 10</option>
                                            <option value="2.1.2">Cirugía y cuidados intensivo | 9</option>
                                            <option value="2.1.3">Terapia física y tratamiento | 8</option>
                                        </optgroup>
                                        <optgroup label="Diagnóstico">
                                            <option value="2.2.4">Monitorización de cirugía y cuidados intensivos | 7</option>
                                            <option value="2.2.2">Control fisiológico adicional y diagnóstico | 6</option>
                                        </optgroup>
                                        <optgroup label="Analíticos">
                                            <option value="2.3.1">Análisis de laboratorio | 5</option>
                                            <option value="2.3.2">Accesorios de laboratorio | 4</option>
                                            <option value="2.3.3">Computadoras y afines | 3</option>
                                        </optgroup>
                                        <optgroup label="Apoyo">
                                            <option value="2.4.1">Relacionados con el paciente y otros | 2</option>
                                        </optgroup>
                                </select>
                            </div>
 
                            <div class="form-group">
                                <label for="tecnicos">Requisitos de mantenimiento :</label>
                                <select class="form-control" id="requisitos_mantenimiento" name="requisitos_mantenimiento" required <?php echo $this->session->userdata('Role') == 'Administrador' ? '' : 'disabled'; ?>>
                                    <option value="" ></option>
                                        <optgroup label="Extenso">
                                            <option value="3.1.1">Importantes: exige calibración y reemplazo de piezas periódicos | 5</option>
                                            <option value="3.1.2">Superiores al promedio | 4</option>
                                        </optgroup>
                                        <optgroup label="Medio">
                                            <option value="3.2.1">Usuales: verificación de funcionamiento y pruebas de seguridad | 3</option>
                                            <option value="3.2.2">Inferiores del promedio | 2</option>
                                        </optgroup>
                                        <optgroup label="Mínimo">
                                            <option value="3.3.1">Inspección visual | 1</option>
                                        </optgroup>
                                </select>
                            </div>
 
                            <div class="form-group">
                                <label for="tecnicos">Tipo de desgaste :</label>
                                <select class="form-control" id="tipo_desgaste" name="tipo_desgaste" required <?php echo $this->session->userdata('Role') == 'Administrador' ? '' : 'disabled'; ?>>
                                    <option value="" ></option>
                                        <optgroup label="Alto">
                                            <option value="4.1">Alto | 5</option>
                                            <option value="4.2">Alto | 4</option>
                                        </optgroup>
                                        <optgroup label="Medio">
                                            <option value="4.3">Medio | 3</option>
                                            <option value="4.4">Medio | 2</option>
                                        </optgroup>
                                        <optgroup label="Mínimo">
                                            <option value="4.5">Mínimo | 1</option>
                                        </optgroup>
                                        <optgroup label="No">
                                            <option value="4.6">No aplica | 0</option>
                                        </optgroup>
                                </select>
                            </div>
 
                            <div class="form-group">
                                <label for="tecnicos">Frecuencia de uso :</label>
                                <select class="form-control" id="frecuencia_uso" name="frecuencia_uso" required <?php echo $this->session->userdata('Role') == 'Administrador' ? '' : 'disabled'; ?>>
                                    <option value="" ></option>
                                    <option value="5.1">24 horas | 5</option>
                                    <option value="5.2">Diariamente | 4</option>
                                    <option value="5.3">Regularmente | 3</option>
                                    <option value="5.4">Ocasionalmente | 2</option>
                                    <option value="5.5">Ocasionalmente | 1</option>
                                </select>
                            </div>
 
                            <div class="form-group">
                                <label for="tecnicos"> Promedio de averías del equipo :</label>
                                <select class="form-control" id="averias_equipo" name="averias_equipo" required <?php echo $this->session->userdata('Role') == 'Administrador' ? '' : 'disabled'; ?>>
                                    <option value="" ></option>
                                    <option value="6.1">Significativo: más de una cada seis meses | 2 </option>
                                    <option value="6.2">Moderado: una cada 6-9 meses | 1 </option>
                                    <option value="6.3">Usual: una cada 9-18 meses | 0 </option>
                                    <option value="6.4">Mínimo: una cada 18-30 meses | -1 </option>
                                    <option value="6.5">Insignificante: menos de una en los 30 meses anteriores | -2 </option>
                                </select>
                            </div>
 
                        </div>
 
 
                    </div>
 
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" <?php echo $this->session->userdata('Role') == 'Administrador' ? '' : 'disabled'; ?> >Guardar</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
