<form class="mt-0"
      action="<?php echo isset($portafolio) ? '?controller=portafolio&action=update' : '?controller=portafolio&action=save'; ?>"
      method="post" enctype="multipart/form-data">

    <?php if (isset($portafolio)) { ?>
        <input type="hidden" name="id_proyecto" value="<?php echo $portafolio->getIdProyecto(); ?>">
    <?php } ?>

    <input type="hidden" name="nro_doc_persona" value="<?php echo $_SESSION['usuario_id']; ?>">

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="nombre_proyecto" class="form-label font-weight-bold">Nombre del Proyecto</label>
            <input type="text" class="form-control" id="nombre_proyecto" name="nombre_proyecto"
                   value="<?php echo isset($portafolio) ? htmlspecialchars($portafolio->getNombreProyecto()) : ''; ?>"
                   required>
        </div>
        <div class="col-md-6">
            <label for="foto" class="form-label font-weight-bold">Foto</label>
            <?php if (isset($portafolio) && $portafolio->getFoto()) { ?>
                <div class="mb-2">
                    <img src="assets/uploads/portafolio/<?php echo $portafolio->getFoto(); ?>" alt="Foto del proyecto"
                         class="rounded shadow-sm" style="width:120px; height:120px; object-fit:cover;">
                </div>
            <?php } ?>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/png, image/jpeg">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="fecha" class="form-label font-weight-bold">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha"
                   value="<?php echo isset($portafolio) ? $portafolio->getFecha() : ''; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="link_proyecto" class="form-label font-weight-bold">Link del Proyecto</label>
            <input type="url" class="form-control" id="link_proyecto" name="link_proyecto"
                   value="<?php echo isset($portafolio) ? htmlspecialchars($portafolio->getLinkProyecto()) : ''; ?>">
        </div>
    </div>

    <div class="mb-3">
        <label for="descripcion_proyecto" class="form-label font-weight-bold">Descripción</label>
        <textarea class="form-control" id="descripcion_proyecto" name="descripcion_proyecto" rows="4" required><?php
            echo isset($portafolio) ? htmlspecialchars($portafolio->getDescripcionProyecto()) : '';
        ?></textarea>
    </div>

    <div class="d-flex justify-content-start mt-3 gap-3">
        <button type="submit" class="btn btn-success font-weight-bold w-25 mr-2">Guardar</button>
        <a href="?controller=portafolio&action=show" class="btn btn-secondary font-weight-bold w-25">Cancelar</a>
    </div>
</form>
