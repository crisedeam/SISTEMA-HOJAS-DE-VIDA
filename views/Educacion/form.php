<form   class="mt-0"
    action="<?php echo isset($estudio) ? '?controller=educacion&action=update' : '?controller=educacion&action=save'; ?>"
    method="post">

    <?php if (isset($estudio)) { ?>
        <input type="hidden" name="id_estudio" value="<?php echo $estudio->getIdEstudio(); ?>">
    <?php } ?>

    <input type="hidden" name="nro_doc_persona" value="<?php echo $_SESSION['usuario_id']; ?>">

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="titulo_estudio" class="form-label font-weight-bold">Título del Estudio</label>
            <input type="text" class="form-control" id="titulo_estudio" name="titulo_estudio"
                value="<?php echo isset($estudio) ? $estudio->getTituloEstudio() : ''; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="entidad" class="form-label font-weight-bold">Entidad</label>
            <input type="text" class="form-control" id="entidad" name="entidad"
                value="<?php echo isset($estudio) ? $estudio->getEntidad() : ''; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="fecha_ini" class="form-label font-weight-bold">Fecha de Inicio</label>
            <input type="date" class="form-control" id="fecha_ini" name="fecha_ini"
                value="<?php echo isset($estudio) ? $estudio->getFechaIni() : ''; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="fecha_fin" class="form-label font-weight-bold">Fecha de Fin</label>
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"
                value="<?php echo isset($estudio) ? $estudio->getFechaFin() : ''; ?>" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label font-weight-bold">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="4"
            required><?php echo isset($estudio) ? $estudio->getDescripcion() : ''; ?></textarea>
    </div>

    <div class="d-flex justify-content-start mt-3">
        <button type="submit" class="btn btn-success  font-weight-bold w-25 mr-2">Guardar</button>
        <a href="?controller=educacion&action=show" class="btn btn-secondary  font-weight-bold w-25">Cancelar</a>
    </div>
    
</form>