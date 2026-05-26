<div class="container mt-4">

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-warning text-white text-center">
            <h5 class="mb-0 fw-bold">Editar Empresa</h5>
        </div>
        <div class="card-body p-4">
            <form action="?controller=empresa&action=update" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_empresa" value="<?php echo $empresa->getIdEmpresa(); ?>">

                <!-- Fila 1: Nombre Empresa, Logo -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre_empresa" class="form-label">Nombre Empresa</label>
                        <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa"
                            value="<?php echo htmlspecialchars($empresa->getNombreEmpresa()); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="logo_foto" class="form-label">Logo</label>
                        <?php if ($empresa->getLogoFoto()) { ?>
                            <div class="mb-2">
                                <img src="assets/uploads/empresa/<?php echo $empresa->getLogoFoto(); ?>" alt="Logo"
                                     class="rounded shadow-sm" style="width:120px; height:120px; object-fit:cover;">
                            </div>
                        <?php } ?>
                        <input type="file" class="form-control" id="logo_foto" name="logo_foto" accept="image/*">
                    </div>
                </div>

                <!-- Fila 2: Nombre Delegado, Cargo Delegado -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre_delegado" class="form-label">Nombre Delegado</label>
                        <input type="text" class="form-control" id="nombre_delegado" name="nombre_delegado"
                            value="<?php echo htmlspecialchars($empresa->getNombreDelegado()); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cargo_delegado" class="form-label">Cargo Delegado</label>
                        <input type="text" class="form-control" id="cargo_delegado" name="cargo_delegado"
                            value="<?php echo htmlspecialchars($empresa->getCargoDelegado()); ?>" required>
                    </div>
                </div>

                <!-- Fila 3: Correo, Contraseña -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="correo_empresa" class="form-label">Correo Empresa</label>
                        <input type="email" class="form-control" id="correo_empresa" name="correo_empresa"
                            value="<?php echo htmlspecialchars($empresa->getCorreoEmpresa()); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="<?php echo htmlspecialchars($empresa->getPassword()); ?>" required>
                    </div>
                </div>

                <!-- Fila 4: Teléfono, Página Web -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="telefono_empresa" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono_empresa" name="telefono_empresa"
                            value="<?php echo htmlspecialchars($empresa->getTelefonoEmpresa()); ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="pagweb_empresa" class="form-label">Página Web</label>
                        <input type="text" class="form-control" id="pagweb_empresa" name="pagweb_empresa"
                            value="<?php echo htmlspecialchars($empresa->getPagwebEmpresa()); ?>">
                    </div>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-start mt-3">
                    <button type="submit" class="btn btn-warning mr-2">Guardar Cambios</button>
                    <a href="?controller=empresa&action=show" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
