<form class="mt-0" 
    action="<?php echo isset($experiencia) ? '?controller=experiencia&action=update' : '?controller=experiencia&action=save'; ?>" 
    method="post">

    <?php if (isset($experiencia)) { ?>
        <!-- Campo oculto para actualizar -->
        <input type="hidden" name="id_experiencia" value="<?php echo $experiencia->getIdExperiencia(); ?>">
    <?php } ?>

    <!-- Usuario en sesión -->
    <input type="hidden" name="nro_doc_persona" value="<?php echo $_SESSION['usuario_id']; ?>">

    <!-- Primera fila: Cargo y Empresa -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="cargo" class="form-label font-weight-bold">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo"
                value="<?php echo isset($experiencia) ? $experiencia->getCargo() : ''; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="empresa" class="form-label font-weight-bold">Empresa</label>
            <input type="text" class="form-control" id="empresa" name="empresa"
                value="<?php echo isset($experiencia) ? $experiencia->getEmpresa() : ''; ?>" required>
        </div>
    </div>

    <!-- Segunda fila: Fechas -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="fecha_ini" class="form-label font-weight-bold">Fecha de Inicio</label>
            <input type="date" class="form-control" id="fecha_ini" name="fecha_ini"
                value="<?php echo isset($experiencia) ? $experiencia->getFechaIni() : ''; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="fecha_fin" class="form-label font-weight-bold">Fecha de Fin</label>
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"
                value="<?php echo isset($experiencia) ? $experiencia->getFechaFin() : ''; ?>" required>
        </div>
    </div>

    <!-- Descripción -->
    <div class="mb-3">
        <label for="descripcion_funciones" class="form-label font-weight-bold">Descripción</label>
        <textarea class="form-control" id="descripcion_funciones" name="descripcion_funciones" rows="4" required><?php echo isset($experiencia) ? $experiencia->getDescripcionFunciones() : ''; ?></textarea>
    </div>

    <!-- Botones -->
    <div class="d-flex justify-content-start mt-3">
        <button type="submit" class="btn btn-success font-weight-bold w-25 mr-2">Guardar</button>
        <a href="?controller=experiencia&action=show" class="btn btn-secondary font-weight-bold w-25">Cancelar</a>
    </div>
</form>
