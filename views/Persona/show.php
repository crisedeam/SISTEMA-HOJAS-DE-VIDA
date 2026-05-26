<div class="container">
    <h2>Lista de Personas</h2>

    <!-- Formulario de búsqueda -->
    <form class="form-inline" action="?controller=persona&action=search" method="post">
        <div class="form-group row">
            <div class="col-xs-4">
                <input class="form-control" name="nro_documento" type="text" placeholder="Buscar por Documento">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search"></span> Buscar
                </button>
            </div>
        </div>
    </form>

    <!-- Tabla de resultados -->
    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nro Documento</th>
                    <th>Tipo</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaPersonas as $persona) { ?>
                    <tr>
                        <td>
                            <a href="?controller=persona&action=updateshow&nro_documento=<?php echo $persona->getNroDocumento(); ?>">
                                <?php echo $persona->getNroDocumento(); ?>
                            </a>
                        </td>
                        <td><?php echo $persona->getTipoDocuemnto(); ?></td>
                        <td><?php echo $persona->getNombres(); ?></td>
                        <td><?php echo $persona->getApellidos(); ?></td>
                        <td><?php echo $persona->getCorreoElectronico(); ?></td>
                        <td><?php echo $persona->getTelefono(); ?></td>
                        <td>
                            <a href="?controller=persona&action=delete&nro_documento=<?php echo $persona->getNroDocumento(); ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
