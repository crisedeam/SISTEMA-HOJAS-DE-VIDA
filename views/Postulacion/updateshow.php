<div class="container">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0 font-weight-bold">Editar Postulación</h4>
        </div>
        <div class="card-body p-3">

            <?php if (isset($postulacion) && $_SESSION['tipo'] === 'empresa'): ?>

                <?php if ($postulacion->getEstado() === 'Pendiente'): ?>

                    <form class="mt-0"
                        action="?controller=postulacion&action=update"
                        method="post">

                        <!-- Campos ocultos para identificar la postulación -->
                        <input type="hidden" name="pers_id" value="<?php echo $postulacion->getPersId(); ?>">
                        <input type="hidden" name="vac_id" value="<?php echo $postulacion->getVacId(); ?>">
                        <input type="hidden" name="fecha_postulacion" value="<?php echo $postulacion->getFechaPostulacion(); ?>">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Estado</label>
                                <select name="estado" class="form-control" required>
                                    <?php
                                    $estados = ['Pendiente', 'Aprobado', 'Rechazado'];
                                    $selected = $postulacion->getEstado();
                                    foreach ($estados as $est) {
                                        $sel = ($est == $selected) ? 'selected' : '';
                                        echo "<option value='$est' $sel>$est</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Observaciones</label>
                                <textarea name="observaciones" class="form-control" rows="4" required><?php echo htmlspecialchars($postulacion->getObservaciones()); ?></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start mt-3">
                            <button type="submit" class="btn btn-success font-weight-bold w-25 mr-2">Guardar</button>
                            <a href="?controller=postulacion&action=show" class="btn btn-secondary font-weight-bold w-25">Cancelar</a>
                        </div>

                    </form>

                <?php else: ?>
                    <div class="alert alert-info text-center">
                        Esta postulación ya ha sido <?php echo $postulacion->getEstado(); ?>. No se puede editar.
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <div class="alert alert-danger text-center">
                    No tienes permiso para acceder a este formulario.
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
