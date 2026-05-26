<div class="container">

    <!-- Card de Estudios -->
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0 font-weight-bold">Estudios</h4>
        </div>

        <!-- Formulario de búsqueda y botón dentro de la card -->
        <div class="card-body p-4">
            <form class="d-flex justify-content-between align-items-center mb-4 mt-0"
                action="?controller=educacion&action=search" method="post">
                <div class="input-group w-50">
                    <input class="form-control" name="busqueda" type="text"
                        placeholder="Buscar educación (ID, Título, Entidad)">
                    <button type="submit" class="btn btn-primary  font-weight-bold">Buscar</button>
                </div>
                <a href="?controller=educacion&action=register" class="btn btn-success font-weight-bold ms-2">
                    + Agregar Educación
                </a>
            </form>

            <!-- Tabla de estudios -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-info text-center">
                        <tr>
                            <th style="width: 3%;">ID</th>
                            <th>Título</th>
                            <th>Entidad</th>
                            <th style="width: 11%;">Inicio</th>
                            <th style="width: 11%;">Finalizo</th>
                            <th>Descripción</th>
                            <th style="width: 15%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($listaEducacion)) { ?>
                            <?php foreach ($listaEducacion as $edu) { ?>
                                <tr>
                                    <td><?php echo $edu->getIdEstudio(); ?></td>
                                    <td><?php echo $edu->getTituloEstudio(); ?></td>
                                    <td><?php echo $edu->getEntidad(); ?></td>
                                    <td><?php echo $edu->getFechaIni(); ?></td>
                                    <td><?php echo $edu->getFechaFin(); ?></td>
                                    <td><?php echo $edu->getDescripcion(); ?></td>
                                    <td class="text-center"> 
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="?controller=educacion&action=updateshow&id_estudio=<?php echo $edu->getIdEstudio(); ?>"
                                                class="btn btn-warning  font-weight-bold mr-1">Editar</a>
                                            <a href="?controller=educacion&action=delete&id_estudio=<?php echo $edu->getIdEstudio(); ?>"
                                                class="btn btn-danger font-weight-bold eliminar-btn"
                                                data-nombre="<?php echo $edu->getTituloEstudio(); ?>">Eliminar</a>
                                        </div>
                                    </td>

                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted">No hay estudios registrados.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>