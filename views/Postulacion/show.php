<div class="container">

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>

    <!-- Lista de postulaciones -->
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0 font-weight-bold">
                <?php echo ($_SESSION['tipo'] == 'empresa') ? 'Postulaciones a mis Vacantes' : 'Mis Postulaciones'; ?>
            </h4>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                        <th>Fecha Postulación</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($listaPostulaciones)) { ?>
                        <?php foreach ($listaPostulaciones as $post) { ?>
                            <tr>
                                <td><?php echo $post->getPersId() . '-' . $post->getVacId(); ?></td>

                                <!-- Semáforo del estado -->
                                <td>
                                    <?php
                                    $estado = $post->getEstado();
                                    $badgeClass = 'secondary';
                                    if ($estado == 'Pendiente')
                                        $badgeClass = 'warning';
                                    if ($estado == 'Aprobado')
                                        $badgeClass = 'success';
                                    if ($estado == 'Rechazado')
                                        $badgeClass = 'danger';
                                    ?>
                                    <span class="badge bg-<?php echo $badgeClass; ?>">
                                        <?php echo htmlspecialchars($estado); ?>
                                    </span>
                                </td>

                                <td><?php echo htmlspecialchars($post->getObservaciones()); ?></td>
                                <td><?php echo $post->getFechaPostulacion(); ?></td>

                                <td class="text-center d-flex justify-content-center gap-2">

                                    <?php if ($_SESSION['tipo'] == 'persona'): ?>
                                        <!-- Persona: Ver info de la vacante -->
                                        <a href="?controller=vacante&action=detail&vacant_id=<?php echo $post->getVacId(); ?>"
                                            class="btn btn-sm btn-info font-weight-bold mr-1">Info Vacante</a>

                                        <!-- Eliminar solo si pendiente o rechazado -->
                                        <?php if ($estado == 'Pendiente' || $estado == 'Rechazado'): ?>
                                            <a href="?controller=postulacion&action=delete&pers_id=<?php echo $post->getPersId(); ?>&vac_id=<?php echo $post->getVacId(); ?>"
                                                class="btn btn-sm btn-danger font-weight-bold"
                                                onclick="return confirm('¿Seguro que deseas eliminar esta postulación?');">
                                                Eliminar
                                            </a>
                                        <?php endif; ?>

                                    <?php elseif ($_SESSION['tipo'] == 'empresa'): ?>
                                        <!-- Empresa: Ver info de la persona -->
                                        <a href="?controller=persona&action=perfil&pers_id=<?php echo $post->getPersId(); ?>"
                                            class="btn btn-sm btn-info font-weight-bold mr-1">Info Persona</a>

                                        <!-- Cambiar estado solo si pendiente -->
                                        <?php if ($estado == 'Pendiente'): ?>
                                            <a href="?controller=postulacion&action=updateshow&pers_id=<?php echo $post->getPersId(); ?>&vac_id=<?php echo $post->getVacId(); ?>"
                                                class="btn btn-sm btn-success font-weight-bold">
                                                Cambiar Estado
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                <?php echo ($_SESSION['tipo'] == 'empresa') ? 'No hay postulaciones a tus vacantes.' : 'No tienes postulaciones registradas.'; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>