    <div class="modal fade" id="modal-upload">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="title-formulario-usuario">Subir nuevo inventario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- 
        <form action="<?php echo base_url('Admin/file_upload'); ?>" method="post" enctype="multipart/form-data">

                    -->
                    <?php echo form_open_multipart('Admin/file_upload'); ?>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">El nuevo archivo debe ser (.xlsx)</label>
                        <input class="form-control" type="file" id="input_File" name='input_File'>
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