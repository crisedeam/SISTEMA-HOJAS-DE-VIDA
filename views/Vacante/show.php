<?php
$tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : ''; // Si no hay sesión, vacío
?>
<div class="container mt-4">

    <!-- Card de Vacantes -->
    <div class="card shadow-lg border-0 rounded-4">

        <!-- Header -->
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0 font-weight-bold">
                <?php echo ($tipo == 'empresa') ? 'Mis Vacantes' : 'Vacantes'; ?>
            </h4>
        </div>

        <!-- Formulario de búsqueda y botón agregar -->
        <div class="card-body p-4">
            <form class="d-flex justify-content-between align-items-center mb-4 mt-0"
                action="?controller=vacante&action=search" method="post">
                <div class="input-group w-50">
                    <input class="form-control" name="busqueda" type="text"
                        placeholder="Buscar vacante (Cargo, Experiencia, Ubicación o Salario)">
                    <button type="submit" class="btn btn-primary font-weight-bold ms-2">Buscar</button>
                </div>
                <?php if ($tipo == 'empresa'): ?>
                    <a href="?controller=vacante&action=register" class="btn btn-success font-weight-bold ms-2">
                        + Agregar Vacante
                    </a>
                <?php endif; ?>
            </form>

            <!-- Tabla de vacantes -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-info text-center">
                        <tr>
                            <th>ID</th>
                            <th>Cargo</th>
                            <th>N° Vacantes</th>
                            <th>Exp. (Meses)</th>
                            <th>Ubicación</th>
                            <th>Salario</th>
                            <th>F. Cierre</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($listaVacantes)) { ?>
                            <?php foreach ($listaVacantes as $vac) { ?>
                                <tr>
                                    <td><?php echo $vac->getVacantId(); ?></td>
                                    <td><?php echo $vac->getCargo(); ?></td>
                                    <td><?php echo $vac->getNroVacantes(); ?></td>
                                    <td><?php echo $vac->getExpRequerida(); ?></td>
                                    <td><?php echo $vac->getUbicacion(); ?></td>
                                    <td><?php echo $vac->getSalario(); ?></td>
                                    <td><?php echo $vac->getFechaCierre(); ?></td>
                                    <td class="text-center">
                                        <?php if ($tipo == 'empresa'): ?>
                                            <a href="?controller=vacante&action=updateshow&vacant_id=<?php echo $vac->getVacantId(); ?>"
                                                class="btn btn-sm btn-warning me-1">Editar</a>
                                            <a href="?controller=vacante&action=delete&vacant_id=<?php echo $vac->getVacantId(); ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Estás seguro de eliminar esta vacante?');">Eliminar</a>
                                        <?php else: ?>
                                            <a href="?controller=vacante&action=detail&vacant_id=<?php echo $vac->getVacantId(); ?>"
                                                class="btn btn-sm btn-info">Ver más</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    <?php echo ($tipo == 'empresa') ? 'No tienes vacantes registradas.' : 'No hay vacantes registradas.'; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
