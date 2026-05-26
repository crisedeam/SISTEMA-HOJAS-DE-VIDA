<div class="container">

    <!-- Card de Proyectos -->
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0 font-weight-bold">Proyectos</h4>
        </div>

        <!-- Formulario de búsqueda y botón dentro de la card -->
        <div class="card-body p-4">
            <form class="d-flex justify-content-between align-items-center mb-4 mt-0"
                action="?controller=portafolio&action=search" method="post">
                <div class="input-group w-50">
                    <input class="form-control" name="busqueda" type="text"
                        placeholder="Buscar proyecto (ID, Nombre, Descripcion)">
                    <button type="submit" class="btn btn-primary font-weight-bold">Buscar</button>
                </div>
                <a href="?controller=portafolio&action=register" class="btn btn-success font-weight-bold ms-2">
                    + Agregar Proyecto
                </a>
            </form>

            <!-- Tabla de proyectos -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-info text-center">
                        <tr>
                            <th style="width: 3%;">ID</th>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th style="width: 11%;">Fecha</th>
                            <th>Link</th>
                            <th>Descripción</th>
                            <th style="width: 15%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($listaProyecto)) { ?>
                            <?php foreach ($listaProyecto as $proyec) { ?>
                                <tr>
                                    <td><?php echo $proyec->getIdProyecto(); ?></td>
                                    <td><?php echo $proyec->getNombreProyecto(); ?></td>
                                    <td>
                                        <?php if ($proyec->getFoto()) { ?>
                                            <img src="assets/uploads/portafolio/<?php echo $proyec->getFoto(); ?>"
                                                alt="Foto proyecto" class="rounded shadow-sm"
                                                style="width:80px; height:80px; object-fit:cover;">
                                        <?php } else { ?>
                                            <span class="text-muted">Sin foto</span>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $proyec->getFecha(); ?></td>
                                    <td>
                                        <?php if ($proyec->getLinkProyecto()) { ?>
                                            <a href="<?php echo $proyec->getLinkProyecto(); ?>" target="_blank"
                                                class="text-decoration-none">
                                                Ver Proyecto
                                            </a>
                                        <?php } else { ?>
                                            <span class="text-muted">N/A</span>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $proyec->getDescripcionProyecto(); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="?controller=portafolio&action=updateshow&id_proyecto=<?php echo $proyec->getIdProyecto(); ?>"
                                                class="btn btn-warning font-weight-bold mr-1">Editar</a>
                                            <a href="?controller=portafolio&action=delete&id_proyecto=<?php echo $proyec->getIdProyecto(); ?>"
                                                class="btn btn-danger font-weight-bold eliminar-btn"
                                                data-nombre="<?php echo $proyec->getNombreProyecto(); ?>">Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted">No hay proyectos registrados.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>