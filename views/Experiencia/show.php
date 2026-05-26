<div class="container">

    <!-- Card de Experiencias -->
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0 font-weight-bold">Experiencias</h4>
        </div>

        <!-- Formulario de búsqueda y botón dentro de la card -->
        <div class="card-body p-4">
            <form class="d-flex justify-content-between align-items-center mb-4 mt-0"
                action="?controller=experiencia&action=search" method="post">
                <div class="input-group w-50">
                    <input class="form-control" name="busqueda" type="text"
                        placeholder="Buscar experiencia (ID, Cargo, Empresa)">
                    <button type="submit" class="btn btn-primary font-weight-bold">Buscar</button>
                </div>
                <a href="?controller=experiencia&action=register" class="btn btn-success font-weight-bold ms-2">
                    + Agregar Experiencia
                </a>
            </form>

            <!-- Tabla de experiencias -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-info text-center">
                        <tr>
                            <th style="width: 3%;">ID</th>
                            <th>Cargo</th>
                            <th>Empresa</th>
                            <th style="width: 11%;">Inicio</th>
                            <th style="width: 11%;">Finalizo</th>
                            <th>Descripción</th>
                            <th style="width: 15%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($listaExperiencias)) { ?>
                            <?php foreach ($listaExperiencias as $exp) { ?>
                                <tr>
                                    <td><?php echo $exp->getIdExperiencia(); ?></td>
                                    <td><?php echo $exp->getCargo(); ?></td>
                                    <td><?php echo $exp->getEmpresa(); ?></td>
                                    <td><?php echo $exp->getFechaIni(); ?></td>
                                    <td><?php echo $exp->getFechaFin(); ?></td>
                                    <td><?php echo $exp->getDescripcionFunciones(); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="?controller=experiencia&action=updateshow&id_experiencia=<?php echo $exp->getIdExperiencia(); ?>"
                                                class="btn btn-warning font-weight-bold mr-1">Editar</a>
                                            <a href="?controller=experiencia&action=delete&id_experiencia=<?php echo $exp->getIdExperiencia(); ?>"
                                                class="btn btn-danger font-weight-bold eliminar-btn"
                                                data-nombre="<?php echo $exp->getCargo(); ?>">Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted">No hay experiencias registradas.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
