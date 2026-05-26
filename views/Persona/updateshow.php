<div class="container mt-4">

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-warning text-white text-center">
            <h5 class="mb-0 fw-bold">Editar Persona</h5>
        </div>
        <div class="card-body p-4">
            <form action="?controller=persona&action=update" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_persona" value="<?php echo $persona->getNroDocumento(); ?>">

                <!-- Fila 1: Nombres, Apellidos, Foto -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres"
                            value="<?php echo htmlspecialchars($persona->getNombres()); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos"
                            value="<?php echo htmlspecialchars($persona->getApellidos()); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="foto" class="form-label">Foto</label>
                        <?php if ($persona->getFoto()) { ?>
                            <div class="mb-2">
                                <img src="assets/uploads/persona/<?php echo $persona->getFoto(); ?>" alt="Foto"
                                    class="rounded shadow-sm" style="width:120px; height:120px; object-fit:cover;">
                            </div>
                        <?php } ?>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>
                </div>

                <!-- Fila 2: Documento, Tipo Documento, Fecha Nacimiento -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nro_documento" class="form-label">Número de Documento</label>
                        <input type="text" class="form-control" id="nro_documento" name="nro_documento"
                            value="<?php echo $persona->getNroDocumento(); ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                        <input type="text" class="form-control" id="tipo_documento" name="tipo_documento"
                            value="<?php echo htmlspecialchars($persona->getTipoDocumento()); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                            value="<?php echo $persona->getFechaNacimiento(); ?>" required>
                    </div>
                </div>

                <!-- Fila 3: Dirección, Ciudad, Teléfono -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="direccion_residencia" class="form-label">Dirección de Residencia</label>
                        <input type="text" class="form-control" id="direccion_residencia" name="direccion_residencia"
                            value="<?php echo htmlspecialchars($persona->getDireccionResidencia()); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="ciudad_residencia" class="form-label">Ciudad de Residencia</label>
                        <input type="text" class="form-control" id="ciudad_residencia" name="ciudad_residencia"
                            value="<?php echo htmlspecialchars($persona->getCiudadResidencia()); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono"
                            value="<?php echo htmlspecialchars($persona->getTelefono()); ?>">
                    </div>
                </div>

                <!-- Fila 4: Correo, Contraseña, Sexo -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo_electronico" name="correo_electronico"
                            value="<?php echo htmlspecialchars($persona->getCorreoElectronico()); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="<?php echo htmlspecialchars($persona->getPassword()); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-control" id="sexo" name="sexo">
                            <option value="M" <?php if ($persona->getSexo() == "M")
                                echo "selected"; ?>>Masculino</option>
                            <option value="F" <?php if ($persona->getSexo() == "F")
                                echo "selected"; ?>>Femenino</option>
                            <option value="O" <?php if ($persona->getSexo() == "O")
                                echo "selected"; ?>>Otro</option>
                        </select>
                    </div>
                </div>

                <!-- Fila 5: Habilidades -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="hab1" class="form-label">Habilidad 1</label>
                        <input type="text" class="form-control" id="hab1" name="hab1"
                            value="<?php echo htmlspecialchars($persona->getHab1()); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="hab2" class="form-label">Habilidad 2</label>
                        <input type="text" class="form-control" id="hab2" name="hab2"
                            value="<?php echo htmlspecialchars($persona->getHab2()); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="hab3" class="form-label">Habilidad 3</label>
                        <input type="text" class="form-control" id="hab3" name="hab3"
                            value="<?php echo htmlspecialchars($persona->getHab3()); ?>">
                    </div>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-start mt-3">
                    <button type="submit" class="btn btn-warning mr-2">Guardar Cambios</button>
                    <a href="?controller=persona&action=show" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>